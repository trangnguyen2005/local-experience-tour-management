<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Experience;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'experienceCount' => Experience::count(),
            'bookingCount' => Booking::count(),
            'userCount' => User::count(),
            'revenue' => Booking::where('status', 'confirmed')->sum('total_price'),
        ]);
    }
}
