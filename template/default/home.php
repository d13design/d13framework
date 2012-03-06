<?php 
// 
//  home.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<!-- Example promo-panel -->
<div class="hero-unit">
	<h1>Welcome to <?php echo SITE_NAME; ?>!</h1>
	<p>Nerd note: A <s>databaseless,</s>* PHP content management system incorporating the wonderiferous Twitter Bootstrap HTML 5 style framework, Mixinised with Less.</p>
	<p><?php html_link(create_path('#'),'* Now with added database goodness','btn btn-primary btn-large'); ?></p>
</div>

<div class="alert alert-info">
	<a class="close" href="#" onclick="$('.alert').fadeOut();return false;">x</a>
	You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/home.php</strong>
</div>

<div class="row">

</div>