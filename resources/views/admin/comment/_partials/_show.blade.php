<x-form-group class="mb-3">
  <x-form-input label="ID" name="id" value="{{ $comment->id }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="投稿者" name="user.name" value="{{ $comment->user->name }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="作品" name="story.title" value="{{ $comment->episode->story->title }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="エピソード" name="episode.title" value="{{ $comment->episode->title }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-textarea label="本文" name="body" default="{{ $comment->body }}" rows="10" style="min-height: fit-content;" readonly>
  </x-form-textarea>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="ステータス" name="Status" value="{{ $comment->Status->display() }}" readonly>
  </x-form-input>
</x-form-group>

<x-form-group class="mb-3">
  <x-form-input label="登録日" name="created_at" value="{{ $comment->created_at }}" readonly>
  </x-form-input>
</x-form-group>
