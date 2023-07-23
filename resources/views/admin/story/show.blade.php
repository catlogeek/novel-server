@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.story')</h1>

  <x-admin.alerts />

  <x-admin.card-component headerClass="bg-info">
    @slot('header')
      <div class="d-flex align-items-center gap-2">
        <span class="text-white">@lang('messages.headline.show')</span>
        <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.story.index') }}">@lang('messages.headline.index')</a>
        <a class="btn btn-sm btn-warning" href="{{ route('admin.story.edit', $story) }}">@lang('messages.headline.edit')</a>
      </div>
    @endslot

    @include('admin.story._partials._show')

    @slot('footer')
      <div class="d-flex justify-content-end align-items-center gap-2">
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.episode.index', ['story_id' => $story->id]) }}">@lang('messages.headline.episode')</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.review.index', ['story_id' => $story->id]) }}">@lang('messages.headline.review')</a>
      </div>
    @endslot

  </x-admin.card-component>
@endsection
