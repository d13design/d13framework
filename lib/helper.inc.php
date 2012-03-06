<?php

// 
//  helper.inc.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-11.
//  Copyright 2011 Dave Waller. All rights reserved.
// 

/* Helper to embed a stylesheet */
function html_css($file,$rel="stylesheet"){
	echo '<link rel="'.$rel.'" type="text/css" href="'.SITE_URL.'/template/'.TEMPLATE.'/css/'.$file.'" />';
}

/* Helper to embed javascript */
function html_js($file){
	echo '<script type="text/javascript" src="'.ASSETS_URL.'/js/'.$file.'"></script>';
}

/* Helper to generate HTML for an image */
function html_img($file,$class='',$alt='',$link='',$linkclass='',$title='',$target=''){
	// Always fallback to links opening in _self
	if($target=='' || !isset($target)) $target='_self';
	// If link is provided, open the <a> tag
	if($link != '') echo '<a href="'.$link.'" title="'.$title.'" class="'.$linkclass.'" target="'.$target.'">';
	//Output image HTML
	echo '<img src="'.ASSETS_URL.'/'.$file.'" alt="'.$alt.'" class="'.$class.'" />';
	// If link is provided, close the <a> tag
	if($link != '') echo '</a>';
}

/* Helper to generare HTML for a link */
function html_link($link,$text,$linkClass='',$title='',$target='',$span=false){
	// Always fallback to links opening in _self
	if($target=='' || !isset($target)) $target='_self';
	echo '<a href="'.$link.'" title="'.$title.'" class="'.$linkClass.'" target="'.$target.'">';
	if($span) echo '<span>';
	echo $text;
	if($span) echo '</span>';
	echo '</a>';
}

/* Helper to create a compatible path */
function create_path($a='',$b='',$c=''){
	$pathString = '';
	if($a!=''){
		$pathString = $pathString.'/'.$a;
	}
	if($a!='' && $b!=''){
		$pathString = $pathString.'/'.$b;
	}
	if($a!='' && $b!='' && $c!=''){
		$pathString = $pathString.'/'.$c;
	}
	return SITE_URL.$pathString;
}

/* Helper to get the section name from a provided slug */
function get_section($slug){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$r = mysql_query("SELECT title FROM sections WHERE slug='".$slug."'");
	$rw = mysql_fetch_row($r);
	return($rw[0]);
}

/* Helper to list pages */
function list_pages($a){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$result = mysql_query("SELECT * FROM pages");
	mysql_close($connection);
	while($row = mysql_fetch_array($result)){
		if($a['section']=='pages' && $a['page']==$row['slug']){ $class="active"; }else{ $class=""; }
        echo '<li class="'.$class.'">';
		html_link(create_path('pages',$row['slug']),$row['title']);
		echo '</li>';
	}
}

/* Helper to list content sections */
function list_sections($a){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$result = mysql_query("SELECT * FROM sections");
	mysql_close($connection);
	while($row = mysql_fetch_array($result)){
		if($a['section']==$row['slug']){ $class="active"; }else{ $class=""; }
        echo '<li class="'.$class.'">';
		html_link(create_path($row['slug']),$row['title']);
		echo '</li>';
	}
}

/* Helper to return article data in an array */    /* NEEDS DOCS */
function get_articles($section_slug,$start=0,$total=1000000){
	$articles = array();
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$r = mysql_query("SELECT id FROM sections WHERE slug='".$section_slug."'");
	$rw = mysql_fetch_row($r);
	$result = mysql_query("SELECT * FROM articles WHERE section_id=".$rw[0]." ORDER BY created DESC LIMIT ".$start.", ".$total);
	mysql_close($connection);
	
	while($row = mysql_fetch_array($result)){
        $articles[] = array(
        	'id'			=> $row['id'],
        	'section_id'	=> $row['section_id'],
        	'section_slug'	=> $section_slug,
        	'title'			=> $row['title'],
        	'slug'			=> $row['slug'],
        	'synopsis'		=> $row['synopsis'],
        	'created'		=> $row['created'],
        );
	}
	return($articles);
}

/* Helper to return latest articles */
function list_articles($section_slug='',$total=5,$icon='file'){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	
	if($section_slug != ''){
		$r = mysql_query("SELECT id FROM sections WHERE slug='".$section_slug."'");
		$rw = mysql_fetch_row($r);
		$result = mysql_query("SELECT * FROM articles WHERE section_id=".$rw[0]." ORDER BY created DESC LIMIT 0, ".$total);
		mysql_close($connection);
		while($row = mysql_fetch_array($result)){
			echo '<li><i class="icon-'.$icon.'"></i>';
			html_link(create_path($section_slug,$row['slug']),$row['title']);
     	   echo '</li>';
		}
	}else{
		$r = mysql_query("SELECT * FROM sections");
		$slugs = array();
		while($row = mysql_fetch_array($r)){
			$slugs[$row['id']] = $row['slug'];
		}
		$result = mysql_query("SELECT * FROM articles ORDER BY created DESC LIMIT 0, ".$total);
		mysql_close($connection);
		while($row = mysql_fetch_array($result)){
			echo '<li><i class="icon-'.$icon.'"></i>';
			html_link(create_path($slugs[$row['section_id']],$row['slug']),$row['title']);
     		echo '</li>';
		}
	}
}

