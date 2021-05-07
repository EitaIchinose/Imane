@extends('layout')
@section('title', 'アイテム一覧')

@section('content')
<div class="item-list">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      アイテムリスト
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" id="item-content" href="{{ route('tops')}}">トップス</a>
      <a class="dropdown-item" id="item-content" href="{{ route('outer')}}">アウター</a>
      <a class="dropdown-item" id="item-content" href="{{ route('inner')}}">インナー</a>
      <a class="dropdown-item" id="item-content" href="{{ route('bottoms')}}">ボトムス</a>
      <a class="dropdown-item" id="item-content" href="{{ route('shoes')}}">シューズ</a>
      <a class="dropdown-item" id="item-content" href="{{ route('business')}}">ビジネス</a>
    </div>
  </div>
  <div id="gallery" class="org">
    @foreach($items as $item)
    <p class="img_wrap"><a href="/item/show/{{ $item->id }}"><img src="/uploads/{{ $item->path }}" class="float">
      <span class="name">{{ $item->image_name }}</span></a></p>
    @endforeach
  </div>
</div>
@endsection