<!-- 
      home.php
      d13design
      
      Created by Dave Waller on 2011-10-11.
      Copyright 2011 Dave Waller. All rights reserved.
 -->

<!-- Example promo-panel -->
<div class="hero-unit">
	<h1>Welcome to <?php echo SITE_NAME; ?>!</h1>
	<p>Nerd note: A databaseless, PHP content management system driven entirely by files and incorporating the wonderiferous Twitter Bootstrap HTML 5 style framework, Mixinised with Less.</p>
	<!--<p><?php html_link(create_path('#'),'Learn more &raquo;','btn primary large'); ?></p>-->
</div>

<div class="alert-message info">
	<a class="close" href="#" onclick="$('.alert-message').fadeOut();return false;">x</a>
	<p>You can edit the contents of this page in <strong>template/<?php echo TEMPLATE; ?>/home.php</strong></p>
</div>

<h2>Adding images</h2>
<p>You can add images to your codse using the simple html_img helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_img('filename', 'imageClass', 'altTag', 'linkURL', 'linkClass', 'title', 'target'); ?&gt;</pre>

<h2>Adding links</h2>
<p>You can add links to your code using the simple html_link helper:</p>
<pre class="prettyprint linenums">
&lt;?php html_link('linkURL', 'linkText', 'linkClass', 'title', 'target', 'span'); ?&gt;</pre>

<h2>Generating paths</h2>
<p>You can generate internal paths using the create_path helper:</p>
<pre class="prettyprint linenums">
&lt;?php create_path('section', 'page', 'content'); ?&gt;</pre>
<pre class="prettyprint linenums">
&lt;?php html_link(create_path('blog', '2011-08', 'hello-world'), 'Read my blog post!'); ?&gt;
&lt;a href="http://127.0.0.1/d13design/blog/2011-08/hello-world"&gt;Read my blog post!&lt;/a&gt;
</pre>

<h2>Formatting archive dates</h2>
<p>You can convert "2011-09" to "September 2011" using the pretty_date helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo pretty_date('2011-09'); ?&gt;</pre>

<h2>Trimming text</h2>
<p>You can trim long strings of text to a given number of words using the trimmer helper:</p>
<pre class="prettyprint linenums">
&lt;?php echo trimmer('The quick brown fox jumped over the lazy dog', 8, '&amp;#133;'); ?&gt;</pre>
<pre class="prettyprint linenums">
returns 'The quick brown fox jumped over the lazy &#133;'</pre>

<h2>Page listing</h2>
<p>You can create a list of all of the content pages in the content/pages folder using the list_pages helper:</p>
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
<p>You can create a list of all of the content sections in the content folder using the list_sections helper:</p>
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
<p>You can use the html_css and html_js helpers to easily add CSS and JS files to your templates:</p>
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