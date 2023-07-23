@props(['bodyClass' => ''])

<div class="card">
  @if (@$header)
    <div class="card-header">
      {{ $header }}
    </div>
  @endif

  <div class="card-body {{ $bodyClass }}">
    {{ $slot }}
  </div>

  @if (@$footer)
    <div class="card-footer">
      {{ $footer }}
    </div>
  @endif
</div>
