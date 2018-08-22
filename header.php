<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 사이트헤더
 * 
 * @file /templets/bluesky/templets/header.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 1.0.0
 * @modified 2018. 5. 31.
 */
if (defined('__IM__') == false) exit;

/**
 * 언어셋에 따라 웹폰트를 불러온다.
 */
if ($IM->getLanguage() == 'ko') {
	$IM->loadWebFont('NanumSquare',true);
	$IM->loadWebFont('OpenSans');
} else {
	$IM->loadWebFont('OpenSans',true);
}
$IM->loadWebFont('XEIcon');
$IM->loadWebFont('FontAwesome');

/**
 * 컨테이너 또는 팝업으로 사이트내 페이지에 접근할 경우 컨터이너용 스타일시트를 불러온다.
 */
if (defined('__IM_CONTAINER__') == true) $IM->addHeadResource('style',$Templet->getDir().'/styles/container.css');
?>
<header data-site="<?php echo $IM->domain; ?>" class="<?php echo $IM->getPage()->layout; ?>">
	<?php if (count($IM->getSiteLinks()) > 1) { ?>
	<nav data-role="site">
		<?php foreach ($IM->getSiteLinks() as $siteLink) { ?>
		<a href="<?php echo $siteLink->url; ?>"<?php echo $siteLink->domain == $IM->domain ? ' class="selected"' : ''; ?>><?php echo $siteLink->title; ?></a>
		<?php } ?>
	</nav>
	<?php } ?>
	
	<div class="top">
		<div class="container">
			<h1><a href="<?php echo $IM->getIndexUrl(); ?>" style="background-image:url(<?php echo $IM->getSiteLogo('default'); ?>);"><?php echo $IM->getSite()->title; ?></a></h1>
			
			<?php // $IM->getWidget('coursemos.userbar')->setTemplet('@default')->doLayout(); ?>
			
			<button type="button" data-action="slide"><i class="mi mi-bars"></i></button>
		</div>
	</div>
	
	<nav data-role="navigation">
		<div class="container">
			<ul>
				<?php foreach ($IM->getSitemap() as $menu) { ?>
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
									<li><a href="<?php echo $IM->getUrl($page->menu,$page->page,false); ?>"><?php echo $IM->parseIconString($page->icon); ?><?php echo $page->title; ?></a></li>
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