  <?php if ( has_post_thumbnail() ) { ?>
		<a class="thumb-link a-fire" href="<?php the_permalink() ?>"><?php the_post_thumbnail("team-tile"); ?>
			<div class="teaser">
			<h3><?php the_title(); ?></h3>
			<?php if( get_field('team_pos') ): ?>
				<em><?php the_field('team_pos'); ?></em>
			<?php endif; ?>
		</div>
		</a>
  <?php } ?>
