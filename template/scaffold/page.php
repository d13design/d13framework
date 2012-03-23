		<?php $page = get_page($a['page']); ?>

		<h2><?php echo $page['title']; ?></h2>
		
		<?php echo $page['contents']; ?>

		<hr>
		
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
