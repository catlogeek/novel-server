<div class="row">
  <div class="col-md-6">
    <x-form-group class="mb-3">
      <x-form-input label="ID" name="id" value="{{ $story->id }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="タイトル" name="title" value="{{ $story->title }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="ジャンル" name="Genre" value="{{ $story->Genre->display() }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="キャッチフレーズ" name="catchphrase" value="{{ $story->catchphrase }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-textarea label="紹介文" name="introduction" default="{{ $story->introduction }}" rows="10" style="min-height: fit-content;" readonly>
      </x-form-textarea>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="ステータス" name="Status" value="{{ $story->Status->display() }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="登録日" name="created_at" value="{{ $story->created_at }}" readonly>
      </x-form-input>
    </x-form-group>

    <x-form-group class="mb-3">
      <x-form-input label="最終更新日" name="updated_at" value="{{ $story->updated_at }}" readonly>
      </x-form-input>
    </x-form-group>
  </div>

  <div class="col-md-6">
    <x-form-label label="タグ" />
    <div class="d-flex flex-wrap gap-2">
      @foreach ($story->storyTag as $item)
        <x-form-input class="w-auto" name="storyTag[]" value="{{ $item->text }}" readonly>
        </x-form-input>
      @endforeach
    </div>
  </div>

</div>
