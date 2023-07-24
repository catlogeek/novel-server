@extends('admin._layouts.default')

@section('scripts')
  @vite('resources/js/admin.comment.index.js')
@endsection

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.comment')</h1>

  <x-admin.alerts />

  <x-form method="GET">
    <x-admin.card-component class="mb-4">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <x-form-input label="ID" name="id" :value="$request->query('id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-input label="エピソードID" name="episode_id" :value="$request->query('episode_id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-input label="ユーザID" name="user_id" :value="$request->query('user_id')">
          </x-form-input>
        </div>
        <div class="col-md-6 col-lg-3">
          <x-form-select label="ステータス" name="Status" :options="\App\Enums\Status::toEnableBanCollection()" :default="$request->query('Status')" class="select2" placeholder="ステータスを選択">
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
          <th class="text-nowrap" scope="col">投稿者</th>
          <th scope="col">本文</th>
          <th class="text-nowrap" scope="col">ステータス</th>
          <th scope="col">登録日</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td class="text-nowrap" scope="row"><code>{{ $item->id }}</code></td>
            <td class="text-nowrap"><a href="{{ route('admin.user.show', $item->user) }}">{{ $item->user->name }}</a></td>
            <td>{{ $item->body }}</td>
            <td class="text-nowrap">{{ $item->Status->display() }}</td>
            <td class="text-nowrap">{{ $item->created_at }}</td>
            <td class="text-nowrap">
              <a class="btn btn-sm btn-info" href="{{ route('admin.comment.show', $item) }}">@lang('messages.headline.show')</a>
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
