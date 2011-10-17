<?php

// 
//  route.inc.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-11.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

//Parse requested URL
$u = $_SERVER['REQUEST_URI'];
$u = str_replace($path,"",$u);
$t = preg_split('[\\/]', $u, -1, PREG_SPLIT_NO_EMPTY);
$section = explode("?",$t[0]);
$a['section'] = $section[0];
$a['qs'] = $section[1];
$a['page'] = $t[1];
$a['items'] = array();
for($b=2;$b<count($t);$b++){ $a['items'][] = $t[$b]; }

if(count($a['items'])==0) unset($a['items']);
if($a['page']=='') unset($a['page']);
if($a['qs']=='') unset($a['qs']);
if($a['section']=='') unset($a['section']);

//print_r($a);

?>