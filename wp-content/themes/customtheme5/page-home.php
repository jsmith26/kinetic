<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: Home
 */

get_header(); ?>

	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner scroll-main">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
				<section class="scroll home-contact contact floater">
					<?php the_field('home_contact'); ?>
				</section>

  		<?php endwhile; endif; ?>
	   <div style="clear:both"></div>
    </div>
    <div class="pg-scroller">
      <a class="scroll-dn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> scroll</a>
			<a class="scroll-up">top <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </div>

	</main>

<?php get_footer(); ?>
