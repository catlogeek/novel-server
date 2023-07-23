@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.user')</h1>

  <x-admin.alerts />

  <x-admin.card-component bodyClass="p-0 table-responsive" headerClass="bg-secondary">
    @slot('header')
      <div class="d-flex align-items-center ">
        <span class="text-white">@lang('messages.headline.index')</span>
        <a class="ms-auto btn btn-sm btn-primary" href="{{ route('admin.user.create') }}">@lang('messages.headline.create')</a>
      </div>
    @endslot

    <div class="p-3">
      {{ $items->links() }}
    </div>

    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ユーザ名</th>
          <th scope="col">メールアドレス</th>
          <th scope="col">ステータス</th>
          <th scope="col">登録日</th>
          <th scope="col">最終更新日</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td scope="row"><code>{{ $item->id }}</code></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->Status->display() }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>
              <a class="btn btn-sm btn-info" href="{{ route('admin.user.show', $item) }}">@lang('messages.headline.show')</a>
              <a class="btn btn-sm btn-secondary" href="{{ route('admin.story.index', ['user_id' => $item->id]) }}">@lang('messages.headline.story')</a>
              <a class="btn btn-sm btn-secondary" href="{{-- route('admin.note.index', ['user_id' => $item->id]) --}}">@lang('messages.headline.note')</a>
              <a class="btn btn-sm btn-secondary" href="{{-- route('admin.review.index', ['user_id' => $item->id]) --}}">@lang('messages.headline.review')</a>
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
