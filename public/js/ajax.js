$(function(){
	//ページを表示させる箇所の設定
	var $content = $('#gallery');
	//ボタンをクリックした時の処理
	$(document).on('click', '#item-content', function(event) {
		event.preventDefault();

		//.department-nameのhrefにあるリンク先を保存
		var link = $(this).attr("href");
		//リンク先が今と同じであれば遷移しない
		if(link == lastpage.href){
			return false;
		}else{
			$content.fadeOut(600, function() {
				getPage(link);
			});
			//今のリンク先を保存
			lastpage = link;
			history.pushState(null, null, lastpage);  // url更新

		}
		
	});
	//初期設定
	getPage(lastpage);
  var lastpage = location.href;

	//ページを取得してくる
    function getPage(elm){
      // $.ajaxSetup({
      //   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      // });
    	$.ajax({
            type: 'GET',
            url: elm,
						dataType: 'html',
			}).done(function(data){      // 処理が成功した場合
				$content.html($(data).find("#gallery").html()).fadeIn(600);

			}).fail(function(){          // 処理が失敗した場合
				alert('問題がありました。');
			})
		}
});