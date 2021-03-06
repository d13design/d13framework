<div class="page-header">
	<h1><?php html_link(create_path('admin'), 'Admin'); ?> &gt; Template help documents</h1>
</div>

<ul class="nav nav-tabs">
	<li><?php html_link(create_path('admin'), '<i class="icon-list-alt"></i> Dashboard'); ?></li>
	<li><?php html_link(create_path('admin','view-articles'), '<i class="icon-file"></i> Articles'); ?></li>
	<li><?php html_link(create_path('admin','view-pages'), '<i class="icon-book"></i> Pages'); ?></li>
	<li><?php html_link(create_path('admin','view-sections'), '<i class="icon-folder-open"></i> Sections'); ?></li>
	<li><?php html_link(create_path('admin','view-assets'), '<i class="icon-picture"></i> Assets'); ?></li>
	<li class="active"><?php html_link(create_path('admin','template-help'), '<i class="icon-info-sign"></i> Template help'); ?></li>
</ul>

<div class="row">
<div class="span8">

<h2 id="htaccess">Modifying your .htaccess file</h2>
<p>Your <span class="label notice">.htaccess</span> file should be ready to rock but, if this is a new install of this framework, you may need to change your base path. Just swap "framework" on line 2 for whatever your real base path is:</p>
<pre class="prettyprint linenums">
RewriteEngine On
RewriteBase /framework/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
</pre>

<h2 id="config">Modifying your site config</h2>
<p>Your site config is held in the <span class="label notice">/lib/config.inc.php</span> file - make any changes you need in these lines:</p>
<pre class="prettyprint linenums">
define("BASE_PATH","http://127.0.0.1"); //The root domain for your site
$path = "/framework"; //The folder where your site is held (site root)

//Define site URLs
define("SITE_URL",BASE_PATH.$path);
define("ASSETS_URL",BASE_PATH.$path.'/assets'); //The folder, from the site root where assets are held

define("SITE_NAME",'framework'); //Your site name
define("SITE_AUTHOR",'Dave Waller'); //Your name, as the site owner
define("SITE_EMAIL",'site@d13design.co.uk'); //A contact email address

define("DB_HOST",'127.0.0.1'); //Your database host
define("DB_NAME",'d13design'); //The name of your database
define("DB_USER",'root'); //Your database user name
define("DB_PWRD",'root'); //Your database password
define("TBL_PRE",''); //Your database table prefix for this site

define("SALT",'vXjaNwrIpwOuqMEq'); //Your security salt - replace this with a 16 digit random alpha string
define("ALLOW_REGISTER",true); //Can users register - leaving this set to true can be dangerous

define("TEMPLATE",'default'); //The site template to use - the folder name of the template within the "template" folder

define("PAGE_COUNT", 3); //The number of items to show per page when using pagination
</pre>

<div class="page-header" style="margin-top:70px;">
	<h1>Using the site-builder helpers</h1>
</div>

<h2 id="images">Adding images</h2>
<p>You can add images to your codse using the simple <span class="label">html_img</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_img('filename', 'imageClass', 'altTag', 'linkURL', 'linkClass', 'title', 'target'); ?&gt;</pre>
<p>This assumes that images are stored in your assets folder, as defined by your <span class="label">ASSETS_URL</span> config setting.</p>

<h2 id="links">Adding links</h2>
<p>You can add links to your code using the simple <span class="label">html_link</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_link('linkURL', 'linkText', 'linkClass', 'title', 'target', 'span'); ?&gt;</pre>

<h2 id="paths">Generating paths</h2>
<p>You can generate internal paths using the <span class="label">create_path</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php create_path('section', 'page', 'content'); ?&gt;</pre>
<pre class="prettyprint linenums">
&lt;?php html_link(create_path('blog', '2011-08', 'hello-world'), 'Read my blog post!'); ?&gt;
&lt;a href="http://127.0.0.1/d13design/blog/2011-08/hello-world"&gt;Read my blog post!&lt;/a&gt;
</pre>

