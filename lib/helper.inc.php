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

/* Helper to list pages */
function list_pages(){
	$path = "content/pages"; 
	$dir_handle = @opendir($path) or die("Unable to open $path"); 
	while (false !== ($file = readdir($dir_handle))) {
        if ($file != "." && $file != "..") {
            echo '<li class="'.$class.'">';
			html_link(create_path('pages',substr($file, 0, -4)),ucfirst(substr($file, 0, -4)));
			echo '</li>';
        }
    }
	closedir($dir_handle); 
}

/* Helper to list content sections */
function list_sections(){
	$path = "content"; 
	$dir_handle = @opendir($path.'/'.$month) or die("Unable to open $path"); 
	while (false !== ($file = readdir($dir_handle))) {
        if ($file != "." && $file != ".." && $file != 'pages') {
            echo '<li class="'.$class.'">';
			html_link(create_path($file),ucfirst($file));
			echo '</li>';
        }
    }
	closedir($dir_handle); 
}

/* Helper to convert "2011-08" into "August 2011" */
function pretty_date($archive){
	$m = substr($archive,-2,2);
	$y = substr($archive,0,4);
	$date = mktime(0,0,0,$m,1,$y);
	return date("F Y",$date);
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







function pagination($pagelist,$section,$qs,$first="&lt;&lt;",$prev="&lt;",$next="&gt;",$last="&gt;&gt"){
	if(count($pagelist) > PAGE_COUNT){
		//PAGINATION
		$items = array();
		//First page and previous links...
		if($qs==0){
			$items[] = $first.'&nbsp;';
			$items[] = $prev.'&nbsp;';
		}else{
			$items[] = '<a title="First page"    href="'.create_path($section).'">'.$first.'</a>&nbsp;';
			$items[] = '<a title="Previous page" href="'.create_path($section.'?'.($qs-PAGE_COUNT)).'">'.$prev.'</a>&nbsp;';
		}
		//Page links...
		for($x=0;$x<ceil(count($pagelist)/PAGE_COUNT);$x++){
			if($x*PAGE_COUNT==$qs){
				$items[] = '<span class="current-page">'.($x+1).'</span>&nbsp;';
			}else{
				$items[] = '<a title="Page '.($x+1).'" href="'.create_path($section.'?'.($x*PAGE_COUNT)).'">'.($x+1).'</a>&nbsp;';
			}
		}
		//Next and last links...
		if($qs+PAGE_COUNT >= count($pagelist)){
			$items[] = $next.'&nbsp;';
			$items[] = $last;
		}else{
			$items[] = '<a title="Next page"  href="'.create_path($section.'?'.($qs+PAGE_COUNT)).'">'.$next.'</a>&nbsp;';
			$items[] = '<a title="Last page"  href="'.create_path($section.'?'.(($x-1)*PAGE_COUNT)).'">'.$last.'</a>';
		}
		//Render pagination...
		echo '<p class="pagination">';
		foreach($items as $item){
			echo $item;
		}
		echo '</p>';
	}
}

?>