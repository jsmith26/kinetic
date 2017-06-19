<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

<main class="blog arch">
<section class="blog-wrapper">
    <div class="img-wrap">
      <div class="">
      <?php global $wp_query;
        $this_post = $post->ID;
        query_posts(array('post_type' => 'post', 'posts_per_page' => 3, 'order' => 'desc'));
        ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php if (has_post_thumbnail( $post->ID ) ) { ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="blog-prev-item" style="background-image: url('<?php echo $image[0]; ?>')">+
            </div>
          <?php } ?>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  <div class="width">
      <div class="half last fright blog-pager">
        <div class="blog-pager">
          <a class="blog-select" data-slide-index="0">one</a>
          <a class="blog-select" data-slide-index="1">two</a>
          <a class="blog-select" data-slide-index="2">three</a>
        </div>

        <div class="post-prev">
      	<?php if (have_posts()) : ?>

    		<?php while (have_posts()) : the_post(); ?>

          <article class="blog-tease">
        				<h2 class="title"><?php the_title(); ?></h2>
        				<p class="date"><?php the_time('F jS, Y') ?></p>
                <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
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
</section>
</main>

<script type="text/javascript">
jQuery(document).ready(function($) {
  var newHeight = $('.blog-arch .width').outerHeight();
  $('.blog-prev-item').each(function() {
    var $this = $(this);
    $(this).css('height', newHeight);
  });
});
</script>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.js"></script>

<script type="text/javascript">
//blog image slider
jQuery(document).ready(function($) {
$('.post-prev').bxSlider({
    pager: true,
    mode: 'vertical',
    pagerCustom: '.blog-pager',
    infiniteLoop: true,
    auto: false,
   hideControlOnEnd: true
  });
});
</script>

<?php get_footer(); ?>
