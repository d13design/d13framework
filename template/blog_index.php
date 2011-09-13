<div class="row" style="margin-top:50px;">
	<div class="span5">
		<?php sidebar(); ?>
	</div>
	<div class="span11">
		<div class="page-header">
			<h1>Blog</h1>
		</div>
		<?php
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
		            require($path.'/'.$month.'/'.$file);
		        }
		    }
			closedir($dir_handle); 
		}
		?>
	</div>
</div>