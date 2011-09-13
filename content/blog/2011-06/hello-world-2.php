<?php
$filename = 'hello-world-2';
$title = 'Hello World ... Again';
$archive = '2011-06';
$synopsis = 'This is an example of another simple blog post.';

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
		
		<p>Simple blog post.</p>
		
	</div>
</div>

<?php } ?>