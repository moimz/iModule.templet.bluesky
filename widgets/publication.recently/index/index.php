<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodule.kr)
 *
 * 출판물 최근항목 템플릿
 *
 * @file /templets/bluesky/widgets/publication.recently/index.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 8. 29.
 */
if (defined('__IM__') == false) exit;
?>
<ul>
	<?php foreach ($lists as $item) { $category = explode(' ',$item->category->title); ?>
	<li>
		<a href="<?php echo $item->link; ?>"><label class="category<?php echo $item->category->sort % 5; ?>"><?php echo $category[0]; ?></label><?php echo $item->title; ?></a>
		<?php if ($item->type == 'PAPER') { ?>
		<small><i class="xi xi-book-spread"></i> <?php echo $item->publisher->title; ?>, <?php echo $item->year; ?></small>
		<?php } ?>
		
		<?php if ($item->type == 'CONFERENCE') { ?>
		<small><i class="xi xi-lecture"></i> <?php echo $item->publisher->title; ?>, <?php echo $item->year; ?></small>
		<?php } ?>
		
		<?php if ($item->type == 'PATENT') { ?>
		<small><i class="xi xi-pen-point"></i> <?php echo $item->volume_no == 1 ? 'Application' : 'Registration'; ?> <?php echo $item->keyword; ?>, <?php echo date('F d, Y',strtotime($item->page_no)); ?></small>
		<?php } ?>
		
		<?php if ($item->type == 'BOOK') { ?>
		<small><i class="xi xi-book"></i> <?php echo $item->publisher->title; ?>, (ISBN : <?php echo $item->page_no; ?>)</small>
		<?php } ?>
		
		<?php if ($item->type == 'MEDIA') { ?>
		<small><i class="xi xi-lecture"></i> <?php echo $item->publisher->title; ?>, <?php echo date('F d, Y',strtotime($item->page_no)); ?></small>
		<?php } ?>
	</li>
	<?php } ?>
</ul>