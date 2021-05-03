@extends('layout')
@section('title', 'アイテム一覧')

@section('content')
<body class="item-list">
  <div id="gallery" class="org">
    @foreach($items as $item)
    <p><img src="/uploads/{{ $item->path }}">
      <span class="name">{{ $item->image_name }}</span></p>
    @endforeach
  </div>
</body>

@endsection