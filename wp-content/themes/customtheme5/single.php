<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

<main class="blog single">

	<section class="grey">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php if ( has_post_thumbnail() ) { ?>
      <div class="blog-banner"><?php the_post_thumbnail("large"); ?></div>
    <?php } ?>

		<div class="width">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<p class="meta"><span class="author">
					<?php $fname = get_the_author_meta('first_name'); $lname = get_the_author_meta('last_name'); $full_name = '';
					if( empty($fname)){
					    $full_name = $lname;
					} elseif( empty( $lname )){
					    $full_name = $fname;
					} else {
					    //both first name and last name are present
					    $full_name = "{$fname} {$lname}";
					}
					echo $full_name;
					?></span> | <span class="date"><?php the_time('F jS, Y') ?></span></p>
				<h1><?php the_title(); ?></h1>
				<div class="body"><?php the_content(); ?></div>
				<div class="share">
					<a class="icon-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank" title="Share via Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a class="icon-ln" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>" target="_blank" title="Share via LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a class="icon-mail" <a href="mailto:?subject=Check out this article - <?php the_title(); ?>&amp;body=<?php the_permalink() ?>" title="Share via Email" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a>
				</div>
		</article>

		<?php endwhile; ?>

		<div style="clear:both;"></div>
	</div><!--width--->

		<div class="term-list">
				<?php $categories = get_categories( array(
			    'orderby' => 'name',
			    'parent'  => 0
					) );
					foreach ( $categories as $category ) {
					    printf( '<a class="term-sin" href="%1$s">%2$s</a>',
					        esc_url( get_category_link( $category->term_id ) ),
					        esc_html( $category->name )
					    );
				} ?>
				<div style="clear:both;"></div>
		</div>

	<section class="blog-move">

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
