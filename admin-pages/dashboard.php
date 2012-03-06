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
	<h3>Terminology</h3>
</div>

<p><strong>Articles</strong> are your posts - these could be news articles, blog posts or anything else you'd like to include in your site.</p>
<p><strong>Pages</strong> are static content pages on your site - an about page or a contact page for example.</p>
<p><strong>Sections</strong> are the folders where your articles are stored - give your site structure using these sections.</p>
<p><strong>Templates</strong> define how your site looks, use the help guide to create your own.</p>
<p><strong>Slugs</strong> are simplified titles for your content that can be used to create search engine friendly URLs, typically these are the same as the title but replace spaces with hyphens.</p>