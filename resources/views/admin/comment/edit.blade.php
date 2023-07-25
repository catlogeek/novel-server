@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.comment')</h1>

  <x-form action="{{ route('admin.comment.update', $comment) }}" method="PUT">
    <x-admin.card-component headerClass="bg-warning">
      @slot('header')
        <div class="d-flex align-items-center gap-2">
          <span class="text-white">@lang('messages.headline.edit')</span>
          <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.comment.index') }}">@lang('messages.headline.index')</a>
          <a class="btn btn-sm btn-info" href="{{ route('admin.comment.show', $comment) }}">@lang('messages.headline.show')</a>
        </div>
      @endslot

      @include('admin.comment._partials._form')

      @slot('footer')
        <div class="d-flex justify-content-end align-items-center ">
          <button class="btn btn-sm btn-warning">@lang('messages.headline.edit')</button>
        </div>
      @endslot
    </x-admin.card-component>
  </x-form>
@endsection