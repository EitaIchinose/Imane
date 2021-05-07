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
  <div class="form-wrapper">
    <div class="left">
    </div>
    <div class="center">
      <div class="container">
        <form action="/item/update" method="POST" class="edit-form">
        @csrf
          <input type="hidden" name="id" value="{{ $item->id }}">
          <div class="form-group">
            <label>アイテム名</label>
            <input type="text" class="form-control @if(!empty($errors->first('image_name'))) is-invalid @endif" id="inputText" placeholder="Input text" value="{{ $item->image_name }}" name="image_name">
            @if ($errors->first('image_name'))
              <div class="invalid-feedback">お名前が入力されていません</div>
            @endif
          </div>
          <div class="form-group">
            <label>編集中のアイテム画像</label>
            <div class="input-group edit_img">
            <img src="/uploads/{{ $item->path }}" class="edit-img">
            </div>
          </div>
          <div class="d-flex justify-content-around">
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>色</label>
                <input type="text" placeholder="Color" class="form-control form-control-success @if(!empty($errors->first('color'))) is-invalid @endif" name="color" value="{{ $item->color }}">
                @if ($errors->first('color'))
                  <div class="invalid-feedback">色が入力されていません</div>
                @endif
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>サイズ</label>
                <input type="text" placeholder="Size" class="form-control form-control-success @if(!empty($errors->first('size'))) is-invalid @endif" name="size" value="{{ $item->size }}">
                @if ($errors->first('size'))
                  <div class="invalid-feedback">サイズが入力されていません</div>
                @endif
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="form-group">
                <label>ブランド</label>
                <input type="text" placeholder="Brand" class="form-control form-control-success @if(!empty($errors->first('brand'))) is-invalid @endif" name="brand" value="{{ $item->brand }}">
                @if ($errors->first('brand'))
                  <div class="invalid-feedback">ブランド名が入力されていません</div>
                @endif
              </div>
            </div>
          </div>
          <div class="select-item">
            <label>着用頻度</label>
            <select class="custom-select @if(!empty($errors->first('frequency'))) is-invalid @endif" name="frequency">
            <option value="{{ $item->frequency }}" selected>{{ $frequency }}</option>
              <option value="1" @if('frequency'=='1') selected @endif>よく着る</option>
              <option value="2" @if('frequency'=='2') selected @endif>たまに着る</option>
              <option value="3" @if('frequency'=='3') selected @endif>あまり着ない</option>
              <option value="4" @if('frequency'=='4') selected @endif>全然着ない</option>
            </select>
              @if ($errors->first('frequency'))
                <div class="invalid-feedback">着用頻度を選択してください</div>
              @endif
          </div>
          <div class="select-item">
            <label>カテゴリー</label>
            <select class="custom-select @if(!empty($errors->first('category'))) is-invalid @endif" name="category">
            <option value="{{ $item->category }}" selected>{{ $category }}</option>
              <option value="1" @if("$category"=='1') selected @endif>トップス</option>
              <option value="2" @if("$category"=='2') selected @endif>アウター</option>
              <option value="3" @if("$category"=='3') selected @endif>インナー</option>
              <option value="4" @if("$category"=='4') selected @endif>ボトムス</option>
              <option value="5" @if("$category"=='5') selected @endif>シューズ</option>
              <option value="6" @if("$category"=='6') selected @endif>ビジネス</option>
            </select>
              @if ($errors->first('category'))
                <div class="invalid-feedback">カテゴリーを選択してください</div>
              @endif
          </div>
          <hr/>
          <input type="submit"  value="編集完了" class="btn btn-primary">
        </form>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
      <script>
        bsCustomFileInput.init();
      </script>

    </div>
    <div class="right">
    </div>
  </div>
  <footer class="footer bg-dark fixed-bottom">
    @include('footer')
  </footer>
</body>
</html>


@section('title', 'アイテム登録')

@section('content')

@endsection
