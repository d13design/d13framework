<?php

// 
//  template.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-17.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

$filename = 'template';
$title = 'A Content Page Template';
$synopsis = 'This is an <b>example</b> of a project - you can edit it at content/misc/template.php!';
$tags = array('html','css');

if($a['page']==''){
	require('template/'.TEMPLATE.'/post.php');
}else{ ?>
<div class="row">
	<div class="span11">
		<!-- MAIN CONTENT OF ARTICLE -->
		<div class="page-header" style="margin-top:50px;">
			<h1><?php html_link(create_path($a['section']), ucfirst($a['section'])); ?> &raquo; <?php echo $title; ?></h1>
		</div>
		
		<div class="alert-message info">
			<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
			<p>You can edit the contents of this page in <strong>content/misc/template.php</strong></p>
		</div>
		
		<h2>This is an example of a project.</h2>
		
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		
		<ul class="media-grid">
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		  <li><a href="#"><img class="thumbnail" src="http://placehold.it/130x90" alt=""></a></li>
		</ul>
		
		<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
		
		<!-- END OF MAIN CONTENT -->
	</div>
	<div class="span5">
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
	</div>
</div>
<?php } ?>