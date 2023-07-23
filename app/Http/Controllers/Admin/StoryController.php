<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoryRequest;
use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Story::query()
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.story.index', [
            'items' => $items,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryRequest $request, Story $story)
    {
    }
}
