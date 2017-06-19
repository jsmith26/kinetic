	<div class="lb-frame app-frame" style="display:none;">
		<section class="apply-wrap">
			<div class="c-info apply">
				<h2>Apply at Kinetic</h2>
				<h4>and lets make awesome things</h4>
			<?php echo do_shortcode('[contact-form-7 id="181" title="Apply"]'); ?>
			</div>
		</section>
		<a class="app-close">Close</a>
	</div>

<div id="dimmer-w"></div>

<script type="text/javascript">
/*mobile menu*/
jQuery(document).ready(function($) {
	$(".apply").click(function(e){
		e.preventDefault();
		$("#dimmer-w").fadeIn(200);
		$(".lb-frame").fadeIn(300);
		$('body').addClass('stop-scroll');
	});
	$(".app-close").click(function(e){
		e.preventDefault();
		$(".lb-frame").fadeOut(200);
		$("#dimmer-w").fadeOut(250);
		$('body').removeClass('stop-scroll');
	});
});
</script>
