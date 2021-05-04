@extends('layout')
@section('title', 'アイテム詳細')

@section('content')
<body class="item-list">
  <div class="show-content">
    <div class="showImage">
      <div class="show-img"><img src="/uploads/{{ $item->path }}"></div>
      <div class="btn_group">
        <button type="button" class="edit-btn btn btn-info btn-lg" onclick="location.href='/item/edit/{{ $item->id }}'">編集</a>
        <form method="POST" action="{{ route('delete', $item->id) }}" onSubmit="return checkDelete()">
          @csrf
          <button type="submit" class="delete-btn btn btn-danger btn-lg">削除</a>
        </form>
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

<script>
function checkDelete(){
  if(window.confirm('削除してよろしいですか？')){
      return true;
  } else {
      return false;
  }
}
</script>
@endsection