<?php
$filename = 'spider-photos';
$title = 'Photos of a spider';
$synopsis = 'This is an <b>example</b> of a project.';

if($a['page']=='' && !$sb){
	require('template/work_mini.php');
}else if($sb){
	html_link(create_path('work',$filename), $title);
}else{ ?>

<div class="page-header" style="margin-top:50px;">
	<h1><?php html_link(create_path('work'), 'Work'); ?> &raquo; <?php echo $title; ?></h1>
</div>

<p>This is an example of a project.</p>
<p><?php echo html_img('images/sample.jpg', 'photo', 'A photo of a spider'); ?></p>
<p>Isn't it great!?!</p>

<?php } ?>