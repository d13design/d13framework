<div class="page-header" style="margin-top:50px;">
	<h1>Blog post creator</h1>
</div>

<div class="alert-message error">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p><strong>Heads up!</strong> You probably don't want this file visible on your live site ;-) Try adding 2 hyphens to the start of the filename to hide it from the site!</p>
</div>

<form>
	<fieldset>
		<legend>Create a new blog post</legend>

		<div class="clearfix">
			<label for="title">Title</label>
			<div class="input">
				<input class="xlarge" id="title" name="title" size="30" type="text" onkeyup="updateFN();"> <input class="large" id="fn" name="fn" size="20" type="text" readonly="true">
			</div>
  		</div><!-- /clearfix -->
  		
  		<div class="clearfix">
			<label for="synopsis">Synopsis</label>
			<div class="input">
				<textarea class="xxlarge" id="synopsis" name="synopsis"></textarea>
				<span class="help-block">
					You can use simple HTML in the synopsis :-P
				</span>
			</div>
		</div><!-- /clearfix -->
		
		<div class="clearfix">
			<label>Date</label>
			<div class="input">
				<select class="medium" name="month" id="month">
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select> <input class="mini" id="year" name="year" size="4" type="text" value="2011">
			</div>
		</div><!-- /clearfix -->
  		
  		<div class="clearfix">
			<label for="content">Content</label>
			<div class="input">
				<textarea class="xxlarge" id="content" name="content" rows="15"></textarea>
				<span class="help-block">
					You can use HTML in the post content :-P
				</span>
			</div>
		</div><!-- /clearfix -->
  		
		<div class="actions">
			<button class="btn primary" onclick="generate();return false;">Generate PHP</button>
		</div>
		
		<div class="clearfix">
			<label for="generated">Generated PHP</label>
			<div class="input">
				<textarea class="xxlarge" id="generated" name="generated" rows="15" readonly="true"></textarea>
				<span class="help-block">
					Create a new file called <span id="filename" style="font-weight:bold;"></span> and paste these contents into it.
				</span>
			</div>
		</div><!-- /clearfix -->
		
	</fieldset>
</form>

<script>
	function generate(){
		outputString = '<'+'?'+'php\n';
		outputString += '$filename = \''+$('#fn').val().substring(0,$('#fn').val().length-4)+'\';\n';
		outputString += '$title = \''+$('#title').val()+'\';\n';
		outputString += '$archive = \''+$('#year').val()+'-'+$('#month').val()+'\';\n';
		outputString += '$synopsis = \''+$('#synopsis').val()+'\';\n';
		
		outputString += 'if($a[\'item\']==\'\' && !$sb){\n';
		outputString += '    require(\'template/blog_mini.php\');\n';
		outputString += '}else if($sb){\n';
		outputString += '    html_link(create_path(\'blog\',$archive,$filename), $title);\n';
		outputString += '}else{ ?>\n';
		
		outputString += '    <div class="row" style="margin-top:50px;">\n';
		outputString += '        <div class="span5">\n';
		outputString += '            <'+'?php sidebar(); ?>\n';
		outputString += '        </div>\n';
		outputString += '        <div class="span11">\n';
		outputString += '            <div class="page-header">\n';
		outputString += '                <h1><'+'?php html_link(create_path(\'blog\'), \'Blog\'); ?> &raquo; <'+'?php echo $title; ?></h1>\n';
		outputString += '            </div>\n';
		outputString += '            <h5>Published in <'+'?php html_link(create_path(\'blog\',$archive), pretty_date($archive)); ?>.</h5>\n';
		outputString += $('#content').val()+'\n';
		outputString += '        </div>\n';
		outputString += '    </div>\n';
		
		
		outputString += '<'+'?'+'php } ?>';
		
		$('#generated').text(outputString);
		$('#filename').text('content/blog/'+$('#year').val()+'-'+$('#month').val()+'/'+$('#fn').val());
	}
	
	function updateFN(){
		filename = '';
		temp = $('#title').val();
		temp = temp.replace(/\s/g , "-");
		temp = temp.toLowerCase();
		filename = temp+'.php';
		$('#fn').val(filename);
	}
</script>