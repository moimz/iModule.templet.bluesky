<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 템플릿 헤더
 * 
 * @file /templets/bluesky/templets/footer.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 1.0.0
 * @modified 2018. 1. 29.
 */
if (defined('__IM__') == false) exit;
?>
<aside class="menu">
	<div class="header">
		<?php echo $IM->getWidget('member.login')->setTemplet('@moimz.slide')->doLayout(); ?>
		<button type="button" data-action="close"><i class="mi mi-close"></i></button>
	</div>

	<ul class="menu <?php echo $IM->getModule('member')->isLogged() == true ? 'logged' : 'login'; ?>">
		<?php foreach ($IM->getSitemap() as $menu) { ?>
		<li<?php echo $IM->menu == $menu->menu ? ' class="opened"' : ''; ?>>
			<a href="<?php echo $IM->getUrl($menu->menu,false); ?>">
				<?php if (count($menu->pages) > 0) { ?><i data-role="toggle" class="fa fa-angle-down"></i><?php } ?>
				<?php echo $IM->parseIconString($menu->icon); ?><?php echo $menu->title; ?>
			</a>
			
			<?php if (count($menu->pages) > 0) { ?>
			<div class="submenu">
				<?php foreach ($menu->pages as $page) { ?>
				<a href="<?php echo $IM->getUrl($page->menu,$page->page,false); ?>"<?php echo $IM->menu == $page->menu && $IM->page == $page->page ? ' class="selected"' : ''; ?>><?php echo $page->title; ?></a>
				<?php } ?>
			</div>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</aside>

<footer>
	<div class="container">
		<ul class="menus">
			<?php foreach ($IM->getFooterPages() as $footer) { ?>
			<li class="<?php echo $footer->menu; ?> <?php echo $footer->page; ?>"><a href="<?php echo $IM->getUrl($footer->menu,$footer->page,false); ?>"><?php echo $footer->title; ?></a></li>
			<?php } ?>
			<li class="sns">
				<?php if (true || $Templet->getConfig('facebook')) { ?>
				<a href="https://www.facebook.com/snuctl" target="_blank"><i class="fa fa-facebook"></i></a>
				<?php } ?>
				
				<?php if (true || $Templet->getConfig('twitter')) { ?>
				<a href="https://www.youtube.com/user/snuetl" target="_blank"><i class="fa fa-twitter"></i></a>
				<?php } ?>
			</li>
		</ul>
		
		<div class="contact">
			<div class="address">
				<div><?php echo $Templet->getConfig('address'); ?></div>
				<div><?php echo $Templet->getConfig('contact'); ?></div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="copyright">
				<?php echo str_replace('{YEAR}',date('Y'),$Templet->getConfig('copyright')); ?>
			</div>
		</div>
	</div>
</footer>

<?php echo $Templet->getConfig('analytics'); ?>