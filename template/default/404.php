<?php 
// 
//  404.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<!-- Example promo-panel -->
<div class="hero-unit" style="margin-top:50px;">
	<h1>404</h1>
	<p>Sorry, something went wrong and we can't find the page you were looking for :-(<br/>
	If you're sure it should be there why not email us: <?php html_link('mailto:'.SITE_EMAIL, SITE_EMAIL); ?></p>
	<p><?php html_link(create_path(),'Home','btn primary large'); ?></p>
</div>

<div class="alert-message info">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p><strong>Heads up!</strong> If this is a new install, make sure you modify your .htaccess file!</p>
</div>
<div class="alert-message info">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/404.php</strong></p>
</div>