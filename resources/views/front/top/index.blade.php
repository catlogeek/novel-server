@extends('front._layouts.default')

@section('content')
  <div class="container-fluid py-3">
    <h2 class="h2 mb-3">新着</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-3">
      @for ($i = 0; $i < 24; ++$i)
        <div class="col">
          <div class="card">
            <div class="card-body p-2">
              <p class="h5 m-0">story.title</p>
              <p class="text-end m-0">author.name</p>
            </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
@endsection