<h2 id="dates">Formatting archive dates</h2>
<p>You can convert a PHP strtotime string to a prettier date using the <span class="label">pretty_date</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo pretty_date($created_date); ?&gt;</pre>
<pre class="prettyprint linenums">
returns 'March 2012'</pre>
<p>The <span class="label">pretty_date</span> helper comes with 4 flavours, defaulting to 'short':</p>
<pre class="prettyprint linenums">
&lt;?php echo pretty_date($created_date,'short'); ?&gt;
&lt;?php echo pretty_date($created_date,'medium'); ?&gt;
&lt;?php echo pretty_date($created_date,'long'); ?&gt;
&lt;?php echo pretty_date($created_date,'x-long'); ?&gt;</pre>
<pre class="prettyprint linenums">
returns 'March 2012'
returns '03 March 2012'
returns 'Monday, 03 March 2012'
returns 'Monday, 03 March 2012 - 20:53 pm'</pre>

<h2 id="trimming">Trimming text</h2>
<p>You can trim long strings of text to a given number of words using the <span class="label">trimmer</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo trimmer('The quick brown fox jumped over the lazy dog', 8, '&amp;#133;'); ?&gt;</pre>
<pre class="prettyprint linenums">
returns 'The quick brown fox jumped over the lazy &#133;'</pre>

<h2 id="css-js">Stylesheets and Javascripts</h2>
<p>You can use the <span class="label">html_css</span> and <span class="label">html_js</span> helpers to easily add CSS and JS files to your templates:</p>
<pre class="prettyprint linenums">
&lt;?php html_css('styles.css'); ?&gt;
&lt;?php html_js('jquery.js'); ?&gt;</pre>
<pre class="prettyprint linenums">
&lt;link rel="stylesheet" type="text/css" href="http://127.0.0.1/d13design/assets/css/styles.css" /&gt;
&lt;script type="text/javascript" src="http://127.0.0.1/d13design/assets/js/jquery.js"&gt;&lt;/script&gt;</pre>
<p>This assumes that javascripts are stored in a <span class="label">js</span> folder in your assets folder, as defined by your <span class="label">ASSETS_URL</span> config setting.</p>
<p>This assumes that CSS is stored in a <span class="label">css</span> folder in your template.</p>

<h2 id="code">Code listings</h2>
<p>You can use the included prettify library to handle code listings:</p>
<pre class="prettyprint linenums">
&lt;pre class="prettyprint linenums"&gt;
&amp;lt;?php
$str = "Hello World";
echo $str;
// Outputs Hello World
?&amp;gt;
&lt;/pre&gt;</pre>
<pre class="prettyprint linenums">
&lt;?php
$str = "Hello World";
echo $str;
// Outputs Hello World
?&gt;
</pre>

<h2 id="pagination">Pagination</h2>
<p>You can paginate through all of the content within a given section using the <span class="label">pagination</span> helper (this uses the standard Twitter Bootstrap markup and styling for pagination). You can also adjust the number of items to show on a page using the <span class="label">PAGE_COUNT</span> variable in your config file:</p>
<pre class="prettyprint linenums">
&lt;?php pagination($pagelist,$a['section'],$a['qs'],'first','previous','next','last'); ?&gt; //pagelist is an array of content
</pre>
<div class="pagination">
  <ul>
    <li class="prev disabled"><a href="#">&larr;</a></li>
    <li class="disabled"><a href="#">&lt;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class=""><a href="#">&gt;</a></li>
    <li class="next"><a href="#">&rarr;</a></li>
  </ul>
</div>

<h2 id="example">Example</h2>
<p>An example of an image linking to a page followed by a text link to an external site:</p>
<pre class="prettyprint linenums">
&lt;?php
  echo html_img('images/sample.jpg', 'photo', 'A photo of a spider', create_path('blog','2011-08','spiders-everywhere'), 'img_link', 'Read more spiders', '_self');
  echo '&lt;br/&gt;';
  html_link('http://flic.kr/p/5q4BzT', 'View this photo on Flickr.com', 'ext_link', 'View this photo on Flickr.com', '_blank', true);
?&gt;</pre>
<pre class="prettyprint linenums">
&lt;a href="http://d13design.co.uk/blog/2011-08/spiders-everywhere" title="Read more about spiders" class="img_link" target="_self"&gt;
  &lt;img src="http://d13design.co.uk/assets/images/sample.jpg" alt="A photo of a spider" class="photo" /&gt;
