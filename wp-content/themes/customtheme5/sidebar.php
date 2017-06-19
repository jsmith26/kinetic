<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */
?>
	<div class="sidebar blog-tease">
		<h2>Recent Posts</h2>

		<?php global $wp_query;
		$this_post = $post->ID;
		query_posts(array('post_type' => 'post', 'post__not_in' => array($this_post), 'posts_per_page' => 3, 'order' => 'desc'));
		?>
		<?php while (have_posts()) : the_post(); ?>
		        <div class="teaser">
			        <?php if ( has_post_thumbnail() ) { ?>
								<a class="thumb-link" href="<?php the_permalink() ?>"><?php the_post_thumbnail("blog-sidebar"); ?></a>
			        <?php } ?>
							<h3><?php the_title(); ?></h3>
							<p class="exc"><?php the_excerpt('test'); ?> <a href="<?php the_permalink() ?>" class="more">Read more</a></p>
		        </div>
		<?php endwhile; ?>

		<div style="clear:both"></div>
		</ul>
		<?php wp_reset_query(); ?>
	</div>
