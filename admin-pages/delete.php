<?php
session_start();
require_once '../lib/config.inc.php';
require_once '../lib/helper.inc.php';

if(authenticated){
	if($_GET['type']=='article'){
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("DELETE FROM articles WHERE id=".$_GET['id']);
		header('Location: '.SITE_URL.'/admin/view-articles');
	}
	if($_GET['type']=='page'){
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("DELETE FROM pages WHERE id=".$_GET['id']);
		header('Location: '.SITE_URL.'/admin/view-pages');
	}
	if($_GET['type']=='section' && $_GET['id']!=1){
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("DELETE FROM sections WHERE id=".$_GET['id']);
		$result2 = mysql_query("UPDATE articles SET section_id='1' WHERE section_id=".$_GET['id']);
		header('Location: '.SITE_URL.'/admin/view-sections');
	}
}else{
	header('Location: '.SITE_URL);
}
?>