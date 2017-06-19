<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 Template Name: Work
 */

get_header(); ?>


	<main id="post-<?php the_ID(); ?>">
    <div class="box-inner">
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
  		<?php endwhile; endif; ?>

    <section class="project-terms">
        <?php $terms = get_terms( 'ptype' );
        echo '<ul id="guide"><li class="active"><a class="all">All</a></li>';
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term );
            if ( is_wp_error( $term_link ) ) {
                continue;
            }
            echo '<li><a class="' . $term->slug . '">' . $term->name . '</a></li>';
        }
        echo '</ul>'; ?>
    </section>

	<?php global $wp_query;
		query_posts(array('post_type' => 'cpt_work', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'asc'));
		?>

    	<section class="project-tiles ptile" id="canvas">
				<ul class="project-list">

		<?php while (have_posts()) : the_post(); ?>

        <?php if ( has_post_thumbnail() ) { ?>
					<?php $pid = $post->ID; ?>
					<li data-id="<?php echo $pid; ?>" <?php $terms = get_the_terms( $post->ID , 'ptype' );
						foreach ( $terms as $key => $term ) {
						echo 'data-type-' . $key . '="' . $term->slug . '"'; } ?>>
					<a class="thumb-link" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail("tile"); ?>
						<div class="teaser">
						<h3><?php the_title(); ?></h3>
            <div class="terms">
            <?php $terms = get_the_terms( $post->ID , 'ptype' );
              foreach ( $terms as $term ) {
              echo '<span>' . $term->name . '</span>'; } ?>
            </div>
						<p class="thumb-link">- See Project</p>
					</div>
					</a>
					</li>
        <?php } ?>

		<?php endwhile; ?>
				</ul>
        <div style="clear:both;"></div>
      </section>

	   <div style="clear:both"></div>
    </div>
	</main>


<!--re-order project archives--->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.quicksand.js"></script>

<script>
jQuery(document).ready(function($) {

  // get the action filter option item on page load
  var $filterType = $('#guide li.active a').attr('class');

  // get and assign the ourHolder element to the
    // $holder varible for use later
  var $holder = $('ul.project-list');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
    // item is clicked
    $('#guide li a').click(function(e) {
        // reset the active class on all the buttons
        $('#guide li').removeClass('active');

        // assign the class of the clicked filter option
        // element to our $filterType variable
        var $filterType = $(this).attr('class');
        $(this).parent().addClass('active');

        if ($filterType == 'all') {
            // assign all li items to the $filteredData var when
            // the 'All' filter option is clicked
            var $filteredData = $data.find('li');
        }
        else {
            // find all li elements that have our required $filterType
            // values for the data-type element
            var $filteredData = $data.find('li[data-type-0=' + $filterType + '], li[data-type-1=' + $filterType + '], li[data-type-2=' + $filterType + '], li[data-type-3=' + $filterType + ']');
        }

        // call quicksand and assign transition parameters
        $holder.quicksand($filteredData, {
            duration: 600,
        });
        return false;
    });
});
</script>

<script>
jQuery(document).ready(function($) {
	//window.onresize = function(){ location.reload(); }
	$(window).resize(function(){location.reload();});
});
</script>


<?php get_footer(); ?>
