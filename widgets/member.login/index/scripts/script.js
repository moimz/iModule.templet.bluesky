/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 템플릿 인덱스 외부로그인 위젯 이벤트처리
 *
 * @file /templets/bluesky/widgets/member.login/index/scripts/script.js
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 1. 30.
 */
$(document).ready(function() {
	$("div[data-widget].loginBox div.help > button, div[data-widget].loginBox div.help > div.helpBox").on("click",function() {
		var $helpBox = $("div.helpBox",$(this).parent());
		if ($helpBox.is(":visible") == true) {
			$helpBox.hide();
		} else {
			$helpBox.show();
		}
	});
	
	$(document).on("Member.login",function(e,$form,result) {
		if ($form.parents("div[data-widget=member-login][data-templet=index]").length == 1) {
			var $box = $("div.form",$form);
			var $errorBox = $("div.errorBox",$form);
			
			if (result.success == true) {
				$errorBox.hide();
			} else {
				$errorBox.html(result.message ? result.message : $errorBox.attr("data-error"));
				$errorBox.show();
				$box.shake();
				$form.status("default");
				
				setTimeout(function($errorBox) { $errorBox.fadeOut(); },5000,$errorBox);
			
				e.stopImmediatePropagation();
				return false;
			}
		}
	});
});