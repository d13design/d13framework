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
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	if($a['section']=='admin'){
		// An admin page has been requested
		if(authenticated() && $a['page']!=''){
			// A detailed admin page has been requested by an authenticated user
			require_once('admin-pages/'.$a['page'].'.php');
		}else if(authenticated()){
			// An authenticated user is requesting the admin home
			require_once('admin-pages/dashboard.php');
		}else{
			// User is not authenticated
			require_once('admin-pages/index.php');
		}
	}else if($a['section']=='pages' && $a['page']!=''){
		// A page has been requested
		$result = mysql_query("SELECT id FROM pages WHERE slug='".$a['page']."'");
		$num_rows = mysql_num_rows($result);
		if($num_rows==0){
			// The page doesn't exist - serve a 404
			require_once('template/'.TEMPLATE.'/404.php');
		}else{
			// The page exists - load it
			require_once('template/'.TEMPLATE.'/page.php');
		}
	}else if($a['section']!='' && $a['page']==''){
		// A section is required but no page
		$result = mysql_query("SELECT * FROM sections WHERE slug='".$a['section']."'");
		$num_rows = mysql_num_rows($result);
		if($num_rows==0){
			// The section doesn't exist - serve a 404
			require_once('template/'.TEMPLATE.'/404.php');
		}else{
			// The section exists - load it
			require_once('template/'.TEMPLATE.'/archive.php');
		}
	}else if($a['section']!='' && $a['page']!=''){
		// A section and a page are required
		$result = mysql_query("SELECT id FROM sections WHERE slug='".$a['section']."'");
		while($row = mysql_fetch_array($result)){ $section_id = $row['id']; }
		$result2 = mysql_query("SELECT * FROM articles WHERE slug='".$a['page']."' AND section_id=".$section_id);
		$num_rows = mysql_num_rows($result2);
		if($num_rows==0){
			// The page doesn't exist - serve a 404
			require_once('template/'.TEMPLATE.'/404.php');
		}else{
			// The page exists - load it
			require_once('template/'.TEMPLATE.'/article.php');
		}
	}else{
		// Not quite sure what's required - try a 404
		require_once('template/'.TEMPLATE.'/404.php');
	}
	mysql_close($connection);
}

?>