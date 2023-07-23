@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ __('messages.headline.users') }}</h1>

  <x-admin.card-component bodyClass="p-0" headerClass="bg-primary">
    @slot('header')
      <div class="d-flex align-items-center gap-2">
        <span class="text-white">{{ __('messages.headline.create') }}</span>
        <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.users.index') }}">{{ __('messages.headline.index') }}</a>
      </div>
    @endslot

    @slot('footer')
      {{-- FIXME: submit --}}
      {{-- <div class="d-flex justify-content-between align-items-center ">
        <a class="btn btn-sm btn-danger" href="{{ route('admin.users.destroy', $user) }}">{{ __('messages.headline.destroy') }}</a>
        <a class="btn btn-sm btn-warning" href="{{ route('admin.users.edit', $user) }}">{{ __('messages.headline.edit') }}</a>
      </div> --}}
    @endslot
  </x-admin.card-component>
@endsection
