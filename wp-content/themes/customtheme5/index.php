<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

<main class="blog arch">
<section class="blog-wrapper">
    <div class="img-wrap lite">
      <div class="contents">
        <h1>Ideas</h1>
        <div class="filters"><label>Filter by:</label>
          <?php wp_nav_menu( array('menu' => 'blog-terms' )); ?>
        </div>
      </div>
      <?php echo do_shortcode ('[signup]'); ?>
      <div class="img-hold"></div>
    </div>
  <div class="width">
      <div class="half last fright">

        <div class="blog-scroll">
      	<?php if (have_posts()) : ?>

    		<?php while (have_posts()) : the_post(); ?>

          <?php if (has_post_thumbnail( $post->ID ) ) { ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-prev' ); ?>
          <?php } ?>

          <article class="teaser scroll" data-newpic="<?php echo $image[0]; ?>">
        				<p class="meta"><span class="terms"><?php the_category(', ') ?></span> - <span class="date"><?php the_time('F jS, Y') ?></span></p>
        				<h2><?php the_title(); ?></h2>
                <a class="arch-more" href="<?php the_permalink(); ?>">Read Article <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                <p class="thepic"><?php echo $image[0]; ?></p>
          </article>

    		<?php endwhile; ?>

    	<?php else : ?>

    		<h1 class="center">Not Found</h1>
    		<p class="center">Sorry, but you are looking for something that isn't here.</p>

    	<?php endif; ?>
      </div>
    </div>
    <div style="clear:both;"></div>
	</div>
  <div style="clear:both;"></div>
</section>
</main>

<?php get_template_part ('function', 'blog'); ?>



<?php get_footer(); ?>
