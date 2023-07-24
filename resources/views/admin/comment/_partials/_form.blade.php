<x-form-group class="mb-3">
  <x-form-input label="ID" name="id" value="{{ $comment->id }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="投稿者" name="user.name" value="{{ $comment->user->name }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-textarea label="本文" name="body" default="{{ $comment->body }}" rows="10" style="min-height: fit-content;" readonly>
  </x-form-textarea>
</x-form-group>

<x-form-group label="ステータス" class="mb-3">
  <x-form-select name="Status" :options="\App\Enums\Status::toEnableBanCollection()" :default="$comment->Status->value">
  </x-form-select>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="登録日" name="created_at" value="{{ $comment->created_at }}" readonly>
  </x-form-input>
</x-form-group>
