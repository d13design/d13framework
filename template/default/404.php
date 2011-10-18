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
	<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/404.php</strong></p>
</div>

<h2>Modifying your .htaccess file</h2>
<p>Your .htaccess file should be ready to rock but, if this is a new install of this template, you may need to change your base path. Just swap "framework" on line 2 for whatever your real base path is:</p>
<pre class="prettyprint linenums">
RewriteEngine On
RewriteBase /framework/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
</pre>

<h2>Modifying your site config</h2>
<p>Your site config is held in the /lib/config.inc.php file - make any changes you need in these lines:</p>
<pre class="prettyprint linenums">
define("BASE_PATH","http://127.0.0.1"); //The root domain for your site
$path = "/framework"; //The folder where your site is held (site root)

//Define site URLs
define("SITE_URL",BASE_PATH.$path);
define("ASSETS_URL",BASE_PATH.$path.'/assets'); //The folder, from the site root where assets are held

define("SITE_NAME",'framework');  //Your site name
define("SITE_AUTHOR",'Dave Waller'); //Your name, as the site owner
define("SITE_EMAIL",'site@d13design.co.uk'); //A contact email address
</pre>