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
$a['section'] = $t[0];
$a['page'] = $t[1];
$a['item'] = $t[2];

?>