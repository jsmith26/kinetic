<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */
?>

<?php if ( (is_page ('contact')) || (is_front_page()) ) {
  get_template_part ('part', 'apply');
} ?>

<footer>
<section class="strip">
  <div class="half first">
    <p class="foot-news"><?php echo do_shortcode('[signup]') ?></p>
  </div>
  <div class="half last">
    <p>&copy; 2017 Kinetic Agency. All rights reserved.</p>
  </div>
  <div style="clear:both"></div>
  </div>
</section>
</footer>
<div id="dimmer"></div>
<div id="dimmer2"></div>
<div class="loader"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>

</body>
</html>

<?php include("js/js-all.php"); ?>

<?php wp_footer(); ?>
