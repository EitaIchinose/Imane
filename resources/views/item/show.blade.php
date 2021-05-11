@extends('layout')
@section('title', 'アイテム詳細')

@section('content')
<div class="show-content">
  <div class="showImage">
    <div class="image-block"><img src="https://powu.s3-ap-northeast-1.amazonaws.com/{{ $item->path }}" class="show-img"></div>
    <div class="btn_group">
      <button type="button" class="edit-btn btn btn-info btn-lg" onclick="location.href='/item/edit/{{ $item->id }}'">編集</a>
      <form method="POST" action="{{ route('delete', $item->id, $item->path ) }}" onSubmit="return checkDelete()" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="delete-btn btn btn-danger btn-lg">削除</a>
      </form>
    </div>
  </div>
  <div class="show-container">
    <ul class="content-name">
      <h3>アイテム名</h3>
      <li class="content-name-li">{{ $item->image_name}}</li>
      <h3>色</h3>
      <li class="content-name-li">{{ $item->color }}</li>
      <h3>サイズ</h3>
      <li class="content-name-li">{{ $item->size }}</li>
      <h3>ブランド名</h3>
      <li class="content-name-li">{{ $item->brand }}</li>
      <h3>着用頻度</h3>
      <li class="content-name-li">{{ $frequency }}</li>
      <h3>カテゴリー</h3>
      <li class="content-name-li">{{ $category }}</li>
    </ul>
  </div>
</div>

  
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