		<?php $article = get_article($a['page']); ?>

		<h2><?php html_link(create_path($article['section_slug']),$article['section_title']); ?> &gt; <?php echo $article['title']; ?></h2>
		
		<p>Article created on <strong><?php echo pretty_date($article['created']); ?></strong>, 
		stored under <strong><?php echo $article['section_title']; ?></strong> 
		and with a permalink of <strong><?php html_link(create_path($article['section_slug'],$article['slug']),create_path($article['section_slug'],$article['slug'])); ?></strong>.</p>
		
		<p class="synopsis"><?php echo $article['synopsis']; ?></p>
		
		<?php echo $article['contents']; ?>
		
		<p>Custom data: <strong><?php echo $article['custom_data']; ?></strong></p>
		
		<hr>
		
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>