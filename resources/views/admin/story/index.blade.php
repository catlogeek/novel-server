@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ __('messages.headline.story') }}</h1>

  <x-admin.alerts />

  <x-admin.card-component bodyClass="p-0 table-responsive" headerClass="bg-secondary">
    @slot('header')
      <div class="d-flex align-items-center ">
        <span class="text-white">{{ __('messages.headline.index') }}</span>
      </div>
    @endslot

    <div class="p-3">
      {{ $items->links() }}
    </div>

    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th class="text-nowrap" scope="col">作者</th>
          <th scope="col">タイトル</th>
          <th class="text-nowrap" scope="col">ステータス</th>
          <th scope="col">登録日</th>
          <th scope="col">最終更新日</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td class="text-nowrap" scope="row"><code>{{ $item->id }}</code></td>
            <td class="text-nowrap"><a href="{{ route('admin.user.show', $item->user) }}">{{ $item->user->name }}</a></td>
            <td>
              {{-- TODO: link to front --}}
              {{ $item->title }}
            </td>
            <td>{{ $item->Status->display() }}</td>
            <td class="text-nowrap">{{ $item->created_at }}</td>
            <td class="text-nowrap">{{ $item->updated_at }}</td>
            <td class="text-nowrap">
              <a class="btn btn-sm btn-info" href="{{ route('admin.story.show', $item) }}">{{ __('messages.headline.show') }}</a>
              <a class="btn btn-sm btn-link" href="#">{{ __('messages.headline.episode') }}</a>
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
