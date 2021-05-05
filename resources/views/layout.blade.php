<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="UTF-8">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Scripts -->
  <script src="{{ asset('js/jquery.min.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/popper.min.js') }}" defer></script>
  <script src="{{ asset('js/now-ui-kit.js') }}" defer></script>
  <!-- <script src="{{ asset('js/ajax.js') }}" defer></script> -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/item/item_index.css') }}" rel="stylesheet">
  <link href="{{ asset('css/item/item_show.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/icon.css">
  <link rel="stylesheet" href="/css/demo.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/now-ui-kit.css">

</head>
<body>
  <header id="app">
    @include('header')
  </header>
  <br>
    @yield('content')
  <footer class="footer bg-dark  fixed-bottom">
    @include('footer')
  </footer>
</body>
</html>