/* Helper to get the contents of a page */
function get_page($page_slug){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$result = mysql_query("SELECT * FROM pages WHERE slug='".$page_slug."'");
	mysql_close($connection);
	$page_data = array();
	$row = mysql_fetch_row($result);
	$page_data['id'] = $row[0];
	$page_data['title'] = $row[1];
	$page_data['contents'] = $row[3];
	return($page_data);
}

/* Helper to get the contents of an article */
function get_article($slug){
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$result = mysql_query("SELECT * FROM articles WHERE slug='".$slug."'");
	$article = array();
	$row = mysql_fetch_row($result);
	$article['id'] = $row[0];
	$article['section_id'] = $row[1];
	$result2 = mysql_query("SELECT * FROM sections WHERE id=".$row[1]);
	$row2 = mysql_fetch_row($result2);
	$article['section_title'] = $row2[1];
	$article['section_slug'] = $row2[2];
	$article['title'] = $row[2];
	$article['slug'] = $row[3];
	$article['synopsis'] = $row[4];
	$article['contents'] = $row[5];
	$article['created'] = strtotime($row[6]);
	mysql_close($connection);
	return($article);
}

/* Helper to convert a 'created' timestamp into "March 2012" */
function pretty_date($archive,$length='short'){
	if($length=='short'){		return date("F Y",$archive); }
	if($length=='medium'){		return date("d F Y",$archive); }
	if($length=='long'){		return date("l, d F Y",$archive); }
	if($length=='x-long'){		return date("l, d F Y - H:i a",$archive); }
}

/* A helper to trim a string to a given number of words */
function trimmer($str, $len=12, $extra='&#133;'){
	$pieces = explode(" ", $str);
	$op = '';
	for($a=0;$a<$len;$a++){
		$op = $op.$pieces[$a].' ';
	}
	if(count($pieces)>$len) $op = $op.$extra;
	return $op;
}

/* Helper to create pagination based on an array of content files */
function pagination($pagelist,$section,$qs,$first="&larr;",$prev="&lt;",$next="&gt;",$last="&rarr;"){
	if(count($pagelist) > PAGE_COUNT){
		//PAGINATION
		$items = array();
		//First page and previous links...
		if($qs==0){
			$items[] = '<li class="prev disabled"><a href="#">'.$first.'</a></li>';
			$items[] = '<li class="disabled"><a href="#">'.$prev.'</a></li>';
		}else{
			$items[] = '<li class="prev"><a title="First page" href="'.create_path($section).'">'.$first.'</a></li>';
			$items[] = '<li><a title="Previous page" href="'.create_path($section.'?'.($qs-PAGE_COUNT)).'">'.$prev.'</a></li>';
		}
		//Page links...
		for($x=0;$x<ceil(count($pagelist)/PAGE_COUNT);$x++){
			if($x*PAGE_COUNT==$qs){
				$items[] = '<li class="active"><a href="">'.($x+1).'</a></li>';
			}else{
				$items[] = '<li><a title="Page '.($x+1).'" href="'.create_path($section.'?'.($x*PAGE_COUNT)).'">'.($x+1).'</a></li>';
			}
		}
		//Next and last links...
		if($qs+PAGE_COUNT >= count($pagelist)){
			$items[] = '<li class="disabled"><a href="#">'.$next.'</a></li>';
			$items[] = '<li class="next disabled"><a href="#">'.$last.'</a></li>';
		}else{
			$items[] = '<li><a title="Next page" href="'.create_path($section.'?'.($qs+PAGE_COUNT)).'">'.$next.'</a></li>';
			$items[] = '<li class="next"><a title="Last page" href="'.create_path($section.'?'.(($x-1)*PAGE_COUNT)).'">'.$last.'</a></li>';
		}
		//Render pagination...
		echo '<div class="pagination"><ul>';
		foreach($items as $item){
			echo $item;
		}
		echo '</ul></div>';
	}
}

/* Helper to get the latest tweet from a provided Twitter username */
function get_status($twitter_id, $hyperlinks = true) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($c);
    curl_close($c);
    preg_match('/<text>(.*)<\/text>/', $src, $m);
    $status = htmlentities($m[1]);
    if( $hyperlinks ) $status = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", '<a href="%5C%22%5C%5C0%5C%22">\\0</a>', $status);
    if($status){    
   		return($status);
   	}else{
   		return('No tweets were returned, follow <a href="http://twitter.com/'.$twitter_id.'" target="_blank">@'.$twitter_id.'</a> on Twitter');
   	}
}









/* Admin helpers */

/* Helper to decide if a user is authenticated */
function authenticated(){
	if(isset($_SESSION['username'])){
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("SELECT id FROM users WHERE username='".$_SESSION['username']."'");
		$row = mysql_fetch_row($result);
		if($row[0]){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


?>