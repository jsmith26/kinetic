<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: Contact
 */

get_header(); ?>

	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="contact floater lite"><?php the_field('contact_full'); ?></section>
  		<?php endwhile; endif; ?>
	   <div style="clear:both"></div>
    </div>
	</main>


<?php get_footer(); ?>
