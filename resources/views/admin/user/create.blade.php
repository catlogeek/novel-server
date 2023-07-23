@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.user')</h1>

  <x-form action="{{ route('admin.user.store') }}" method="POST">
    <x-admin.card-component headerClass="bg-primary">
      @slot('header')
        <div class="d-flex align-items-center gap-2">
          <span class="text-white">@lang('messages.headline.create')</span>
          <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.user.index') }}">@lang('messages.headline.index')</a>
        </div>
      @endslot

      @include('admin.user._partials._form')

      @slot('footer')
        <div class="d-flex justify-content-end align-items-center ">
          <button class="btn btn-sm btn-success">@lang('messages.headline.create')</button>
        </div>
      @endslot
    </x-admin.card-component>
  </x-form>
@endsection
