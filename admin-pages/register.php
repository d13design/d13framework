<?php
session_start();
require_once '../lib/config.inc.php';

if(!ALLOW_REGISTER){
	$_SESSION['flash'] = 'Registration has been disabled for this site.';
	header('Location: '.SITE_URL.'/admin');
}else{

	if(isset($_POST['username'])){
		//process
		$password_c = crypt($_POST['password'], SALT);
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("INSERT INTO ".TBL_PRE."users (username,password,email) VALUES ('".$_POST['username']."','".$password_c."','".$_POST['email']."');");
	}else{
		//form
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
		<link rel="stylesheet" href="<?php echo SITE_URL; ?>/template/admin/css/bootstrap.css">
		<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ASSETS_URL; ?>/js/bootstrap/bootstrap.js"></script> 
		<link href="<?php echo ASSETS_URL; ?>/images/ico/favicon.ico" rel="shortcut icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon">
		<link href="<?php echo ASSETS_URL; ?>/images/ico/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon">
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a href="<?php echo SITE_URL; ?>" title="" class="brand" target="_self"><?php echo SITE_NAME; ?></a>
					<ul class="nav">
						<li class=""><a href="<?php echo SITE_URL; ?>" title="" class="" target="_self">&larr; Site Home</a></li>
						<li class=""><a href="<?php echo SITE_URL; ?>/admin" title="" class="" target="_self">Login</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container" style="margin-top:50px;">
			<form action="<?php echo SITE_URL; ?>/admin-pages/register.php" method="post" class="well">
				<div class="page-header">
					<h1>Admin registration</h1>
				</div>
				
				<div class="alert alert-info">
					<h4 class="alert-heading">Beware!</h4>
					Leaving your registration open can lead to misuse - when you have registered your admin users you should disable registration in your config file.
				</div>
				
				<label>Username</label>
					<input name="username" type="text" class="span3">
				<label>Password</label>
					<input name="password" type="text" class="span3">
				<label>Email address</label>
					<input name="email" type="text" class="span4">
				<hr>
				<button type="submit" class="btn">Register</button> <a href="<?php echo SITE_URL; ?>" class="btn">Cancel</a>
			</form>
			
			<footer class="footer">
				<p>All content is &copy; <?php echo SITE_NAME; ?> -- <?php echo SITE_AUTHOR; ?></p>
			</footer>
		</div>
	</body>
</html>
		<?php
	}
	
}
?>