<div class="page-header" style="margin-top:50px;">
	<h1>Work</h1>
</div>
<?php
$path = "content/work"; 
$dir_handle = @opendir($path) or die("Unable to open $path"); 
while (false !== ($file = readdir($dir_handle))) {
    if ($file != "." && $file != "..") {
        require($path.'/'.$file);
    }
}
closedir($dir_handle); 
?>