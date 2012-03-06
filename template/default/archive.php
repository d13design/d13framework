<?php 
// 
//  archive.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<div class="row">
	<div class="span8">
		<div class="page-header" style="margin-top:50px;">
			<h1><?php echo get_section($a['section']); ?></h1>
		</div>
		
		<div class="alert alert-info">
			<a class="close" href="#" onclick="$('.alert').fadeOut();return false;">x</a>
			You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/archive.php</strong>
		</div>
		
		<?php
		if(!isset($a['qs'])) $a['qs']=0;
		
		$pagelist = get_articles($a['section'],$a['qs'],PAGE_COUNT);
		
		if(count($pagelist)>0){
			foreach($pagelist as $article){ ?>
				<?php /* if($a['section']=='chosen-slug'){ // Use this if you want to implement conditional templates based on section */ ?>
					<h3><?php html_link(create_path($a['section'],$article['slug']), $article['title']); ?></h3>
					<p><?php echo trimmer($article['synopsis']); ?> <?php html_link(create_path($a['section'],$article['slug']), 'Read more &rarr;'); ?></p>
				<?php /* } // End conditional template */ ?>
			<?php }
			pagination(get_articles($a['section']),$a['section'],$a['qs']);
		}else{
			require_once('template/'.TEMPLATE.'/empty.php');
		}
		?>
	</div>
	<div class="span4">
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
	</div>
</div>
