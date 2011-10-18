<?php 
// 
//  empty.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<div class="alert-message error">
	<a class="close" href="#" onclick="$('.error').fadeOut();return false;">x</a>
	<p>The section you have chosen has no content, add some at <strong>content/<?php echo $a['section']; ?>/</strong>, also you can edit the message for empty sections in <strong>template/<?php echo TEMPLATE; ?>/empty.php</strong></p>
</div>