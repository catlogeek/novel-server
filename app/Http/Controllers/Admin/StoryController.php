<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoryRequest;
use App\Http\Requests\Admin\StorySearchRequest;
use App\Models\Story;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StorySearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Story::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|Story $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['user_id'])['user_id'],
                fn (Builder|Story $q, string $v) => $q->where('user_id', $v)
            )
            ->when(
                @$request->safe(['Genre'])['Genre'],
                fn (Builder|Story $q, int $v) => $q->where('Genre', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.story.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.story.show', [
            'story' => $story,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Story $story): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.story.edit', [
            'story' => $story,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryRequest $request, Story $story): \Illuminate\Http\RedirectResponse
    {
        /** @var Story */
        $story = DB::transaction(function () use ($request, $story) {
            $params = $request->validated();

            $story->update($params);

            return $story;
        });

        return redirect()
            ->route('admin.story.show', $story)
            ->with('success', __('messages.success.update'));
    }
}
