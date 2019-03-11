<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 회원로그인 위젯 모바일 슬라이드메뉴 템플릿 - 로그인 상태인 경우
 *
 * @file /templets/bluesky/widgets/member.login/slide/logged.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 3. 25.
 */
if (defined('__IM__') == false) exit;
?>
<div data-action="menu">
	<i class="photo" style="background-image:url(<?php echo $member->photo; ?>);"></i>
	<span><i class="fa fa-caret-down"></i><?php echo $member->name; ?>님</span>
	
	<ul>
		<li><button type="button" data-action="logout" onclick=""><i class="xi xi-user"></i>정보수정</button></li>
		<li><button type="button" data-action="logout" onclick="Member.logout();"><i class="xi xi-esc"></i>로그아웃</button></li>
	</ul>
</div>