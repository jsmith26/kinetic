<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: Video
 */

get_header(); ?>

	<div class="vid-fit">
		<video playsinline autoplay muted loop poster="full-link.jpg" id="bgvid">
		    <source src="full-link-webm.webm" type="video/webm">
		    <source src="full-link-mp4.mp4" type="video/mp4">
		</video>
	</div>

	<main id="post-<?php the_ID(); ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	<div style="clear:both"></div>
	</main>

<script>
	var video = document.getElementById("bgvid"),
	pauseButton = document.querySelector(".pause-vid");

	function vidFade() {
	  video.classList.add("stopfade");
	}

	video.addEventListener('ended', function()
	{
	// only functional if "loop" is removed
	video.pause();
	vidFade();
	}, false);

	video.addEventListener('touchstart', function(e) {
	e.preventDefault();
	video.play();
	})
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $('.vid-fit').each(function() {
      var item = $(this);
      var thevid = item.find('video');
      var howtall = item.outerHeight();
      var howwide = item.outerWidth();
      var howtallimg = 640;
      var howwideimg = 1140;
      var contaspect = ( howtall / howwide );
      var imgaspect = ( howtallimg / howwideimg );
      item.css("top", contaspect);
      thevid.css("top", imgaspect);
      if ( contaspect < imgaspect ) {
        thevid.addClass('wide-vid');
      }
  });
});
</script>

<?php get_footer(); ?>
