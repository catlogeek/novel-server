@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ __('messages.headline.users') }}</h1>

  <x-form action="{{ route('admin.users.store') }}" method="POST">
    <x-admin.card-component headerClass="bg-primary">
      @slot('header')
        <div class="d-flex align-items-center gap-2">
          <span class="text-white">{{ __('messages.headline.create') }}</span>
          <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.users.index') }}">{{ __('messages.headline.index') }}</a>
        </div>
      @endslot

      @include('admin.users._partials._form')

      @slot('footer')
        <div class="d-flex justify-content-end align-items-center ">
          <button class="btn btn-sm btn-success">{{ __('messages.headline.create') }}</button>
        </div>
      @endslot
    </x-admin.card-component>
  </x-form>
@endsection
