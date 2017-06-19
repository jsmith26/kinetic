<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: Tester
 */

get_header(); ?>


	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
  		<?php endwhile; endif; ?>

			<?php // args
			$args = array(
				'posts_per_page'	=> 1,
				'post_type'		=> 'post',
				'orderby' => 'date',
				'order' => 'desc',
			);
			// query
			$the_query = new WP_Query( $args ); ?>

			<?php if( $the_query->have_posts() ): while( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php if (has_post_thumbnail( $post->ID ) ) { ?>
				      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<section class="scroll home5 grey home-blog-wrap" style="background-image: url('<?php echo $image[0]; ?>')">
				    <?php } else { ?>
							<section class="scroll home5 grey home-blog-wrap no-img">
							<?php } ?>
								<div class="width">
									<?php if( get_field('blog_homehead') ): ?>
										<h2><em><?php the_field('blog_homehead'); ?></em><?php the_title(); ?></h2>
									<?php else : ?>
										<h2><?php the_title(); ?></h2>
									<?php endif; ?>
									<p><a class="btn-outline white" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Explore</a></p>
								</div>
							</section>

					<?php endwhile; endif; ?>

			<?php wp_reset_query(); ?>

        <div style="clear:both;"></div>
      </section>




    <?php the_field('team_awards', 15); ?>


	   <div style="clear:both"></div>
    </div>
	</main>

	<div class="lb-frame team-frame"></div>

<?php get_footer(); ?>
