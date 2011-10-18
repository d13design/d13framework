<?php 
// 
//  home.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<!-- Example promo-panel -->
<div class="hero-unit" style="margin-top:50px;">
	<h1>Welcome to <?php echo SITE_NAME; ?>!</h1>
	<p>Nerd note: A databaseless, PHP content management system driven entirely by files and incorporating the wonderiferous Twitter Bootstrap HTML 5 style framework, Mixinised with Less.</p>
	<!--<p><?php html_link(create_path('#'),'Learn more &raquo;','btn primary large'); ?></p>-->
</div>

<div class="alert-message info">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/home.php</strong></p>
</div>

<h2>Modifying your .htaccess file</h2>
<p>Your <span class="label notice">.htaccess</span> file should be ready to rock but, if this is a new install of this framework, you may need to change your base path. Just swap "framework" on line 2 for whatever your real base path is:</p>
<pre class="prettyprint linenums">
RewriteEngine On
RewriteBase /framework/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
</pre>

<h2>Modifying your site config</h2>
<p>Your site config is held in the <span class="label notice">/lib/config.inc.php</span> file - make any changes you need in these lines:</p>
<pre class="prettyprint linenums">
define("BASE_PATH","http://127.0.0.1"); //The root domain for your site
$path = "/framework"; //The folder where your site is held (site root)

//Define site URLs
define("SITE_URL",BASE_PATH.$path);
define("ASSETS_URL",BASE_PATH.$path.'/assets'); //The folder, from the site root where assets are held

define("SITE_NAME",'framework');  //Your site name
define("SITE_AUTHOR",'Dave Waller'); //Your name, as the site owner
define("SITE_EMAIL",'site@d13design.co.uk'); //A contact email address

define("TEMPLATE",'default'); //The site template to use - the folder name of the template within the "template" folder

define("PAGE_COUNT", 3); //The number of items to show per page when using pagination
</pre>

<div class="page-header" style="margin-top:20px;">
	<h1>Using the site-builder helpers</h1>
</div>

<h2>Adding images</h2>
<p>You can add images to your codse using the simple <span class="label">html_img</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_img('filename', 'imageClass', 'altTag', 'linkURL', 'linkClass', 'title', 'target'); ?&gt;</pre>

<h2>Adding links</h2>
<p>You can add links to your code using the simple <span class="label">html_link</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_link('linkURL', 'linkText', 'linkClass', 'title', 'target', 'span'); ?&gt;</pre>

<h2>Generating paths</h2>
<p>You can generate internal paths using the <span class="label">create_path</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php create_path('section', 'page', 'content'); ?&gt;</pre>
<pre class="prettyprint linenums">
&lt;?php html_link(create_path('blog', '2011-08', 'hello-world'), 'Read my blog post!'); ?&gt;
&lt;a href="http://127.0.0.1/d13design/blog/2011-08/hello-world"&gt;Read my blog post!&lt;/a&gt;
</pre>

<h2>Formatting archive dates</h2>
<p>You can convert "2011-09" to "September 2011" using the <span class="label">pretty_date</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo pretty_date('2011-09'); ?&gt;</pre>

<h2>Trimming text</h2>
<p>You can trim long strings of text to a given number of words using the <span class="label">trimmer</span> helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo trimmer('The quick brown fox jumped over the lazy dog', 8, '&amp;#133;'); ?&gt;</pre>
<pre class="prettyprint linenums">
returns 'The quick brown fox jumped over the lazy &#133;'</pre>

<h2>Page listing</h2>
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

<h2>Section listing</h2>
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

<h2>Stylesheets and Javascripts</h2>
<p>You can use the <span class="label">html_css</span> and <span class="label">html_js</span> helpers to easily add CSS and JS files to your templates:</p>
<pre class="prettyprint linenums">
&lt;?php html_css('styles.css'); ?&gt;
&lt;?php html_js('jquery.js'); ?&gt;</pre>
<pre class="prettyprint linenums">
&lt;link rel="stylesheet" type="text/css" href="http://127.0.0.1/d13design/assets/css/styles.css" /&gt;
&lt;script type="text/javascript" src="http://127.0.0.1/d13design/assets/js/jquery.js"&gt;&lt;/script&gt;</pre>

<h2>Code listings</h2>
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

<h2>Pagination</h2>
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

<h2>Example</h2>
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

<h2>Styles and the Twitter Bootstrap framework</h2>
<p>This application template makes use of the LESS implemetation of Twitter's Bootstrap.</p>
<p><?php echo html_link('http://twitter.github.com/bootstrap/', 'http://twitter.github.com/bootstrap/','btn primary','','_blank'); ?></p>