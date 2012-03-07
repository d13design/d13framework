<?php
session_start();
require_once '../lib/config.inc.php';

$password_c = crypt($_POST['password'], SALT);
$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
if (!$connection){ die('Could not connect: ' . mysql_error()); }
mysql_select_db(DB_NAME, $connection);
$result = mysql_query("SELECT * FROM ".TBL_PRE."users WHERE username='".$_POST['username']."' AND password='".$password_c."'");
$row = mysql_fetch_row($result);
if($row){
	$_SESSION['username'] = $_POST['username'];
}else{
	$_SESSION['flash'] = 'An error occured with your login - please try again.';
}

header('Location: '.SITE_URL.'/admin');
?>