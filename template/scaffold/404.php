		<h2>404</h2>
		
		<p>Sorry, something went wrong and we can't find the page you were looking for :-(<br/>
		If you're sure it should be there why not email us: <?php html_link('mailto:'.SITE_EMAIL, SITE_EMAIL); ?></p>
		
		<p><?php html_link(create_path(),'Home'); ?></p>
		
		<hr>
		
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>