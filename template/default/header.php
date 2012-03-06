<?php 
// 
//  header.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

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

		<?php //html_css('less/bootstrap.less','stylesheet/less'); ?>
		<?php html_css('bootstrap.css'); ?>
		<?php html_css('prettify.css'); ?>

		<?php //html_js('less-1.1.3.min.js'); ?>
		<?php html_js('jquery-1.6.2.min.js'); ?>
		<?php html_js('prettify.js'); ?>
		<?php html_js('bootstrap/bootstrap.js'); ?> 
		
		<?php html_js('application.js'); ?>  
		
		<link href="<?php echo ASSETS_URL; ?>/images/ico/favicon.ico" rel="shortcut icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">

	</head>

	<body onload="prettyPrint();">

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<?php html_link(create_path(),SITE_NAME,'brand'); ?>
					<ul class="nav">
						<li class="<?php if($a['section']=='') echo 'active'; ?>"><?php html_link(create_path(),'Home'); ?></li>
						<?php list_sections($a); ?>
						<li class="<?php if($a['section']=='404') echo 'active'; ?>"><?php html_link(create_path('404'),'404'); ?></li>
						<li class="divider-vertical"></li>
						<?php list_pages($a); ?>
						<li class="divider-vertical"></li>
						<li class="<?php if($a['section']=='admin') echo 'active'; ?>"><?php html_link(create_path('admin'),'Admin'); ?></li>
						<?php if(authenticated()){ ?>
							<li><a href="<?php echo SITE_URL; ?>/admin-pages/logout.php">Logout</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="container" style="margin-top:50px;">