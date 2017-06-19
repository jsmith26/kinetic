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

		<section>
			<div class="width">

		<div id="container">
		  <ul id="filterOptions">
		    <li class="active"><a href="#" class="all">All</a></li>
		    <li><a href="#" class="prem">Premier League</a></li>
		    <li><a href="#" class="champ">Championship</a></li>
		    <li><a href="#" class="league1">League 1</a></li>
		    <li><a href="#" class="league2">League 2</a></li>
		  </ul>

		  <ul class="ourHolder">
		    <li class="item" data-id="id-1" data-type="league2">
		      <h3>Accrington Stanley</h3>
		    </li>
		    <li class="item" data-id="id-2" data-type="prem">
		      <h3>Arsenal</h3>
		    </li>
		    <li class="item" data-id="id-3" data-type="league2">
		      <h3>Burton Albion</h3>
		    </li>
		    <li class="item" data-id="id-4" data-type="champ">
		      <h3>Cardiff City</h3>
		    </li>
		    <li class="item" data-id="id-5" data-type="champ">
		      <h3>Derby County</h3>
		    </li>
		    <li class="item" data-id="id-6" data-type="prem">
		      <h3>Everton</h3>
		    </li>
		    <li class="item" data-id="id-7" data-type="league2">
		      <h3>Morecambe</h3>
		    </li>
		    <li class="item" data-id="id-8" data-type="champ">
		      <h3>Norwich City</h3>
		    </li>
		    <li class="item" data-id="id-9" data-type="league1">
		      <h3>Notts County</h3>
		    </li>
		    <li class="item" data-id="id-10" data-type="champ">
		      <h3>Reading</h3>
		    </li>
		    <li class="item" data-id="id-11" data-type="league1">
		      <h3>Sheffield Wednesday</h3>
		    </li>
		    <li class="item" data-id="id-12" data-type="prem">
		      <h3>Sunderland</h3>
		    </li>
		    <li class="item" data-id="id-13" data-type="prem">
		      <h3>Tottenham Hotspur</h3>
		    </li>
		    <li class="item" data-id="id-14" data-type="champ">
		      <h3>Watford</h3>
		    </li>
		  </ul>
		</div>


			</div>
		</section>

  		<?php endwhile; endif; ?>

	<?php global $wp_query;
		query_posts(array('post_type' => 'cpt_work', 'posts_per_page' => -1, 'order' => 'desc'));
		?>
    <section class="proj-terms-wrap">
      <div class="project-terms">
        <?php $terms = get_terms( 'ptype' );
        echo '<ul>';
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term );
            if ( is_wp_error( $term_link ) ) {
                continue;
            }
            echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
        }
        echo '</ul>'; ?>
      </div>
    </section>
    	<section class="team-tiles">

		<?php while (have_posts()) : the_post(); ?>

        <?php if ( has_post_thumbnail() ) { ?>
					<a class="thumb-link a-fire" href="<?php the_permalink() ?>"><?php the_post_thumbnail("team-tile"); ?>
						<div class="teaser">
						<h3><?php the_title(); ?></h3>
            <div class="terms">
            <?php $terms = get_the_terms( $post->ID , 'ptype' );
              foreach ( $terms as $term ) {
              echo '<span>' . $term->name . '</span>'; } ?>
            </div>
						<p class="exc"><?php the_excerpt(); ?></p>
					</div>
					</a>
        <?php } ?>

		<?php endwhile; ?>

        <div style="clear:both;"></div>
      </section>

	   <div style="clear:both"></div>
    </div>
	</main>

	<div class="lb-frame"></div>


<!--re-order project archives--->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.quicksand.js"></script>

<script>
jQuery(document).ready(function($) {

  // get the action filter option item on page load
  var $filterType = $('#filterOptions li.active a').attr('class');

  // get and assign the ourHolder element to the
    // $holder varible for use later
  var $holder = $('ul.ourHolder');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
    // item is clicked
    $('#filterOptions li a').click(function(e) {
        // reset the active class on all the buttons
        $('#filterOptions li').removeClass('active');

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
            var $filteredData = $data.find('li[data-type=' + $filterType + ']');
        }

        // call quicksand and assign transition parameters
        $holder.quicksand($filteredData, {
            duration: 800,
        });
        return false;
    });
});
</script>


<?php get_footer(); ?>