&lt;/a&gt;
&lt;br/&gt;
&lt;a href="http://flic.kr/p/5q4BzT" title="View this photo on Flickr.com" class="ext_link" target="_blank"&gt;
  &lt;span>View this photo on Flickr.com&lt;/span&gt;
&lt;/a&gt;
</pre>

<div class="page-header" style="margin-top:70px;">
	<h1>Using the site-builder database helpers</h1>
</div>

<h2 id="page-list">Page listing</h2>
<p>You can create a list of all of the content pages in the content/pages folder using the <span class="label">list_pages</span> helper:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php list_pages(); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;li&gt;&lt;a href="/pages/about"&gt;About&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/pages/contact"&gt;Contact&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>

<h2 id="section-list">Section listing</h2>
<p>You can create a list of all of the content sections in the content folder using the <span class="label">list_sections</span> helper:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php list_sections(); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;li&gt;&lt;a href="/work"&gt;Work&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/hobbies"&gt;Hobbies&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/family"&gt;Family&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>

<h2 id="section-title">Section title</h2>
<p>You can get the full name of a section from its slug using the <span class="label">get_section</span> helper:</p>
<pre class="prettyprint linenums">
&lt;h2&gt;
  &lt;?php echo get_section('section-slug'); ?&gt;
&lt;/h2&gt;</pre>
<pre class="prettyprint linenums">
&lt;h2&gt;
Section Slug
&lt;/h2&gt;</pre>

<h2 id="recent-articles">Recent articles list</h2>
<p>You can create a list of all recent articles using the <span class="label">list_articles</span> helper:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php list_articles(); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;li&gt;&lt;a href="/blog/latest-post"&gt;Latest post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/blog/an-older-post"&gt;An older post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/portfolio/even-older-post"&gt;Even older post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/blog/almost-ancient-post"&gt;Almost ancient post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/discoveries/the-oldest-post"&gt;The oldest post&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>
<p>This helper defaults to showing recent posts from <b>all</b> sections and lists up to 5 results, you can override these settings if you like:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php list_articles('blog',2); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;li&gt;&lt;a href="/blog/latest-post"&gt;Latest post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="/blog/an-older-post"&gt;An older post&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>
<p>You can also pass in a class name to define an icon (extends the Twitter Bootstrap icon set), defaulting to 'file':</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php list_articles('blog',2, 'book'); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;li&gt;&lt;i class="icon-book"&gt;&lt;/i&gt;&lt;a href="/blog/latest-post"&gt;Latest post&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;i class="icon-book"&gt;&lt;/i&gt;&lt;a href="/blog/an-older-post"&gt;An older post&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</pre>

<h2 id="page">Displaying a page</h2>
<p>You can create an array that contains all of the information of a page using the <span class="label">get_page</span> helper, all you have to do is pass it a valid slug:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php $page_data = get_page('my-sample-page'); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
$page_data = array(
  'id' => 13,
  'title' => 'My Sample Page',
  'contents' => '&lt;p&gt;This is a sample page and contains lots of text and stuff!&lt;/p&gt;'
);</pre>

<h2 id="article">Displaying an article</h2>
<p>You can create an array that contains all of the information of an article using the <span class="label">get_article</span> helper, all you have to do is pass it a valid slug:</p>
<pre class="prettyprint linenums">
&lt;ul&gt;
  &lt;?php $article_data = get_article('latest-post'); ?&gt;
&lt;/ul&gt;</pre>
<pre class="prettyprint linenums">
$article_data = array(
  'id' => 4,
  'section_id' => 1,
  'section_title' => 'Blog',
  'section_slug' => 'blog',
  'title' => 'Latest Post',
  'slug' => 'latest-post',
  'synopsis' => 'Writing is a gift that I have, this will become clear the more you read',
  'contents' => '&lt;p&gt;This is a sample page and contains lots of text and stuff!&lt;/p&gt;'
  'created' => '4523846452',
);</pre>

