<?php

/* Helper to embed a stylesheet */
function html_css($file,$rel="stylesheet"){
	echo '<link rel="'.$rel.'" type="text/css" href="'.ASSETS_URL.'/css/'.$file.'" />';
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
	$dir_handle = @opendir($path.'/'.$month) or die("Unable to open $path"); 
	while (false !== ($file = readdir($dir_handle))) {
        if ($file != "." && $file != ".." && substr($file,0,2) != '--') {
            echo '<li>';
			html_link(create_path('pages',substr($file, 0, -4)),ucfirst(substr($file, 0, -4)));
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

/* A helper to generate a blog style sidebar */
function sidebar($logoFile='',$blogList=true,$monthList=true,$workList=true,$pageList=true){
	
	if($logoFile!=''){
		html_img($logoFile,'sidebar-logo',SITE_NAME);
	}
	
	if($blogList){
		echo '<h2>Blog</h2>';
		echo '<ul class="sidebar-list blog">';
		$path = "content/blog"; 
		$months = array();
		$dir_handle = @opendir($path) or die("Unable to open $path"); 
			while (false !== ($file = readdir($dir_handle))) {
		        if ($file != "." && $file != "..") {
		            $months[] = $file;
		        }
		    }
		closedir($dir_handle); 
		rsort($months);
		foreach ($months as $month) {
			$dir_handle = @opendir($path.'/'.$month) or die("Unable to open $path"); 
			while (false !== ($file = readdir($dir_handle))) {
		        if ($file != "." && $file != "..") {
		        	$sb=true;
		        	echo '<li>';
		            require($path.'/'.$month.'/'.$file);
					echo '</li>';
					$sb=false;
		        }
		    }
			closedir($dir_handle); 
		}
		echo '</ul>';
	}
	
	if($monthList){
		echo '<h2>Archive</h2>';
		echo '<ul class="sidebar-list archive">';
		$path = "content/blog"; 
		$months = array();
		$dir_handle = @opendir($path) or die("Unable to open $path"); 
			while (false !== ($file = readdir($dir_handle))) {
		        if ($file != "." && $file != "..") {
		            $months[] = $file;
		        }
		    }
		closedir($dir_handle); 
		rsort($months);
		foreach ($months as $month) {
        	echo '<li>';
			html_link(create_path('blog',$month),pretty_date($month));
			echo '</li>';
		}
		echo '</ul>';
	}
	
	if($workList){
		echo '<h2>Work</h2>';
		echo '<ul class="sidebar-list work">';
		$path = "content/work"; 
		$dir_handle = @opendir($path) or die("Unable to open $path"); 
		while (false !== ($file = readdir($dir_handle))) {
		    if ($file != "." && $file != "..") {
		    	$sb=true;
				echo '<li>';
		        require($path.'/'.$file);
		        echo '</li>';
				$sb=false;
		    }
		}
		closedir($dir_handle);
		echo '</ul>'; 
	}
	
	if($pageList){
		echo '<h2>Pages</h2>';
		echo '<ul class="sidebar-list pages">';
		list_pages();
		echo '</ul>';
	}
	
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


?>