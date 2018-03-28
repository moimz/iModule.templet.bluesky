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
<i class="photo" style="background-image:url(<?php echo $member->photo; ?>);"></i>

<b><?php echo $member->name; ?><?php if ($me->isAdmin() == true) { ?> <a href="/admin" target="_blank"><i class="xi xi-crown"></i></a><?php } ?></b>
<small><?php echo $member->email; ?></small>

<div class="link">
	<?php if ($modify == null) { ?>
	<button type="button" onclick="Member.modifyPopup();">정보수정</button>
	<?php } else { ?>
	<a href="<?php echo $IM->getUrl($modify->menu,$modify->page); ?>">정보수정</a>
	<?php } ?>
	<i></i>
	<button type="button" onclick="Member.logout(this);">로그아웃</button>
</div>