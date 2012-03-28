<div class="page-header">
	<h1><?php html_link(create_path('admin'), 'Admin'); ?> &gt; View sections</h1>
</div>

<ul class="nav nav-tabs">
	<li><?php html_link(create_path('admin'), '<i class="icon-list-alt"></i> Dashboard'); ?></li>
	<li><?php html_link(create_path('admin','view-articles'), '<i class="icon-file"></i> Articles'); ?></li>
	<li><?php html_link(create_path('admin','view-pages'), '<i class="icon-book"></i> Pages'); ?></li>
	<li class="active"><?php html_link(create_path('admin','view-sections'), '<i class="icon-folder-open"></i> Sections'); ?></li>
	<li><?php html_link(create_path('admin','view-assets'), '<i class="icon-picture"></i> Assets'); ?></li>
	<li><?php html_link(create_path('admin','template-help'), '<i class="icon-info-sign"></i> Template help'); ?></li>
</ul>

<p style="text-align:right;">
	<a href="<?php echo SITE_URL; ?>/admin/create-section" title="Create a new section" class="btn btn-inverse"><i class="icon-star icon-white"></i> Create a new section</a>
</p>

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="50%">Title</th>
			<th width="35%">Slug</th>
			<th width="10%">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
		if (!$connection){ die('Could not connect: ' . mysql_error()); }
		mysql_select_db(DB_NAME, $connection);
		$result = mysql_query("SELECT * FROM ".TBL_PRE."sections ORDER BY title ASC");
		mysql_close($connection);
		while($row = mysql_fetch_array($result)){
			echo '<tr><td>'.$row['id'].'</td><td><i class="icon-search"></i> ';
			html_link(create_path($row['slug']),rawurldecode($row['title']));
     		echo '</td><td>'.$row['slug'].'</td>';
     		echo '<td><div class="btn-toolbar" style="margin:0px;"><div class="btn-group">';
     		echo '<a class="btn btn-primary" href="'.SITE_URL.'/admin/edit-section/'.$row['id'].'" title="Edit '.rawurldecode($row['title']).'"><i class="icon-pencil icon-white"></i></a>';
     		if($row['id']!=1){
     			echo '<a class="btn btn-danger" href="#" onclick="confirmer(\''.SITE_URL.'/admin-pages/delete.php?id='.$row['id'].'&type=section\',\''.rawurldecode($row['title']).'\'); return false;" title="Delete '.rawurldecode($row['title']).'"><i class="icon-trash icon-white"></i></a>';
     		}else{
     			echo '<span class="btn"><i class="icon-trash icon-white"></i></span>';
     		}
     		echo '</div></div></td></tr>';
		}
		?>

	</tbody>
</table>

<script>
function confirmer(url,title){
	if(window.confirm('Are you sure you want to delete the section "'+title+'"')){
		window.location = url;
	}
}
</script>