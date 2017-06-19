<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

get_header(); ?>

<main class="team single">
	<section class="about2 grey br-fix">
		<div class="width">
			<div class="half first">
			<h2>Our<br /> <em>Team</em></h2>
			</div>
			<div class="half last">
				<p><strong>Kinetic Operates ...</strong></p>
				<p>So efficiently because of our experienced team of<br />
				strategists, creatives, and operations staff. When<br />
				we’re not in the office, we’re out playing with our<br />
				families and dogs in Montana’s great outdoors.</p>
			</div>
			<div style="clear:both;"></div>
		</div>
	</section>

	<?php global $wp_query;
		$this_post = $post->ID;
		query_posts(array('post_type' => 'cpt_team', 'posts_per_page' => -1, 'order' => 'desc'));
		?>
		<section class="team-tiles grey">
			<?php while (have_posts()) : the_post();
					get_template_part ('part', 'profile');
			endwhile; ?>
		<div style="clear:both;"></div>
		</section>

		<?php wp_reset_query(); ?>

<div class="lb-frame team-frame">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="ajax-fill team-pop" id="post-<?php the_ID(); ?>">
        <?php if ( has_post_thumbnail() ) { ?>
          <div class="img-hold"><?php the_post_thumbnail("large"); ?></div>
        <?php } ?>
				<div class="body">
					<h1><?php the_title(); ?></h1>
					<?php if( get_field('team_pos') ): ?>
						<p class="single-pos"><?php the_field('team_pos'); ?></p>
					<?php endif; ?>
					<?php the_content(); ?>
				</div>
		</article>
	<?php endwhile; endif; ?>

	</div>
</main>
<div id="dimmer-w"></div>

<script type="text/javascript">
/*--default pop up--*/
jQuery(document).ready(function($) {
  $('#dimmer-w').fadeIn(200);
  $('.lb-frame').fadeIn(300);
});
</script>

<?php get_template_part ('function', 'team'); ?>

<?php get_footer(); ?>
