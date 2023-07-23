@extends('admin._layouts.default')

@section('scripts')
  @vite('resources/js/admin.review.index.js')
@endsection

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.review')</h1>

  <x-admin.alerts />

  <x-form method="GET">
    <x-admin.card-component class="mb-4">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <x-form-input label="ID" name="id" :value="$request->query('id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-input label="ユーザID" name="user_id" :value="$request->query('user_id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-input label="作品ID" name="story_id" :value="$request->query('story_id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-select label="ステータス" name="Status" :options="\App\Enums\Status::toCollection()" :default="$request->query('Status')" class="select2" placeholder="ステータスを選択">
          </x-form-select>
        </div>
      </div>

      @slot('footer')
        <div class="d-flex justify-content-end align-items-center gap-2">
          <button class="btn btn-sm btn-secondary">@lang('messages.headline.search')</button>
        </div>
      @endslot
    </x-admin.card-component>
  </x-form>

  <x-admin.card-component bodyClass="p-0 table-responsive" headerClass="bg-secondary">
    @slot('header')
      <div class="d-flex align-items-center ">
        <span class="text-white">@lang('messages.headline.index')</span>
      </div>
    @endslot

    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">作品</th>
          <th class="text-nowrap" scope="col">レビュアー</th>
          <th scope="col">タイトル</th>
          <th class="text-nowrap" scope="col">ステータス</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td class="text-nowrap" scope="row"><code>{{ $item->id }}</code></td>
            <td><a href="{{ route('admin.story.show', $item->story) }}">{{ $item->story->title }}</a></td>
            <td class="text-nowrap"><a href="{{ route('admin.user.show', $item->user) }}">{{ $item->user->name }}</a></td>
            <td>
              {{-- TODO: link to front --}}
              {{ $item->title }}
            </td>
            <td>{{ $item->Status->display() }}</td>
            <td class="text-nowrap">
              <a class="btn btn-sm btn-info" href="{{ route('admin.review.show', $item) }}">@lang('messages.headline.show')</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    @slot('footer')
      {{ $items->links() }}
    @endslot
  </x-admin.card-component>
@endsection
