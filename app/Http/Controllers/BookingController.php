<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function store(Request $request, Experience $experience): RedirectResponse
    {
        abort_unless($experience->status === 'published', 404);

        $validated = $request->validate([
            'participants_count' => ['required', 'integer', 'min:1', 'max:20'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:30'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);

        $registeredParticipants = $experience->bookings()
            ->whereIn('status', ['pending', 'confirmed'])
            ->sum('participants_count');

        if (
            $experience->max_participants !== null
            && $registeredParticipants + $validated['participants_count'] > $experience->max_participants
        ) {
            return back()
                ->withErrors(['participants_count' => 'Số lượng người tham gia vượt quá số chỗ còn lại.'])
                ->withInput();
        }

        Booking::create([
            'user_id' => $request->user()->id,
            'experience_id' => $experience->id,
            'participants_count' => $validated['participants_count'],
            'total_price' => $experience->price * $validated['participants_count'],
            'status' => 'pending',
            'contact_name' => $validated['contact_name'],
            'contact_email' => $validated['contact_email'],
            'contact_phone' => $validated['contact_phone'],
            'note' => $validated['note'] ?? null,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('status', 'Đăng ký trải nghiệm thành công. Đơn của bạn đang chờ xác nhận.');
    }

    public function index(Request $request): View
    {
        return view('bookings.index', [
            'bookings' => $request->user()
                ->bookings()
                ->with(['experience.category', 'experience.organizer'])
                ->latest()
                ->paginate(10),
        ]);
    }
}
