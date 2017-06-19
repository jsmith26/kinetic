<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

<main class="case single">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

    <?php if ( has_post_thumbnail() ) { ?>
      <div class="case-banner vcent shaded">
				<div class="banner-intro vbod">
					<h1><?php the_title(); ?></h1>
          <div class="terms">
          <?php $terms = get_the_terms( $post->ID , 'ptype' );
            foreach ( $terms as $term ) {
            echo '<span>' . $term->name . '</span>'; } ?>
          </div>
				</div>
				<?php the_post_thumbnail("full"); ?></div>
    <?php } ?>

		<?php the_content(); ?>


		</article>

		<?php endwhile; ?>

		<div style="clear:both;"></div>
	</div><!--width--->

	<section class="blog-move proj-move grey">
		<h2>Related Work</h2>

			<?php the_post(); ?>
			<div class="mover move-left overlay"><?php
        $prevPost = get_previous_post();
				$prevTitle = get_the_title($prevPost->ID);
        $prevthumbnail = get_the_post_thumbnail($prevPost->ID);
        previous_post_link('%link',''.$prevthumbnail. '<h3>Last Post</h3>'); ?>
			</div>

 			<div class="mover move-right overlay"><?php
        $nextPost = get_next_post();
				$nextTitle = get_the_title($nextPost->ID);
        $nextthumbnail = get_the_post_thumbnail($nextPost->ID);
        next_post_link('%link',''.$nextthumbnail. '<h3>Next Post</h3>'); ?>
			</div>
			<div style="clear:both;"></div>
		</section>

	<?php else : ?>

		<h1 class="center">Not Found</h1>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</section>
</main>

<?php get_footer(); ?>
