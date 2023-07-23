<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Http\Requests\Admin\CommentSearchRequest;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CommentSearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Comment::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|Comment $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['user_id'])['user_id'],
                fn (Builder|Comment $q, string $v) => $q->where('user_id', $v)
            )
            ->when(
                @$request->safe(['episode_id'])['episode_id'],
                fn (Builder|Comment $q, string $v) => $q->where('episode_id', $v)
            )
            ->when(
                @$request->safe(['Status'])['Status'],
                fn (Builder|Comment $q, int $v) => $q->where('Status', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.comment.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.comment.show', [
            'comment' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Comment $comment): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.comment.edit', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): \Illuminate\Http\RedirectResponse
    {
        /** @var Comment */
        $comment = DB::transaction(function () use ($request, $comment) {
            $params = $request->validated();

            $comment->update($params);

            return $comment;
        });

        return redirect()
            ->route('admin.comment.show', $comment)
            ->with('success', __('messages.success.update'));
    }
}
