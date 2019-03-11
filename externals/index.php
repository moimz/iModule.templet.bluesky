<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 템플릿 인덱스 외부파일
 *
 * @file /templets/bluesky/externals/index.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 1. 30.
 */
if (defined('__IM__') == false) exit;

$IM->addHeadResource('style',$Templet->getDir().'/externals/styles/index.css');
?>
<div class="container">
	<div class="box">
		<div class="login">
			<?php $IM->getWidget('member.login')->setTemplet('@index')->doLayout(); ?>
			
			<div class="description">
				<div class="box">
					<?php echo nl2br($IM->getSiteDescription()); ?>
				</div>
			</div>
		</div>
		
		<div class="recently">
			<div class="box">
				<?php
				$notice = $IM->getContextUrl('board','notice');
				$categories = array();
				
				if ($notice != null) {
					$mBoard = $IM->getModule('board');
					$categories = $mBoard->db()->select($mBoard->getTable('category'))->where('bid','notice')->orderBy('sort','asc')->get();
				}
				?>
				<h4>공지사항<a href="<?php echo $notice != null ? $notice : '#'; ?>"><i class="mi mi-plus-thin"></i></a></h4>
				
				<ul data-role="tab" data-name="notice">
					<li data-tab="notice-all" class="selected"><button type="button">전체</button></li>
					
					<?php foreach ($categories as $category) { ?>
					<li data-tab="notice-<?php echo $category->idx; ?>"><button type="button"><?php echo $category->title; ?></button></li>
					<?php } ?>
				</ul>
				
				<div data-role="tab" data-name="notice">
					<div data-tab="notice-all">
						<?php $IM->getWidget('board.recently')->setTemplet('@index')->setValue('bid','notice')->setValue('type','post')->setValue('count',5)->setValue('title','')->doLayout(); ?>
					</div>
					
					<?php foreach ($categories as $category) { ?>
					<div data-tab="notice-<?php echo $category->idx; ?>">
						<?php $IM->getWidget('board.recently')->setTemplet('@index')->setValue('bid','notice')->setValue('category',$category->idx)->setValue('type','post')->setValue('count',5)->setValue('title','')->doLayout(); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="recently">
			<div class="box">
				<h4>최근 논문<a href="<?php $notice = $IM->getContextUrl('board','notice'); echo $notice != null ? $notice : '#'; ?>"><i class="mi mi-plus-thin"></i></a></h4>
				
				<ul data-role="tab" data-name="ctl">
					<li data-tab="all" class="selected"><button type="button">전체</button></li>
					<li data-tab="paper"><button type="button">논문</button></li>
					<li data-tab="conference"><button type="button">컨퍼런스</button></li>
					<li data-tab="patent"><button type="button">특허</button></li>
				</ul>
				
				<div data-role="tab" data-name="ctl">
					<div data-tab="all">
						<?php $IM->getWidget('publication.recently')->setTemplet('@index')->setValue('count',5)->doLayout(); ?>
					</div>
					
					<div data-tab="paper">
						<?php $IM->getWidget('publication.recently')->setTemplet('@index')->setValue('count',5)->setValue('category',array(1,2,3))->doLayout(); ?>
					</div>
					
					<div data-tab="conference">
						<?php $IM->getWidget('publication.recently')->setTemplet('@index')->setValue('count',5)->setValue('category',array(6,11))->doLayout(); ?>
					</div>
					
					<div data-tab="patent">
						<?php $IM->getWidget('publication.recently')->setTemplet('@index')->setValue('count',5)->setValue('category',array(5))->doLayout(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="schedule">
		<?php //$IM->getWidget('ctl.schedule')->setTemplet('@index')->doLayout(); ?>
	</div>
</div>