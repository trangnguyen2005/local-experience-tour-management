<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $bookingsByStatus = Booking::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $monthlyRevenue = $this->monthlyConfirmedRevenue();

        return view('admin.dashboard', [
            'experienceCount' => Experience::count(),
            'bookingCount' => Booking::count(),
            'userCount' => User::count(),
            'pendingBookingCount' => $bookingsByStatus->get('pending', 0),
            'confirmedBookingCount' => $bookingsByStatus->get('confirmed', 0),
            'canceledBookingCount' => $bookingsByStatus->get('canceled', 0),
            'expectedRevenue' => Booking::whereIn('status', ['pending', 'confirmed'])->sum('total_price'),
            'confirmedRevenue' => Booking::where('status', 'confirmed')->sum('total_price'),
            'topExperiences' => Experience::withCount('bookings')
                ->withSum([
                    'bookings as confirmed_revenue' => fn ($query) => $query->where('status', 'confirmed'),
                ], 'total_price')
                ->orderByDesc('bookings_count')
                ->limit(5)
                ->get(),
            'recentBookings' => Booking::with(['user', 'experience'])
                ->latest()
                ->limit(5)
                ->get(),
            'revenueChartLabels' => $monthlyRevenue->pluck('label'),
            'revenueChartData' => $monthlyRevenue->pluck('revenue'),
            'bookingStatusChartData' => [
                $bookingsByStatus->get('pending', 0),
                $bookingsByStatus->get('confirmed', 0),
                $bookingsByStatus->get('canceled', 0),
            ],
        ]);
    }

    /**
     * @return Collection<int, array{label: string, revenue: float}>
     */
    private function monthlyConfirmedRevenue(): Collection
    {
        $months = collect(range(5, 0))
            ->map(fn (int $monthsAgo) => now()->startOfMonth()->subMonths($monthsAgo));

        $revenueByMonth = Booking::where('status', 'confirmed')
            ->where('created_at', '>=', $months->first())
            ->get(['created_at', 'total_price'])
            ->groupBy(fn (Booking $booking) => $booking->created_at?->format('Y-m'))
            ->map(fn (Collection $bookings) => $bookings->sum('total_price'));

        return $months->map(fn ($month) => [
            'label' => $month->format('m/Y'),
            'revenue' => (float) $revenueByMonth->get($month->format('Y-m'), 0),
        ]);
    }
}
