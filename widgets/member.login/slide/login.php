<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 회원로그인 위젯 모바일 슬라이드메뉴 템플릿 - 로그인 상태가 아닌 경우
 *
 * @file /templets/bluesky/widgets/member.login/slide/login.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 3. 25.
 */
if (defined('__IM__') == false) exit;
?>
<button type="button" data-action="login"><?php echo $Widget->getText('text/login'); ?></button>
<?php if ($allow_signup == true) { ?>
	<?php if ($signup == null) { ?><button type="button" data-action="signup"><?php echo $Widget->getText('text/signup'); ?></button><?php } else { ?><a href="<?php echo $IM->getUrl($signup->menu,$signup->page,false); ?>"><?php echo $Widget->getText('text/signup'); ?></a><?php } ?>
<?php } ?>