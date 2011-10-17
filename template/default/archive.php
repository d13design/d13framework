<!-- 
      archive.php
      d13design
      
      Created by Dave Waller on 2011-10-11.
      Copyright 2011 Dave Waller. All rights reserved.
 -->

<div class="page-header" style="margin-top:50px;">
	<h1><?php echo ucfirst($a['section']); ?></h1>
</div>

<div class="alert-message info">
	<a class="close" href="#" onclick="$('.info').fadeOut();return false;">x</a>
	<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/archive.php</strong></p>
</div>

<?php
$path = "content/".$a['section'];
$count = 0;
$dir_handle = @opendir($path) or die("Unable to open $path"); 
while (false !== ($file = readdir($dir_handle))) {
    if ($file != "." && $file != "..") {
        require($path.'/'.$file);
		$count++;
    }
}
closedir($dir_handle); 
if($count==0){
	require_once('template/'.TEMPLATE.'/empty.php');
}
?>