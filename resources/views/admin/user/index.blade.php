@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ __('messages.headline.users') }}</h1>

  <x-admin.alerts />

  <x-admin.card-component bodyClass="p-0" headerClass="bg-secondary">
    @slot('header')
      <div class="d-flex align-items-center ">
        <span class="text-white">{{ __('messages.headline.index') }}</span>
        <a class="ms-auto btn btn-sm btn-primary" href="{{ route('admin.user.create') }}">{{ __('messages.headline.create') }}</a>
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
              <a class="btn btn-sm btn-info" href="{{ route('admin.user.show', $item) }}">{{ __('messages.headline.show') }}</a>
              {{-- <a class="btn btn-sm btn-warning" href="{{ route('admin.user.edit', $item) }}">{{ __('messages.headline.edit') }}</a>
              <a class="btn btn-sm btn-danger" href="{{ route('admin.user.destroy', $item) }}">{{ __('messages.headline.destroy') }}</a> --}}
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
