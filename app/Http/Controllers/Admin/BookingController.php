<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'status' => ['nullable', Rule::in(['pending', 'confirmed', 'canceled'])],
        ]);

        return view('admin.bookings.index', [
            'bookings' => Booking::with(['user', 'experience'])
                ->when($filters['status'] ?? null, fn ($query, string $status) => $query->where('status', $status))
                ->latest()
                ->paginate(12)
                ->withQueryString(),
            'filters' => $filters,
        ]);
    }

    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['confirmed', 'canceled'])],
        ]);

        $booking->update($validated);

        return back()->with('status', 'Đã cập nhật trạng thái đơn đăng ký.');
    }
}
