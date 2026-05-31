<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExperienceCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExperienceCategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => ExperienceCategory::withCount('experiences')
                ->orderBy('name')
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.categories.create', [
            'category' => new ExperienceCategory,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        ExperienceCategory::create($this->validatedData($request));

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Đã thêm loại trải nghiệm.');
    }

    public function edit(ExperienceCategory $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, ExperienceCategory $category): RedirectResponse
    {
        $category->update($this->validatedData($request, $category));

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Đã cập nhật loại trải nghiệm.');
    }

    public function destroy(ExperienceCategory $category): RedirectResponse
    {
        if ($category->experiences()->exists()) {
            return back()->withErrors([
                'category' => 'Không thể xóa loại trải nghiệm đang có hoạt động.',
            ]);
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Đã xóa loại trải nghiệm.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?ExperienceCategory $category = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('experience_categories', 'slug')->ignore($category),
            ],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);
    }
}
