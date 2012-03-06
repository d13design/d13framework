<form action="<?php echo SITE_URL; ?>/admin-pages/login.php" method="post" class="well">
	<div class="page-header">
		<h1>Administration login</h1>
	</div>
	
	<?php if(isset($_SESSION['flash'])){
		echo '<div class="alert alert-error">'.$_SESSION['flash'].'</div>';
		unset($_SESSION['flash']);
	} ?>

	<label>Username</label>
		<input name="username" type="text" class="span3">
		
	<label>Password</label>
		<input name="password" type="password" class="span3">

	<hr>
	
	<button type="submit" class="btn btn-primary">Login</button> <a href="<?php echo SITE_URL; ?>" class="btn">Cancel</a>
	
	<?php if(ALLOW_REGISTER){ ?>
	
	<hr>
	
	<a href="<?php echo SITE_URL; ?>/admin-pages/register.php" class="btn btn-danger">Register a new admin user</a>
	
	<?php } ?>

</form>