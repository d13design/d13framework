<div class="page-header">
	<h1>Administration dashboard</h1>
</div>

<ul class="nav nav-tabs">
	<li class="active"><?php html_link(create_path('admin'), '<i class="icon-list-alt"></i> Dashboard'); ?></li>
	<li><?php html_link(create_path('admin','view-articles'), '<i class="icon-file"></i> Articles'); ?></li>
	<li><?php html_link(create_path('admin','view-pages'), '<i class="icon-book"></i> Pages'); ?></li>
	<li><?php html_link(create_path('admin','view-sections'), '<i class="icon-folder-open"></i> Sections'); ?></li>
	<li><?php html_link(create_path('admin','view-assets'), '<i class="icon-picture"></i> Assets'); ?></li>
	<li><?php html_link(create_path('admin','template-help'), '<i class="icon-info-sign"></i> Template help'); ?></li>
</ul>

<p>Welcome back <strong><?php echo $_SESSION['username']; ?></strong>.</p>

<div class="page-header">
	<h3>Creating a new template</h3>
</div>

<p>The easiest way to create a new template for your site is to copy the <strong>templates/default</strong> folder, giving it a new name. You can the edit the files in your new folder to create your new template.</p>
<p>To activate your template, just update your <strong>config</strong> file with your new template folder name.</p>

<p><strong><i class="icon-exclamation-sign"></i> 404.php</strong> is a simple page to use when a user selects a page the doesn't exist.</p>
<p><strong><i class="icon-calendar"></i> archive.php</strong> is the template applied to section listings.</p>
<p><strong><i class="icon-file"></i> article.php</strong> is the template applied to articles when viewed directly.</p>
<p><strong><i class="icon-ban-circle"></i> empty.php</strong>, if a section has no contents this file is loaded as a holding message.</p>
<p><strong><i class="icon-arrow-down"></i> footer.php</strong> is your site footer.</p>
<p><strong><i class="icon-arrow-up"></i> header.php</strong> is your site header.</p>
<p><strong><i class="icon-home"></i> home.php</strong> is the template used for your home page.</p>
<p><strong><i class="icon-book"></i> page.php</strong> is the template applied to pages when viewed directly.</p>
<p><strong><i class="icon-list"></i> sidebar.php</strong> is a template defining your site sidebar, you can choose whether or not to include it in your other template files.</p>

<div class="page-header">
	<h3>Terminology</h3>
</div>

<p><strong><i class="icon-file"></i> Articles</strong> are your posts - these could be news articles, blog posts or anything else you'd like to include in your site.</p>
<p><strong><i class="icon-book"></i> Pages</strong> are static content pages on your site - an about page or a contact page for example.</p>
<p><strong><i class="icon-folder-open"></i> Sections</strong> are the folders where your articles are stored - give your site structure using these sections.</p>
<p><strong><i class="icon-eye-open"></i> Templates</strong> define how your site looks, use the help guide to create your own.</p>
<p><strong><i class="icon-share-alt"></i> Slugs</strong> are simplified titles for your content that can be used to create search engine friendly URLs, typically these are the same as the title but replace spaces with hyphens.</p>