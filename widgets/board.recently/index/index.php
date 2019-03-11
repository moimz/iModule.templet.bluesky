<?php
/**
 * 이 파일은 iModule 사이트템플릿(bluesky)의 일부입니다. (https://www.imodules.io)
 *
 * 게시판 최근게시물 위젯 (인덱스) 템플릿
 *
 * @file /templets/bluesky/widgets/board.recently/index.php
 * @author Arzz (arzz@arzz.com)
 * @license MIT License
 * @version 3.0.0
 * @modified 2018. 1. 30.
 */
if (defined('__IM__') == false) exit;
?>
<ul>
	<?php foreach ($lists as $item) { ?>
	<li>
		<a href="<?php echo $item->link; ?>"><?php echo $item->category != null ? '<label class="category'.($item->category->sort % 5).'">'.$item->category->title.'</label>' : ''; ?><?php echo $item->title; ?></a>
		<?php echo GetTime('Y-m-d H:i:s',$item->reg_date); ?><?php if ($item->reg_date > time() - 60 * 60 * 24 * 3) { ?><i>N</i><?php } ?>
	</li>
	<?php } ?>
</ul>