function loginOpen() {
	var $widget = $("div[data-widget=member-login][data-templet=top]");
	$(".obj_login_mask",$widget).show();
	$(".obj_pop_login",$widget).show();
}

function loginClose() {
	var $widget = $("div[data-widget=member-login][data-templet=top]");
	$(".obj_login_mask",$widget).hide();
	$(".obj_pop_login",$widget).hide();
}

function mypopOpen() {
	var $widget = $("div[data-widget=member-login][data-templet=top]");
	$(".obj_mypop",$widget).show();
}

function mypopClose() {
	var $widget = $("div[data-widget=member-login][data-templet=top]");
	$(".obj_mypop",$widget).hide();
}
