<?php
// 
//  loader.inc.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-17.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

if($a['section']==''){
	// No section is specified so load the homepage template file
	require_once('template/'.TEMPLATE.'/home.php');
}else{
	if($a['section']!='' && $a['page']==''){
		// A section is required but no page
		$filename = 'content/'.$a['section'];
		if(!is_dir($filename)){
			// The section doesn't exist - serve a 404
			require_once('template/'.TEMPLATE.'/404.php');
		}else{
			// The section exists - load it
			require_once('template/'.TEMPLATE.'/archive.php');
		}
	}else if($a['section']!='' && $a['page']!=''){
		// A section and a page are required
		$filename = 'content/'.$a['section'].'/'.$a['page'].'.php';
		if(!file_exists($filename)){
			// The page doesn't exist - serve a 404
			require_once('template/'.TEMPLATE.'/404.php');
		}else{
			// The page exists - load it
			require_once($filename);
		}
	}else{
		// Not quite sure what's required - try a 404
		require_once('template/'.TEMPLATE.'/404.php');
	}
}

?>