/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 템플릿 자바스크립트
 * 
 * @file /templets/bluesky/templets/scripts/script.js
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 1.0.0
 * @modified 2018. 1. 29.
 */
$(document).ready(function() {
	/**
	 * 상단 사이트맵 보기 버튼 이벤트 처리
	 */
	$("header > nav[data-role=navigation] > div.container > button[data-action=dropdown]").on("click",function(e) {
		$(this).toggleClass("opened");
		
		if ($(this).hasClass("opened") == true) {
			$("header > nav[data-role=navigation] > div.menus").show();
			var height = $("header > nav[data-role=navigation] > div.menus").height();
			$("header > nav[data-role=navigation] > div.menus").height(0);
			
			$("header > nav[data-role=navigation] > div.menus").animate({height:height},300,function() {
				
			});
		} else {
			$("header > nav[data-role=navigation] > div.menus").animate({height:0},300,function() {
				$("header > nav[data-role=navigation] > div.menus").hide();
				$("header > nav[data-role=navigation] > div.menus").height("auto");
			});
		}
		
		e.stopImmediatePropagation();
	});
	
	/**
	 * 상단 사이트맵에서 메뉴를 클릭할 경우 자동으로 숨겨지지 않도록 처리
	 */
	$("header > nav[data-role=navigation] > div.menus").on("click",function(e) {
		e.stopPropagation();
	});
	
	/**
	 * 서브페이지 좌측 그룹메뉴 처리
	 */
	$("main.subpage > div.container > div.context > nav > ul > li.group > button").on("click",function() {
		var $parent = $(this).parent();
		$parent.toggleClass("opened");
	});
	
	/**
	 * 모바일용 슬라이드 메뉴 이벤트 처리
	 */
	$("header > div.top > div.container > button[data-action=slide]").on("click",function() {
		if ($("body > aside.menu").length == 0) {
			iModule.disable();
			var $menu = $("body > div[data-role=wrapper] > aside.menu").clone(true,true);
	
			$("body").append($menu);
			$menu.show();
	
			$menu.css("right",-$menu.outerWidth());
			$menu.animate({right:0},"fast");
		} else {
			var $menu = $("body > aside.menu");
			$menu.animate({right:-$menu.outerWidth()},"fast",function() {
				iModule.enable();
				$menu.remove();
			});
		}
	});
	
	$("aside.menu > div.header > button[data-action=close]").on("click",function(e) {
		var $menu = $("body > aside.menu");
		$menu.animate({right:-$menu.outerWidth()},"fast",function() {
			iModule.enable();
			$menu.remove();
		});
	});
	
	$("aside.menu > ul.menu > li > a > i[data-role=toggle]").on("click",function(e) {
		var $toggle = $(this);
		var $list = $toggle.parents("li");
		var $submenu = $("div.submenu",$list);
		var height = $submenu.outerHeight(true);
		
		if ($list.hasClass("opened") == true) {
			$list.height($list.height());
			$list.animate({height:50},{step:function(step) {
				var current = step - 50;
				
				$toggle.rotate(current/height * 180);
				
				if (current == 0) {
					$list.removeClass("opened");
				}
			}});
		} else {
			$list.animate({height:50 + height},{step:function(step) {
				var current = step - 50;
				$toggle.rotate(current/height * 180);
				
				if (current == height) {
					$list.addClass("opened");
				}
			}});
		}
		
		e.preventDefault();
		e.stopImmediatePropagation();
	});
	
	/**
	 * 사이트내 마우스 클릭이 일어날 경우 열려있는 슬라이드 메뉴 및 사이트맵을 숨긴다.
	 */
	$(document).on("click",function() {
		if ($("header > nav[data-role=navigation] > div.container > button[data-action=dropdown]").hasClass("opened") == true) {
			$("header > nav[data-role=navigation] > div.container > button[data-action=dropdown]").removeClass("opened");
			$("header > nav[data-role=navigation] > div.menus").animate({height:0},300,function() {
				$("header > nav[data-role=navigation] > div.menus").hide();
				$("header > nav[data-role=navigation] > div.menus").height("auto");
			});
		}
	});
});