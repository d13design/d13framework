<div class="row" style="margin-top:50px;">
	<div class="span5">
		<?php sidebar(); ?>
	</div>
	<div class="span11">
		<div class="page-header">
			<h1><?php html_link(create_path('blog'), 'Blog'); ?> &raquo; <?php echo pretty_date($a['page']); ?></h1>
		</div>
		<?php
		$path = "content/blog"; 
		$month = $a['page'];
		
			$dir_handle = @opendir($path.'/'.$month) or die("Unable to open $path"); 
			while (false !== ($file = readdir($dir_handle))) {
		        if ($file != "." && $file != "..") {
		            require($path.'/'.$month.'/'.$file);
		        }
		    }
			closedir($dir_handle); 
		
		?>
	</div>
</div>