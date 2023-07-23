<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NoteRequest;
use App\Http\Requests\Admin\NoteSearchRequest;
use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NoteSearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = Note::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|Note $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['user_id'])['user_id'],
                fn (Builder|Note $q, string $v) => $q->where('user_id', $v)
            )
            ->when(
                @$request->safe(['Status'])['Status'],
                fn (Builder|Note $q, int $v) => $q->where('Status', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.note.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.note.show', [
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Note $note): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.note.edit', [
            'note' => $note,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note): \Illuminate\Http\RedirectResponse
    {
        /** @var Note */
        $note = DB::transaction(function () use ($request, $note) {
            $params = $request->validated();

            $note->update($params);

            return $note;
        });

        return redirect()
            ->route('admin.note.show', $note)
            ->with('success', __('messages.success.update'));
    }
}
