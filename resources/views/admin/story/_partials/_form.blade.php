{{-- @if ($user->id)
  <x-form-group class="mb-3">
    <x-form-input label="ID" name="id" value="{{ $user->id }}" readonly>
    </x-form-input>
  </x-form-group>
@endif

<x-form-group class="mb-3">
  <x-form-input label="ユーザ名" name="name" value="{{ $user->name }}">
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="メールアドレス" name="email" value="{{ $user->email }}">
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input type="hidden" name="email_verified_at">
  </x-form-input>
  <x-form-checkbox name="email_verified_at" label="メールアドレスを認証済みにする" :value="now()->format('Y-m-d H:i:s')" :checked="!is_null($user->email_verified_at)">
  </x-form-checkbox>
</x-form-group>

@if (is_null($user->id))
  <x-form-group class="mb-3">
    <x-form-input label="パスワード" name="password">
      @slot('help')
        <small class="d-block mt-1">※半角英数字記号、8文字以上</small>
      @endslot
    </x-form-input>
  </x-form-group>
@endif

<x-form-group label="ステータス" class="mb-3">
  <x-form-radio name="Status" :label="\App\Enums\Status::Enable->display()" :value="\App\Enums\Status::Enable->value" :checked="\App\Enums\Status::Enable === $user->Status">
  </x-form-radio>
  <x-form-radio name="Status" :label="\App\Enums\Status::Ban->display()" :value="\App\Enums\Status::Ban->value" :checked="\App\Enums\Status::Ban === $user->Status">
  </x-form-radio>
</x-form-group>

@if ($user->id)
  <x-form-group class="mb-3">
    <x-form-input label="登録日" name="created_at" value="{{ $user->created_at }}" readonly>
    </x-form-input>
  </x-form-group>

  <x-form-group class="mb-3">
    <x-form-input label="最終更新日" name="updated_at" value="{{ $user->updated_at }}" readonly>
    </x-form-input>
  </x-form-group>
@endif --}}
