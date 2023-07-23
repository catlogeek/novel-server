<x-form-group class="mb-3">
  <x-form-input label="ID" name="id" value="{{ $episode->id }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="タイトル" name="title" value="{{ $episode->title }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-textarea label="本文" name="body" default="{{ $episode->body }}" rows="50" style="min-height: fit-content;" readonly>
  </x-form-textarea>
</x-form-group>

<x-form-group label="ステータス" class="mb-3">
  <x-form-select name="Status" :options="\App\Enums\Status::toCollection()" :default="$episode->Status->value">
  </x-form-select>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="登録日" name="created_at" value="{{ $episode->created_at }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="最終更新日" name="updated_at" value="{{ $episode->updated_at }}" readonly>
  </x-form-input>
</x-form-group>
