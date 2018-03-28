/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
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
	
	$("header > nav > div.menus").on("click",function(e) {
		e.stopPropagation();
	});
	
	$("header > nav > div.container > button[data-action=dropdown]").on("click",function(e) {
		$(this).toggleClass("opened");
		
		if ($(this).hasClass("opened") == true) {
			$("header > nav > div.menus").show();
			var height = $("header > nav > div.menus").height();
			$("header > nav > div.menus").height(0);
			
			$("header > nav > div.menus").animate({height:height},300,function() {
				
			});
		} else {
			$("header > nav > div.menus").animate({height:0},300,function() {
				$("header > nav > div.menus").hide();
				$("header > nav > div.menus").height("auto");
			});
		}
		
		e.stopImmediatePropagation();
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
	
	$(document).on("click",function() {
		if ($("header > nav > div.container > button[data-action=dropdown]").hasClass("opened") == true) {
			$("header > nav > div.container > button[data-action=dropdown]").removeClass("opened");
			$("header > nav > div.menus").animate({height:0},300,function() {
				$("header > nav > div.menus").hide();
				$("header > nav > div.menus").height("auto");
			});
		}
	});
	
	/*
	$("header > nav > div.menus > div.container").on("click",function(e) {
		e.stopImmediatePropagation();
	});
	
	$(document).on("click",function(e) {
		if ($("header > nav").hasClass("opened") == true) {
			$("header > nav").removeClass("opened");
		}
	});
	
	$("main.subpage > div.container > div.context > nav > ul > li.group > button").on("click",function() {
		var $parent = $(this).parent();
		
		$parent.toggleClass("opened");
	});
	
	$("select[name=snu_role]").on("change",function() {
		$.send(ENV.getProcessUrl("snu","change"),{idx:$(this).val()},function(result) {
			if (result.success == true) {
				location.replace(location.href);
			}
		});
	});
	
	if(window.location.href.indexOf("/mypage/application")>0) {
		$("div.context section h3").append('<span style="float:right;"><button style="height:40px;padding-left:10px;padding-right:10px;background:#b5b7c0;border:0px;cursor:pointer;vertical-align:middle;font-size:14px;color:#FFF;" onclick="window.open(\'http://oldctl.snu.ac.kr\');">2017년 9월 이전 내역 확인</button></span>');
	}
	*/
});