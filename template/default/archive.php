<?php 
// 
//  archive.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<div class="row">
	<div class="span11">
		<div class="page-header" style="margin-top:50px;">
			<h1><?php echo ucfirst($a['section']); ?></h1>
		</div>
		
		<div class="alert-message info">
			<a class="close" href="#" onclick="$('.info').fadeOut();return false;">x</a>
			<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/archive.php</strong></p>
		</div>
		
		<?php
		if(!isset($a['qs'])) $a['qs']=0;
		
		$path = "content/".$a['section'];
		$count = 0;
		$pagelist = array();
		$dir_handle = @opendir($path) or die("Unable to open $path"); 
		while (false !== ($file = readdir($dir_handle))) {
		    if ($file != "." && $file != "..") {
		        $pagelist[] = $path.'/'.$file;
				$count++;
		    }
		}
		closedir($dir_handle); 
		if($count==0){
			require_once('template/'.TEMPLATE.'/empty.php');
		}
		
		for($x=$a['qs'];$x<$a['qs']+PAGE_COUNT;$x++){
			if($pagelist[$x]){
				require($pagelist[$x]);
			}
		}
		
		pagination($pagelist,$a['section'],$a['qs']);
		?>
	</div>
	<div class="span5">
		<?php require_once('template/'.TEMPLATE.'/sidebar.php'); ?>
	</div>
</div>
