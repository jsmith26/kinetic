<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

  <?php if (has_post_thumbnail( $post->ID ) ) { ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="banner" style="background-image: url('<?php echo $image[0]; ?>')">
			</div>
    <?php } ?>

	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
  		<?php endwhile; endif; ?>
	   <div style="clear:both"></div>
    </div>
	</main>

	<div class="lb-frame"></div>

<?php get_footer(); ?>
