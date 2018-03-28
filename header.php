<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 템플릿 헤더
 * 
 * @file /templets/bluesky/templets/header.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 1.0.0
 * @modified 2018. 1. 29.
 */
if (defined('__IM__') == false) exit;

$IM->loadWebFont('Roboto');
//$IM->loadWebFont('OpenSans');
$IM->loadWebFont('NanumSquare');
$IM->loadWebFont('XEIcon');
$IM->loadWebFont('FontAwesome');

if (defined('__IM_CONTAINER__') == true) $IM->addHeadResource('style',$Templet->getDir().'/styles/container.css');
?>
<header>
	<div class="top">
		<div class="container">
			<h1><a href="<?php echo $IM->getUrl(false); ?>" style="background-image:url(<?php echo $IM->getSiteLogo('default'); ?>);"><?php echo $IM->getSite()->title; ?></a></h1>
			
			<?php // $IM->getWidget('coursemos.userbar')->setTemplet('@default')->doLayout(); ?>
			
			<ul>
				<?php $notice = $IM->getContextUrl('board','notice'); if ($notice !== null) { ?>
				<li><a href="<?php echo $IM->getUrl($notice->menu,$notice->page,false); ?>">공지사항</a></li>
				<li class="split"><i></i></li>
				<?php } ?>
				<?php if ($IM->getModule('member')->isLogged() == false) { ?>
				<li><button type="button" onclick="">회원가입</button></li>
				<?php } else { ?>
				<li><button type="button" onclick="">정보수정</button></li>
				<?php } ?>
			</ul>
			
			<button type="button" data-action="slide"><i class="mi mi-bars"></i></button>
		</div>
	</div>

	<nav>
		<div class="container">
			<ul>
				<?php foreach ($IM->getSitemap() as $menu) { if ($menu->menu == 'index' || $menu->is_hide == true) continue; ?>
				<li>
					<a href="<?php echo $IM->getUrl($menu->menu,false); ?>"><?php echo $IM->parseIconString($menu->icon); ?><?php echo $menu->title; ?></a>
					
					<div class="submenu">
						<div class="container">
							<div class="title">
								<h2><?php echo $IM->parseIconString($menu->icon); ?><?php echo $IM->getMenus($menu->menu)->title; ?></h2>
								<p><?php echo $IM->getMenus($menu->menu)->description; ?></p>
							</div>
							
							<div class="menus">
								<ul>
									<?php $loop = 0; foreach ($menu->pages as $page) { if ($page->is_hide == true) continue; if ($loop > 0 && $loop % 4 == 0) echo '</ul><ul>'; ?>
									<li><a href="<?php echo $IM->getUrl($page->menu,$page->page,false); ?>"><?php echo $page->title; ?></a></li>
									<?php $loop++; } ?>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
			<button type="button" data-action="dropdown">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		
		<div class="menus">
			<div class="container">
				<ul>
					<?php $loop = 0; foreach ($IM->getSitemap() as $menu) { if ($menu->menu == 'index' || $menu->is_hide == true) continue; if ($loop > 0 && $loop % 4 == 0) echo '</ul><ul>'; ?>
					<li>
						<h4><a href="<?php echo $IM->getUrl($menu->menu,false); ?>"><?php echo $menu->title; ?></a></h4>
						
						<ul>
							<?php foreach ($menu->pages as $page) { if ($page->is_hide == true) continue; ?>
							<li><a href="<?php echo $IM->getUrl($page->menu,$page->page,false); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $page->title; ?></a></li>
							<?php } ?>
						</ul>
					</li>
					<?php $loop++; } if ($loop % 4 !== 0) { for ($i=$loop%4; $i<4;$i++) echo '<li></li>'; } ?>
				</ul>
			</div>
		</div>
	</nav>
</header>