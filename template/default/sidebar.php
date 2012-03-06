<?php 
// 
//  sidebar.php
//  d13design
//  
//  Created by Dave Waller on 2011-10-18.
//  Copyright 2011 Dave Waller. All rights reserved.
// 
?>

<div class="page-header">
	<h1>Side bar</h1>
</div>

<div class="alert alert-info">
	<a class="close" href="#" onclick="$('.alert').fadeOut();return false;">x</a>
	You can edit the contents of this side bar in <strong>template/<?php echo TEMPLATE; ?>/sidebar.php</strong>
</div>

<div class="page-header">
	<h3>Sponsors</h3>
</div>
<ul class="thumbnails">
  <li class="span4"><a href="#" class="thumbnail"><img src="http://placehold.it/290x80" alt=""></a></li>
  <li class="span2"><a href="#" class="thumbnail"><img src="http://placehold.it/160x120" alt=""></a></li>
  <li class="span2"><a href="#" class="thumbnail"><img src="http://placehold.it/160x120" alt=""></a></li>
</ul>

<div class="page-header">
	<h3>Twitter</h3>
</div>
<blockquote>
  <p><?php //echo get_status('d13design'); ?></p>
  <small>Follow <a href="http://twitter.com/d13design" title="Follow @d13design on Twitter">@d13design</a></small>
</blockquote>

<div class="page-header">
	<h3>Latest articles</h3>
</div>
<ul class="unstyled">
<?php list_articles(); ?>
</ul>

<div class="page-header">
	<h3>Dribbble</h3>
</div>
<?php /*$dribbble = new Dribbble();
$my_shots = $dribbble->get_player_shots('d13design', 1, 1);
foreach($my_shots->shots as $shot){
  echo '<a href="'.$shot->url.'" target="_blank">';
  echo '<img src="'.$shot->image_url.'" alt="'.$shot->title.'" style="max-width:300px;">';
  echo '</a>';
}*/
?>

<div class="page-header">
	<h3>Contact</h3>
</div>
<p><address>
	<strong>d13design.</strong><br>
	123 Some Street, Suite 456<br>
	Nowheresville, CA 78901<br>
	<abbr title="Phone">P:</abbr> (123) 456-7890
</address></p>