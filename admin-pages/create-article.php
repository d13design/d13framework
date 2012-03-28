<?php if(isset($_POST['title']) && isset($_POST['slug']) && isset($_POST['section']) && isset($_POST['synopsis']) && isset($_POST['contents']) && $_POST['title']!='' && $_POST['slug']!='' && $_POST['section']!='' && $_POST['synopsis']!='' && $_POST['contents']!=''){

	$div = array("div"); $p = array("p");
	$string = (str_replace($div,$p,$_POST['contents']));
	
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
	if (!$connection){ die('Could not connect: ' . mysql_error()); }
	mysql_select_db(DB_NAME, $connection);
	$result = mysql_query("INSERT INTO ".TBL_PRE."articles (section_id,title,slug,synopsis,contents,custom_data) VALUES (".rawurlencode($_POST['section']).",'".rawurlencode($_POST['title'])."','".$_POST['slug']."','".rawurlencode($_POST['synopsis'])."','".rawurlencode($string)."','".rawurlencode($_POST['custom_data'])."');");
	mysql_close($connection);
	?>
	<div class="page-header">
		<h1><?php html_link(create_path('admin'), 'Admin'); ?> &gt; Article created</h1>
	</div>
	<div class="alert alert-success">Your article <strong><?php echo $_POST['title']; ?></strong> was successfully created.</div>
	<p>
	<?php html_link(create_path('admin','create-article'), 'Create another article', 'btn btn-primary'); ?>
	<?php html_link(create_path('admin','view-articles'), 'View your articles', 'btn btn-primary'); ?>
	</p>
<?php }else{ ?>
<div class="page-header">
	<h1><?php html_link(create_path('admin'), 'Admin'); ?> &gt; Create a new article</h1>
</div>

<ul class="nav nav-tabs">
	<li><?php html_link(create_path('admin'), '<i class="icon-list-alt"></i> Dashboard'); ?></li>
	<li class="active"><?php html_link(create_path('admin','view-articles'), '<i class="icon-file"></i> Articles'); ?></li>
	<li><?php html_link(create_path('admin','view-pages'), '<i class="icon-book"></i> Pages'); ?></li>
	<li><?php html_link(create_path('admin','view-sections'), '<i class="icon-folder-open"></i> Sections'); ?></li>
	<li><?php html_link(create_path('admin','view-assets'), '<i class="icon-picture"></i> Assets'); ?></li>
	<li><?php html_link(create_path('admin','template-help'), '<i class="icon-info-sign"></i> Template help'); ?></li>
</ul>

<form class="form-horizontal" action="" method="post" id="form">
	<fieldset>
		<legend>Your new article</legend>
		<div class="control-group">
			<label class="control-label" for="title">Title</label>
			<div class="controls">
				<input type="text" class="input-xlarge span6" id="title" name="title" onkeyup="updateSlug();">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="slug">Slug</label>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input-xlarge span5" id="slug" name="slug" onkeyup="checkSlug();">
					<span class="add-on" id="slug-check"><i class="icon-ban-circle"></i></span>
				</div>
				<p class="help-block">Don't use spaces or special characters - this slug is used to create your article URL</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="section">Section</label>
			<div class="controls">
				<select id="section" name="section" class="input-xlarge span4">
					<?php
					$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
					if (!$connection){ die('Could not connect: ' . mysql_error()); }
					mysql_select_db(DB_NAME, $connection);
					$r = mysql_query("SELECT * FROM ".TBL_PRE."sections");
					while($row = mysql_fetch_array($r)){
						echo '<option value="'.$row['id'].'">'.rawurldecode($row['title']).'</option>';
					}
					mysql_close($connection);
					?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="synopsis">Synopsis</label>
			<div class="controls">
				<textarea id="synopsis" name="synopsis" class="input-xlarge span6"></textarea>
				<p class="help-block">A short intro to your article with no HTML</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="contents">Contents</label>
			<div class="controls">
				<textarea id="contents" name="contents" class="input-xlarge span6" rows="8"><div>Add your article contents here</div></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="synopsis">Custom data</label>
			<div class="controls">
				<textarea id="custom_data" name="custom_data" class="input-xlarge span6"></textarea>
				<p class="help-block">Any additional data to store alongside your article - you can process this data in your template</p>
			</div>
		</div>
		<div class="form-actions">
			<input type="button" class="btn btn-primary" value="Create article" onclick="validate();">
			<?php html_link(create_path('admin','view-articles'), 'Cancel', 'btn'); ?>
		</div>
	</fieldset>
</form>

<script>
	
	function validate(){
		nicEditors.findEditor('contents').saveContent();
		failed = 0;
		if($('#title').val()==''){ failed = 1; }
		if($('#slug-check').html()=='<i class="icon-remove icon-white"></i>'){ failed = 1; }
		if($('#synopsis').val()==''){ failed = 1; }
		if($('#contents').val()==''){ failed = 1; }
		if(failed==0){
			$('#form').submit();
		}
	}

	function updateSlug(){
		temp = $('#title').val();
		temp = temp.replace(/\s/g , "-");
		temp = temp.toLowerCase();
		$('#slug').val(temp);
		checkSlug();
	}
	
	function checkSlug(){
		<?php /* Create an array of used slugs */ ?>
		slugs = new Array(<?php
			$connection = mysql_connect(DB_HOST,DB_USER,DB_PWRD);
			if (!$connection){ die('Could not connect: ' . mysql_error()); }
			mysql_select_db(DB_NAME, $connection);
			$r = mysql_query("SELECT slug FROM ".TBL_PRE."articles");
			while($row = mysql_fetch_array($r)){
				echo '"'.$row['slug'].'",';
			}
			mysql_close($connection);
		?>"");
		temp = $('#slug').val();
		<?php /* Is the slug empty? */ ?>
		if(temp.length==0){
			$('#slug-check').removeClass('btn-success');
			$('#slug-check').addClass('btn-danger');
			$('#slug-check').html('<i class="icon-remove icon-white"></i>');
		}
		<?php /* Is the slug ok, so far? */ ?>
		if(temp.length>0){
			$('#slug-check').removeClass('btn-danger');
			$('#slug-check').addClass('btn-success');
			$('#slug-check').html('<i class="icon-ok icon-white"></i>');
		}
		<?php /* Does the slug include a space? */ ?>
		temp2 = temp.split(" ");
		if(temp2.length>1){
			$('#slug-check').removeClass('btn-success');
			$('#slug-check').addClass('btn-danger');
			$('#slug-check').html('<i class="icon-remove icon-white"></i>');
		}
		<?php /* Has the slug already been used? */ ?>
		found = 0;
		for(a=0;a<slugs.length;a++){
			if(temp==slugs[a]){ found = 1; }
		}
		if(found==1){
			$('#slug-check').removeClass('btn-success');
			$('#slug-check').addClass('btn-danger');
			$('#slug-check').html('<i class="icon-remove icon-white"></i>');
		}
		<?php /* Is the last character a space (-)? */ ?>
		if(temp.substr(temp.length-1,1)=="-"){
			$('#slug-check').removeClass('btn-success');
			$('#slug-check').addClass('btn-danger');
			$('#slug-check').html('<i class="icon-remove icon-white"></i>');
		}
	}
	
	checkSlug();
</script>
<?php } ?>