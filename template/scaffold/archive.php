		<h2><?php echo get_section($a['section']); ?></h2>
		
		<hr>
		
		<?php
		if(!isset($a['qs'])) $a['qs']=0;
		
		$pagelist = get_articles($a['section'],$a['qs'],PAGE_COUNT);
		
		if(count($pagelist)>0){
			foreach($pagelist as $article){ ?>
				<?php /* if($a['section']=='chosen-slug'){ // Use this if you want to implement conditional templates based on section */ ?>
					<h3><?php html_link(create_path($a['section'],$article['slug']), $article['title']); ?></h3>
					<p>Custom data: <?php echo $article['custom_data']; ?></p>
					<p><?php echo trimmer($article['synopsis']); ?> <?php html_link(create_path($a['section'],$article['slug']), 'Read more &rarr;'); ?></p>
				<?php /* } // End conditional template */ ?>
			<?php }
			pagination(get_articles($a['section']),$a['section'],$a['qs']);
		}else{
			require_once('template/'.TEMPLATE.'/empty.php');
		}
		?>

		<hr>
		
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
