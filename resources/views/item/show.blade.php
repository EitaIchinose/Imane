@extends('layout')
@section('title', 'アイテム詳細')

@section('content')
<body class="item-list">
  <div class="show-content">
    <div class="showImage">
      <div class="show-img"><img src="/uploads/{{ $item->path }}"></div>
      <div class="btn_group">
        <button type="button" class="edit-btn btn btn-info btn-lg" onclick="location.href='/item/edit/{{ $item->id }}'">編集</a>
        <button type="button" class="delete-btn btn btn-danger btn-lg" onclick="location.href='/item/delete/{{ $item->id }}'">削除</a>
      </div>
    </div>
    <div class="show-container">
      <h2>アイテム名</h2>
      <p class="show-item_name">{{ $item->image_name}}</p>
      <hr class="hr_line">
      <h2>色</h2>
      <p class="show-item_name">{{ $item->color}}</p>
      <hr class="hr_line">
      <h2>サイズ</h2>
      <p class="show-item_name">{{ $item->size}}</p>
      <hr class="hr_line">
      <h2>ブランド名</h2>
      <p class="show-item_name">{{ $item->brand}}</p>
      <hr class="hr_line">
      <h2>着用頻度</h2>
      <p class="show-item_name">{{ $frequency}}</p>
      <hr class="hr_line">
      <h2>カテゴリー</h2>
      <p class="show-item_name">{{ $category }}</p>
      <hr class="hr_line">
    </div>
  </div>
</body>
@endsection