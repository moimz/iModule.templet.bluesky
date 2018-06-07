<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 템플릿 서브페이지 레이아웃
 * 
 * @file /templets/bluesky/templets/layouts/subpage.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 1.0.0
 * @modified 2018. 1. 29.
 */
if (defined('__IM__') == false) exit;
?>
<main class="subpage">
	<div class="breadcrumb">
		<div class="container">
			<a href="<?php echo $IM->getUrl(false); ?>"><i class="mi mi-home"></i></a>
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<a href="<?php echo $IM->getUrl($IM->menu,false); ?>"><?php echo $IM->getMenus($IM->menu)->title; ?></a>
			<?php if ($IM->page) { ?>
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<a href="<?php echo $IM->getUrl($IM->menu,$IM->page,false); ?>"><?php echo $IM->getPage()->title; ?></a>
			<?php } ?>
		</div>
	</div>
	
	<div class="container">
		<div class="context">
			<nav>
				<h2><?php echo $IM->getMenus($IM->menu)->title; ?></h2>
				
				<ul>
					<?php foreach ($IM->getPages($IM->menu) as $item) { ?>
					<?php if ($item->menu == 'writing' && $item->page == 'clinic1') { ?>
					<li class="group<?php echo preg_match('/^clinic[1-4]$/',$IM->page) == true ? ' opened selected"' : ''; ?>">
						<button type="button">글쓰기 클리닉<i class="fa fa-angle-down"></i></button>
						<ul>
					<?php } ?>
					<li<?php echo $IM->page == $item->page ? ' class="selected"' : ''; ?>>
						<a href="<?php echo $IM->getUrl($item->menu,$item->page,false); ?>">
							<?php echo $item->title; ?>
						</a>
					</li>
					<?php if ($item->menu == 'writing' && $item->page == 'clinic4') { ?>
						</ul>
					</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</nav>
			
			<section>
				<h3><?php echo $IM->getPage()->title; ?></h3>
				
				<?php echo $context; ?>
			</section>
		</div>
	</div>
</main>
