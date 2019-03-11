/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 회원로그인 위젯 모바일 슬라이드메뉴 템플릿 - 로그인 이벤트 처리
 *
 * @file /templets/bluesky/widgets/member.login/slide/scripts/script.js
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 3. 25.
 */
$(document).ready(function() {
	var $widget = $("div[data-widget=member-login][data-templet=slide]");
	
	$("button[data-action=login]",$widget).on("click",function() {
		var $menu = $("body > aside.menu");
		$menu.animate({right:-$menu.outerWidth()},"fast",function() {
			iModule.enable();
			$menu.remove();
			
			Member.loginModal();
		});
	});
	
	$("button[data-action=signup]",$widget).on("click",function() {
		Member.signupPopup();
	});
	
	$("div[data-action=menu]",$widget).on("click",function(e) {
		$(this).toggleClass("opened");
		e.stopImmediatePropagation();
	});
	
	$("div[data-action=menu] > ul > li > button",$widget).on("click",function(e) {
		e.stopImmediatePropagation();
	});
	
	$(document).on("click",function() {
		var $widget = $("div[data-widget=member-login][data-templet=slide]");
		$("div[data-action=menu]",$widget).removeClass("opened");
	});
});