<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header();
?>

		<?php if (have_posts()) : ?>


<main class="blog arch">
<section class="blog-wrapper">
    <div class="img-wrap lite">
      <div class="contents">

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1><?php single_cat_title(); ?></h1>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1><?php single_tag_title(); ?></h1>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1><?php the_time('F jS, Y'); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1><?php the_time('F, Y'); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1><?php the_time('Y'); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1>Author Archive</h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Ideas</h1>
 	  <?php } ?>

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


    <?php while (have_posts()) : the_post(); ?>

      <?php if (has_post_thumbnail( $post->ID ) ) { ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
      <?php } ?>

      <article class="teaser scroll">
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
