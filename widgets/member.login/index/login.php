<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 템플릿 인덱스 외부로그인 위젯
 *
 * @file /templets/bluesky/widgets/member.login/index/login.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 1. 30.
 */
if (defined('__IM__') == false) exit;
?>
<h4>로그인</h4>

<div class="form">
	<div data-role="input">
		<input type="text" name="email" placeholder="이메일주소">
	</div>
	<div data-role="input">
		<input type="password" name="password" placeholder="패스워드">
	</div>
	
	<button type="submit">로그인</button>
</div>

<div class="errorBox" data-error="이메일 또는 패스워드가 일치하지 않습니다."></div>

<?php if ($allow_signup == true || $allow_reset_password == true) { ?>
<div class="link">
	<?php if ($allow_signup == true) { if ($signup == null) { ?>
	<button type="button" onclick="Member.signupPopup();">회원가입</button>
	<?php } else { ?>
	<a href="<?php echo $IM->getUrl($signup->menu,$signup->page,false); ?>">회원가입</a>
	<?php }} ?>
	<?php if ($allow_signup == true && $allow_reset_password == true) { ?><i></i><?php } ?>
	<?php if ($allow_reset_password == true) { if ($help == null) { ?>
	<button type="button" onclick="Member.helpPopup();">패스워드 찾기</button>
	<?php } else { ?>
	<a href="<?php echo $IM->getUrl($help->menu,$help->page,false); ?>">패스워드 찾기</a>
	<?php }} ?>
</div>
<?php } ?>