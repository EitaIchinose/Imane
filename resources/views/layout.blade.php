<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/icon.css">
  <link rel="stylesheet" href="/css/now-ui-kit.css">
  <script src="/js/app.js" defer></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

</head>
<body>
  <header>
    @include('header')
  </header>
  <br>
  <div class="container">
    テスト
  </div>
  <footer class="footer bg-dark  fixed-bottom">
    @include('footer')
  </footer>
</body>
</html>