<h2 id="customdata">Working with custom data</h2>
<p>Using custom data field is a great way to tag more properties against your articles. You can define whatever you want in this space and then use it in your templates. The <span class="label">parse_properties</span> helper is an easy way to turn your custom data into a useful array.</p>
<p>The helper works on a principle of key-value pairs, for instance <code>thumb=images/thumbnail.jpg|externalLink=http://google.com</code> could be set as the custom data for an article. Passing this into the helper would pass back an array:</p>
<pre class="prettyprint linenums">
&lt;?php $custom_props = parse_properties($article['custom_data']); ?&gt;
</pre>
<pre class="prettyprint linenums">
$custom_props = array(
  'thumb' => 'images/thumbnail.jpg',
  'externalLink' => 'http://google.com'
);</pre>
<p>You can override the separators used to parse properties by adding an additional 2 parameters, these default to <code>|</code> as the property separator and <code>=</code> as the key-value separator.</p>
<pre class="prettyprint linenums">
&lt;?php $article['custom_data'] = 'thumb#images/thumbnail.jpg~externalLink#http://google.com'; ?&gt;
</pre>
<pre class="prettyprint linenums">
&lt;?php $custom_props = parse_properties($article['custom_data'],'~','#'); ?&gt;
</pre>
<pre class="prettyprint linenums">
$custom_props = array(
  'thumb' => 'images/thumbnail.jpg',
  'externalLink' => 'http://google.com'
);</pre>

<div class="page-header" style="margin-top:70px;">
	<h1>Other plugins and helpers</h1>
</div>

<h2 id="dribbble">Dribbble</h2>
<p>You can inlcude your latest dribbble shots using the included <span class="label">dribbble</span> helper, just add the following code to your template files:</p>
<pre class="prettyprint linenums">
&lt;?php $dribbble = new Dribbble();
$my_shots = $dribbble->get_player_shots('d13design', 1, 1);
foreach($my_shots->shots as $shot){
  echo '&lt;a href="'.$shot->url.'" target="_blank"&gt;';
  echo '&lt;img src="'.$shot->image_url.'" alt="'.$shot->title.'"&gt;';
  echo '&lt;/a&gt;';
} ?&gt;</pre>

<h2 id="twitter">Twitter</h2>
<p>You can inlcude your latest tweet using the included <span class="label">get_status</span> helper, just add the following code to your template files:</p>
<pre class="prettyprint linenums">
&lt;?php echo get_status('d13design'); ?&gt;</pre>


<div class="page-header">
	<h1>Using the default style framework</h1>
</div>

<h2 id="bootstrap">Styles and the Twitter Bootstrap framework</h2>
<p>This application template makes use of the LESS implemetation of Twitter's Bootstrap.</p>
<p><?php echo html_link('http://twitter.github.com/bootstrap/', 'http://twitter.github.com/bootstrap/','btn primary','','_blank'); ?></p>

</div>

<div class="span4" id="contentsPanel">
	<div class="well">
		<h3>Contents</h3>
		<hr>
		<ul>
			<li><strong>Site config &rarr;</strong>
				<ul>
					<li><a href="#htaccess">.htaccess file</a></li>
					<li><a href="#config">Config file</a></li>
				</ul>
			</li>
			<li><strong>Site-builder helpers &rarr;</strong>
				<ul>
					<li><a href="#images">Adding images</a></li>
					<li><a href="#links">Adding links</a></li>
					<li><a href="#paths">Generating paths</a></li>
					<li><a href="#dates">Formatting dates</a></li>
					<li><a href="#trimming">Trimming text</a></li>
					<li><a href="#css-js">Adding CSS and Javascript</a></li>
					<li><a href="#code">Code listings</a></li>
					<li><a href="#pagination">Pagination</a></li>
					<li><a href="#example">An example</a></li>
				</ul>
			</li>
			<li><strong>Database helpers &rarr;</strong>
				<ul>
					<li><a href="#page-list">Page listing</a></li>
					<li><a href="#section-list">Section listing</a></li>
					<li><a href="#section-title">Section title</a></li>
					<li><a href="#recent-articles">Recent articles list</a></li>
					<li><a href="#page">Displaying a page</a></li>
					<li><a href="#article">Displaying an article</a></li>
					<li><a href="#customdata">Working with custom data</a></li>
				</ul>
			</li>
			<li><strong>Other plugins &amp; helpers &rarr;</strong>
				<ul>
					<li><a href="#dribbble">Dribbble</a></li>
					<li><a href="#twitter">Twitter</a></li>
				</ul>
			</li>
			<li><strong>Default style framework &rarr;</strong>
				<ul>
					<li><a href="#bootstrap">Twitter Bootstrap</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>

</div>