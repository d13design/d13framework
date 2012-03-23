<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo SITE_NAME; ?></title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php html_css('style.css'); ?> 
		
		<link href="<?php echo ASSETS_URL; ?>/images/ico/favicon.ico" rel="shortcut icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">

	</head>

	<body onload="prettyPrint();">

		<h1><?php html_link(create_path(),SITE_NAME); ?></h1>
		
		<hr>
		
		<ul>
			<li class="<?php if($a['section']=='') echo 'active'; ?>"><?php html_link(create_path(),'Home'); ?></li>
			<?php list_sections($a); ?>
			<li class="<?php if($a['section']=='404') echo 'active'; ?>"><?php html_link(create_path('404'),'404'); ?></li>
			<?php list_pages($a); ?>
			<li class="<?php if($a['section']=='admin') echo 'active'; ?>"><?php html_link(create_path('admin'),'Admin'); ?></li>
			<?php if(authenticated()){ ?>
				<li><a href="<?php echo SITE_URL; ?>/admin-pages/logout.php">Logout</a></li>
			<?php } ?>
		</ul>

		<hr>