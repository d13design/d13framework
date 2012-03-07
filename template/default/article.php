<?php 
// 
//  article.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>
<?php $article = get_article($a['page']); ?>

<div class="row">
	<div class="span8">
		<div class="page-header">
			<h1><?php html_link(create_path($article['section_slug']),$article['section_title']); ?> &gt; <?php echo $article['title']; ?></h1>
		</div>
		
		<p>Article created on <strong><?php echo pretty_date($article['created']); ?></strong>, 
		stored under <strong><?php echo $article['section_title']; ?></strong> 
		and with a permalink of <strong><?php html_link(create_path($article['section_slug'],$article['slug']),create_path($article['section_slug'],$article['slug'])); ?></strong>.</p>
		
		<div class="alert alert-info">
			<a class="close" href="#" onclick="$('.alert').fadeOut();return false;">x</a>
			You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/article.php</strong>
		</div>
		
		<p class="synopsis"><?php echo $article['synopsis']; ?></p>
		
		<?php echo $article['contents']; ?>
		
		<p>Custom data: <strong><?php echo $article['custom_data']; ?></strong></p>
		
	</div>
	<div class="span4">
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
	</div>
</div>