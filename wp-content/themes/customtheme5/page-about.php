<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: About
 */

get_header(); ?>


	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
  		<?php endwhile; endif; ?>

	<?php global $wp_query;
		query_posts(array('post_type' => 'cpt_team', 'posts_per_page' => -1, 'order' => 'desc'));
		?>
    	<section class="team-tiles grey">
				<?php while (have_posts()) : the_post();
						get_template_part ('part', 'profile');
				endwhile; ?>
        <div style="clear:both;"></div>
      </section>

    <?php the_field('team_awards', 15); ?>


	   <div style="clear:both"></div>
    </div>
	</main>

	<div class="lb-frame team-frame"></div>
	<div id="dimmer-w"></div>

	<?php get_template_part ('function', 'team'); ?>

<?php get_footer(); ?>
