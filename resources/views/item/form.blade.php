@extends('layout')
@section('title', 'アイテム登録')

@section('content')

<form>
  <div class="form-group">
    <label for="inputText">アイテムネーム</label>
    <input type="text" class="form-control" id="inputText" placeholder="Input text">
  </div>
  <div class="form-group">
    <label for="inputFile">File input</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputFile">
        <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択(ここにドロップすることもできます)</label>
      </div>
        <button class="btn btn-primary btn-round" type="button" id="inputFileReset" style="margin-top:0px; background-color:gray;">取消</button>
    </div>
  </div>
  <hr/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
  bsCustomFileInput.init();

  document.getElementById('inputFileReset').addEventListener('click', function() {

    bsCustomFileInput.destroy();

    var elem = document.getElementById('inputFile');
    elem.value = '';
    var clone = elem.cloneNode(false);
    elem.parentNode.replaceChild(clone, elem);

    bsCustomFileInput.init();

  });
</script>
@endsection