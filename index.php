<?php

define("BASE_PATH","http://127.0.0.1");
$path = "/framework";

//Define site URLs
define("SITE_URL",BASE_PATH.$path);
define("ASSETS_URL",BASE_PATH.$path.'/assets');

define("SITE_NAME",'framework');
define("SITE_AUTHOR",'Dave Waller');
define("SITE_EMAIL",'site@d13design.co.uk');

//Parse requested URL
$u = $_SERVER['REQUEST_URI'];
$u = str_replace($path,"",$u);
$t = preg_split('[\\/]', $u, -1, PREG_SPLIT_NO_EMPTY);
$a['section'] = $t[0];
$a['page'] = $t[1];
$a['item'] = $t[2];

require_once('helper.php');

//Require header
require('template/header.php');

if($a['section']=='blog'){ //Blog handler
	if($a['page']==''){ // Show the whole blog index...
		require_once('template/blog_index.php');
	}else{
		if($a['item']==''){ // Show the monthly blog index...
			require_once('template/blog_archive.php');
		}else{
			$filename = 'content/'.$a['section'].'/'.$a['page'].'/'.$a['item'].'.php';
			if(file_exists($filename)){
				require_once($filename);
			}else{
				require_once('content/404.php');
			}
		}
	}
}else if($a['section']=='work'){ //Work handler
	if($a['page']==''){ // Show the whole work index...
		require_once('template/work_index.php');
	}else{
		$filename = 'content/'.$a['section'].'/'.$a['page'].'.php';
		if(file_exists($filename)){
			require_once($filename);
		}else{
			require_once('content/404.php');
		}
	}
}else if($a['section']=='pages'){ //Work handler
	$filename = 'content/'.$a['section'].'/'.$a['page'].'.php';
	if(file_exists($filename)){
		if(substr($a[page],0,2)!='--'){
			require_once($filename);
		}else{
			require_once('content/403.php');
		}
	}else{
		require_once('content/404.php');
	}
}else if($a['section']==''){
	require_once('content/home.php');
}else{
	require_once('content/404.php');
}

//Require footer
require('template/footer.php');



?>