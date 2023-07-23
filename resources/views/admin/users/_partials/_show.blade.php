<x-form-group class="mb-3">
  <x-form-input label="ID" name="id" value="{{ $user->id }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="ユーザ名" name="name" value="{{ $user->name }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-input-group label="メールアドレス" class="mb-3">
  <x-form-input-group-text>
    @if ($user->email_verified_at)
      <i class="fas fa-check-circle"></i>
    @else
      <i class="fas fa-exclamation-circle"></i>
    @endif
  </x-form-input-group-text>

  <x-form-input name="email" value="{{ $user->email }}" readonly>
  </x-form-input>
</x-form-input-group>

<x-form-group class="mb-3">
  <x-form-input label="登録日" name="created_at" value="{{ $user->created_at }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="最終更新日" name="updated_at" value="{{ $user->updated_at }}" readonly>
  </x-form-input>
</x-form-group>
