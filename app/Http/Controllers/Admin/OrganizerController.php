<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizerController extends Controller
{
    public function index(): View
    {
        return view('admin.organizers.index', [
            'organizers' => Organizer::withCount('experiences')
                ->orderBy('name')
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.organizers.create', [
            'organizer' => new Organizer,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Organizer::create($this->validatedData($request));

        return redirect()
            ->route('admin.organizers.index')
            ->with('status', 'Đã thêm người tổ chức.');
    }

    public function edit(Organizer $organizer): View
    {
        return view('admin.organizers.edit', [
            'organizer' => $organizer,
        ]);
    }

    public function update(Request $request, Organizer $organizer): RedirectResponse
    {
        $organizer->update($this->validatedData($request));

        return redirect()
            ->route('admin.organizers.index')
            ->with('status', 'Đã cập nhật người tổ chức.');
    }

    public function destroy(Organizer $organizer): RedirectResponse
    {
        if ($organizer->experiences()->exists()) {
            return back()->withErrors([
                'organizer' => 'Không thể xóa người tổ chức đang có hoạt động.',
            ]);
        }

        $organizer->delete();

        return redirect()
            ->route('admin.organizers.index')
            ->with('status', 'Đã xóa người tổ chức.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);
    }
}
