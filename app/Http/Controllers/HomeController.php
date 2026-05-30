<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ExperienceCategory;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'featuredExperiences' => Experience::query()
                ->with(['category', 'organizer'])
                ->where('status', 'published')
                ->orderByRaw('start_at is null, start_at asc')
                ->limit(3)
                ->get(),
            'categories' => ExperienceCategory::query()
                ->withCount(['experiences' => fn ($query) => $query->where('status', 'published')])
                ->orderBy('name')
                ->limit(4)
                ->get(),
        ]);
    }
}
