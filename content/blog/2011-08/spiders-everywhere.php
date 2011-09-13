<?php
$filename = 'spiders-everywhere';
$title = 'Spiders, Everywhere!';
$archive = '2011-08';
$synopsis = 'Man dem spiders!';

if($a['item']=='' && !$sb){
	require('template/blog_mini.php');
}else if($sb){
	html_link(create_path('blog',$archive,$filename), $title);
}else{ ?>
	
<div class="row" style="margin-top:50px;">
	<div class="span5">
		<?php sidebar(); ?>
	</div>
	<div class="span11">

		<div class="page-header">
			<h1><?php html_link(create_path('blog'), 'Blog'); ?> &raquo; <?php echo $title; ?></h1>
		</div>
		
		<h5>Published in <?php html_link(create_path('blog',$archive), pretty_date($archive)); ?>.</h5>
		
		<p>If you're seeing this then everything is working fine and you've made it all the way to a blog post!</p>
		<p><?php echo html_img('images/sample.jpg', 'photo', 'A photo of a spider'); ?></p>
		
	</div>
</div>

<?php } ?>