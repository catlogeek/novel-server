<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EpisodeRequest;
use App\Http\Requests\Admin\EpisodeSearchRequest;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EpisodeSearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Episode::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|Episode $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['story_id'])['story_id'],
                fn (Builder|Episode $q, string $v) => $q->where('story_id', $v)
            )
            ->when(
                @$request->safe(['Status'])['Status'],
                fn (Builder|Episode $q, int $v) => $q->where('Status', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.episode.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.episode.show', [
            'episode' => $episode,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Episode $episode): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.episode.edit', [
            'episode' => $episode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodeRequest $request, Episode $episode): \Illuminate\Http\RedirectResponse
    {
        /** @var Episode */
        $episode = DB::transaction(function () use ($request, $episode) {
            $params = $request->validated();

            $episode->update($params);

            return $episode;
        });

        return redirect()
            ->route('admin.episode.show', $episode)
            ->with('success', __('messages.success.update'));
    }
}
