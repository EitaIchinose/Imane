@extends('layout')
@section('title', 'アイテム一覧')

@section('content')
<div class="container">
  <body class="item-list">
    <div id="gallery" class="org">
      @foreach($items as $item)
      <p class="img_wrap"><a href="/item/show/{{ $item->id }}"><img src="/uploads/{{ $item->path }}" class="float">
        <span class="name">{{ $item->image_name }}</span></a></p>
      @endforeach
    </div>
  </body>
</div>
@endsection