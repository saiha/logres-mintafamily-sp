// JavaScript Document

$(function() {
	
	//ロード or スクロールされると実行
	$(window).on('load scroll', function(){
		
		//ヘッダーの高さ分(80px)スクロールするとfixedクラスを追加
		if ($(window).scrollTop() > 80) {
			$('div.mintafamily-logo').fadeOut("slow");
		} else {
			//80px以下だとfixedクラスを削除
			$('div.mintafamily-logo').fadeIn("slow");
		}
		
	});

	//ロード or スクロールされると実行
	$(window).on('load scroll', function(){
		
		//ヘッダーの高さ分(80px)スクロールするとfixedクラスを追加
		if ($(window).scrollTop() > 112) {
			$('div.breadcrumbs').fadeOut("slow");
		} else {
			//80px以下だとfixedクラスを削除
			$('div.breadcrumbs').fadeIn("slow");
		}
		
	});
	
});

$(function(){
	$("dl.acMenu dt").on("click", function() {
    	$(this).next().slideToggle();
    });
});

jQuery(document).ready(function($){
   /* サブウインドウ表示 */
   $(".opensub").click(function(){
      window.open(this.href,"WindowName","width=520,height=520,resizable=yes,scrollbars=yes");
      return false;
   });
});

