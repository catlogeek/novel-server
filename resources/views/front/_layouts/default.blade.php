@section('head')
  @include('front._partials.head')
@endsection

@section('header')
  @include('front._partials.header')
@endsection

@section('footer')
  @include('front._partials.footer')
@endsection

<!DOCTYPE html>
<html lang="ja" class="h-100">

<head>
  @yield('head')
</head>

<body class="h-100 d-flex flex-column">

  @yield('header')

  <main class="flex-shrink-0">
    @yield('content')
  </main>

  @yield('footer')

</body>

</html>
