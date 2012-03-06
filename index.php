<?php

// 
//  index.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-11.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

session_start();

$time=explode(' ',microtime());$time=$time[1]+$time[0];$begintime=$time;

require_once 'lib/config.inc.php';
require_once 'lib/route.inc.php';
require_once 'lib/helper.inc.php';
require_once 'lib/dribbble.inc.php';

//Require header
if($a['section']!='admin'){
	require('template/'.TEMPLATE.'/header.php');
}else{
	require('template/admin/header.php');
}

//Require url-processor and page loader
require_once 'lib/loader.inc.php';

//Require footer
$time=explode(" ",microtime());$time=$time[1]+$time[0];$endtime=$time;$totaltime=($endtime-$begintime); //decrease to get total time
if($a['section']!='admin'){
	require('template/'.TEMPLATE.'/footer.php');
}else{
	require('template/admin/footer.php');
}

?>