<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewRequest;
use App\Http\Requests\Admin\ReviewSearchRequest;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReviewSearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Review::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|Review $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['user_id'])['user_id'],
                fn (Builder|Review $q, string $v) => $q->where('user_id', $v)
            )
            ->when(
                @$request->safe(['story_id'])['story_id'],
                fn (Builder|Review $q, string $v) => $q->where('story_id', $v)
            )
            ->when(
                @$request->safe(['Status'])['Status'],
                fn (Builder|Review $q, int $v) => $q->where('Status', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.review.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.review.show', [
            'review' => $review,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Review $review): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.review.edit', [
            'review' => $review,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, Review $review): \Illuminate\Http\RedirectResponse
    {
        /** @var Review */
        $review = DB::transaction(function () use ($request, $review) {
            $params = $request->validated();

            $review->update($params);

            return $review;
        });

        return redirect()
            ->route('admin.review.show', $review)
            ->with('success', __('messages.success.update'));
    }
}
