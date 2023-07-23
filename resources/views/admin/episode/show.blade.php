@extends('admin._layouts.default')

@section('contents')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">@lang('messages.headline.episode')</h1>

  <x-admin.alerts />

  <x-admin.card-component headerClass="bg-info">
    @slot('header')
      <div class="d-flex align-items-center gap-2">
        <span class="text-white">@lang('messages.headline.show')</span>
        <a class="ms-auto btn btn-sm btn-secondary" href="{{ route('admin.episode.index') }}">@lang('messages.headline.index')</a>
        <a class="btn btn-sm btn-warning" href="{{ route('admin.episode.edit', $episode) }}">@lang('messages.headline.edit')</a>
      </div>
    @endslot

    @include('admin.episode._partials._show')

    @slot('footer')
      <div class="d-flex justify-content-end align-items-center gap-2">
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.user.show', $episode->story->user) }}">@lang('messages.headline.user')</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.story.show', $episode->story) }}">@lang('messages.headline.story')</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.comment.index', ['episode_id' => $episode->id]) }}">@lang('messages.headline.comment')</a>
      </div>
    @endslot

  </x-admin.card-component>
@endsection
