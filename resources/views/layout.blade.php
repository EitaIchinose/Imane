<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />


  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/item/item_index.css') }}" rel="stylesheet">
  <link href="{{ asset('css/item/item_show.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/icon.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/now-ui-kit.css">
  <link rel="stylesheet" href="/css/demo.css">

</head>
<body class="index-page sidebar-collapse">
  <header id="app">
    @include('header')
  </header>
  <div class="wrapper">
    <div class="left">
    </div>
    <div class="center">
      @yield('content')
    </div>
    <div class="right">
    </div>
  </div>
  <footer class="bg-dark">
    @include('footer')
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax.js') }}" defer></script>
  <script src="{{ asset('js/now-ui-kit.js') }}" type="text/javascript"></script>
</body>
</html>