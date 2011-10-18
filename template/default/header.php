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

		<?php html_css('less/bootstrap.less','stylesheet/less'); ?>
		<?php html_css('prettify.css'); ?>

		<?php html_js('less-1.1.3.min.js'); ?>
		<?php html_js('jquery-1.6.2.min.js'); ?>
		<?php html_js('prettify.js'); ?>
		<?php html_js('application.js'); ?>  
		
		<link href="<?php echo ASSETS_URL; ?>/images/ico/favicon.ico" rel="shortcut icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">

	</head>

	<body onload="prettyPrint();">

		<div class="topbar">
			<div class="fill">
				<div class="container fixed">
					<h3><?php html_link(create_path(),SITE_NAME); ?></h3>
					<ul>
						<li class="<?php if($a['section']=='') echo 'active'; ?>"><?php html_link(create_path(),'Home'); ?></li>
						<?php list_sections(); ?>
					</ul>
					<ul class="nav secondary-nav">
						<?php list_pages(); ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">