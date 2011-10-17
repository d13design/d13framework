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

<div class="page-header" style="margin-top:50px;">
	<h1><?php html_link(create_path($a['section']), ucfirst($a['section'])); ?> &raquo; <?php echo $title; ?></h1>
</div>

<div class="alert-message info">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p>You can edit the contents of this page in <strong>content/misc/template.php</strong></p>
</div>

<p>This is an example of a project.</p>

<?php } ?>