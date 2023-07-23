@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ __('messages.headline.user') }}</h1>

  <x-admin.alerts />

  <x-admin.card-component headerClass="bg-info">
    @slot('header')
      <div class="d-flex align-items-center gap-2">
        <span class="text-white">{{ __('messages.headline.show') }}</span>
        <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.user.index') }}">{{ __('messages.headline.index') }}</a>
        <a class="btn btn-sm btn-warning" href="{{ route('admin.user.edit', $user) }}">{{ __('messages.headline.edit') }}</a>
      </div>
    @endslot

    @include('admin.user._partials._show')

    @slot('footer')
      <div class="d-flex justify-content-between align-items-center ">
        <x-form action="{{ route('admin.user.destroy', $user) }}" method="DELETE">
          <button type="button" class="btn-destroy btn btn-sm btn-danger" href="{{ route('admin.user.destroy', $user) }}">{{ __('messages.headline.destroy') }}</button>
        </x-form>
      </div>
    @endslot
  </x-admin.card-component>
@endsection
