@extends('layout')
@section('title', 'アイテム一覧(トップス)')

@section('content')
<div class="container">
  <body class="item-list">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        アイテムリスト
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('outer')}}">アウター</a>
        <a class="dropdown-item" href="{{ route('inner')}}">インナー</a>
        <a class="dropdown-item" href="{{ route('bottoms')}}">ボトムス</a>
        <a class="dropdown-item" href="{{ route('shoes')}}">シューズ</a>
        <a class="dropdown-item" href="{{ route('business')}}">ビジネス</a>
        <a class="dropdown-item" href="{{ route('index') }}">全て表示</a>
      </div>
    </div>
    <div id="gallery" class="org">
      @foreach($items as $item)
        @if($item->category == 1) 
          <p class="img_wrap"><a href="/item/show/{{ $item->id }}"><img src="/uploads/{{ $item->path }}" class="float">
          <span class="name">{{ $item->image_name }}</span></a></p>
        @endif
      @endforeach
    </div>
  </body>
</div>
@endsection