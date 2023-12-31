<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserSearchRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserSearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $items = User::query()
            ->when(
                @$request->safe(['id'])['id'],
                fn (Builder|User $q, string $v) => $q->where('id', $v)
            )
            ->when(
                @$request->safe(['Status'])['Status'],
                fn (Builder|User $q, int $v) => $q->where('Status', $v)
            )
            ->latest('updated_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('admin.user.index', [
            'items' => $items,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $user = (new User())
            ->fill($request->old());

        return view('admin.user.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        /** @var User */
        $user = DB::transaction(function () use ($request) {
            $params = $request->validated();

            assert(array_key_exists('password', $params));
            $params['password'] = bcrypt($params['password']);

            /** @var User */
            $user = User::create($params);

            return $user;
        });

        return redirect()
            ->route('admin.user.show', $user)
            ->with('success', __('messages.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        /** @var User */
        $user = DB::transaction(function () use ($request, $user) {
            $params = $request->validated();

            $user->update($params);

            return $user;
        });

        return redirect()
            ->route('admin.user.show', $user)
            ->with('success', __('messages.success.update'));
    }
}
