<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\ExperienceCategory;
use App\Models\Organizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::with(['category', 'organizer'])
                ->withCount('bookings')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.experiences.create', $this->formData(new Experience));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('experiences', 'public');
        }

        Experience::create($data);

        return redirect()
            ->route('admin.experiences.index')
            ->with('status', 'Đã thêm hoạt động trải nghiệm.');
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', $this->formData($experience));
    }

    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $data = $this->validatedData($request, $experience);

        if ($request->hasFile('image')) {
            $this->deleteStoredImage($experience);
            $data['image'] = $request->file('image')->store('experiences', 'public');
        }

        $experience->update($data);

        return redirect()
            ->route('admin.experiences.index')
            ->with('status', 'Đã cập nhật hoạt động trải nghiệm.');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        if ($experience->bookings()->exists()) {
            return back()->withErrors([
                'experience' => 'Không thể xóa hoạt động đã có đơn đăng ký.',
            ]);
        }

        $this->deleteStoredImage($experience);
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('status', 'Đã xóa hoạt động trải nghiệm.');
    }

    /**
     * @return array<string, mixed>
     */
    private function formData(Experience $experience): array
    {
        return [
            'experience' => $experience,
            'categories' => ExperienceCategory::orderBy('name')->get(),
            'organizers' => Organizer::orderBy('name')->get(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?Experience $experience = null): array
    {
        return $request->validate([
            'experience_category_id' => ['required', 'integer', 'exists:experience_categories,id'],
            'organizer_id' => ['required', 'integer', 'exists:organizers,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('experiences', 'slug')->ignore($experience),
            ],
            'description' => ['nullable', 'string', 'max:5000'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
            'image' => ['nullable', 'image', 'max:2048'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);
    }

    private function deleteStoredImage(Experience $experience): void
    {
        if ($experience->image && ! str_starts_with($experience->image, 'images/')) {
            Storage::disk('public')->delete($experience->image);
        }
    }
}
