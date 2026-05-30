<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ExperienceCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:100'],
            'category_id' => ['nullable', 'integer', 'exists:experience_categories,id'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'gte:min_price'],
        ]);

        $experiences = Experience::query()
            ->with(['category', 'organizer'])
            ->where('status', 'published')
            ->when($filters['q'] ?? null, function ($query, string $keyword): void {
                $query->where(function ($query) use ($keyword): void {
                    $query
                        ->where('title', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            })
            ->when($filters['location'] ?? null, fn ($query, string $location) => $query->where('location', 'like', "%{$location}%"))
            ->when($filters['category_id'] ?? null, fn ($query, int $categoryId) => $query->where('experience_category_id', $categoryId))
            ->when(isset($filters['min_price']), fn ($query) => $query->where('price', '>=', $filters['min_price']))
            ->when(isset($filters['max_price']), fn ($query) => $query->where('price', '<=', $filters['max_price']))
            ->orderByRaw('start_at is null, start_at asc')
            ->paginate(9)
            ->withQueryString();

        return view('experiences.index', [
            'categories' => ExperienceCategory::orderBy('name')->get(),
            'experiences' => $experiences,
            'filters' => $filters,
        ]);
    }

    public function show(Experience $experience): View
    {
        abort_unless($experience->status === 'published', 404);

        $experience->load(['category', 'organizer']);

        $confirmedParticipants = $experience->bookings()
            ->whereIn('status', ['pending', 'confirmed'])
            ->sum('participants_count');

        return view('experiences.show', [
            'experience' => $experience,
            'confirmedParticipants' => $confirmedParticipants,
            'remainingSlots' => $experience->max_participants === null
                ? null
                : max(0, $experience->max_participants - $confirmedParticipants),
        ]);
    }
}
