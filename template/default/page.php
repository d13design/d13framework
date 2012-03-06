<?php 
// 
//  page.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>
<?php $page = get_page($a['page']); ?>

<div class="row">
	<div class="span8">
		<div class="page-header" style="margin-top:50px;">
			<h1><?php echo $page['title']; ?></h1>
		</div>
		
		<div class="alert alert-info">
			<a class="close" href="#" onclick="$('.alert').fadeOut();return false;">x</a>
			You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/page.php</strong>
		</div>
		
		<?php echo $page['contents']; ?>
		
	</div>
	<div class="span4">
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
	</div>
</div>