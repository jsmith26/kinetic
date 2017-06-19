<script type="text/javascript">
/*mobile menu*/
jQuery(document).ready(function($) {
$(window).on('resize', function(){
      var win = $(this); //this = window
      if (win.width() >= 767) {
	  $('body').removeClass('stop-scroll');
	  $("nav.mob").css("display", ""); //reset display
	  $(".nav-close").css("display", "");
	  $(".nav-open").css("display", "");
	  }
});
//OPENER
$(".nav-open").click(function(e){
	e.preventDefault();
	$(".nav-open").hide();
	$(".nav-close").css("display","block");
	$("nav.mob").fadeIn(300);
	$('body').addClass('stop-scroll');
});
//CLOSER
$(".nav-close").click(function(e){
	e.preventDefault();
	$(".nav-close").hide();
	$(".nav-open").show();
	$("nav.mob").fadeOut(300);
	$('body').removeClass('stop-scroll');
});
});
</script>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.js"></script>
<script type="text/javascript">
//CASE STUDY CAROUSEL
jQuery(document).ready(function($) {
$('.bxslider1 li:first-child').addClass("active");
$('.bxslider1').bxSlider({
    pager: false,
    infiniteLoop: false,
    minSlides: 1,
    maxSlides: 1,
   slideWidth: 540,
   hideControlOnEnd: true,
   slideMargin: 10
  });
});
</script>
<script type="text/javascript">
//PROJECT NAV CAROUSEL
jQuery(document).ready(function($) {
$('.bxslider2 li:first-child').addClass("active");
$('.bxslider2').bxSlider({
  pager: false,
  infiniteLoop: false,
  minSlides: 2,
  maxSlides: 2,
 slideWidth: 260,
 hideControlOnEnd: true,
 slideMargin: 20
  });
});
</script>

<script type="text/javascript">
/*para bg*/
jQuery(document).ready(function($) {
  if ($(window).width() < 520) {
    //do nothing
  }
  else {
    var $win = $(window);
    $('.para-bg').each(function(){
        var scroll_speed = 5;
        var $this = $(this);
        $(window).scroll(function() {
            var bgScroll = -(($win.scrollTop() - $this.offset().top)/ scroll_speed);
            var bgPosition = 'center '+ bgScroll + 'px';
            $this.css({ backgroundPosition: bgPosition });
        });
    });
    }
});
</script>

<script type="text/javascript">
/*--slide to id-*/
jQuery(document).ready(function($) {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
		$('html,body').animate({
		scrollTop: target.offset().top
	}, 500);
		return false;
		}
		}
	});
});
</script>

<!--one page scroller-->

<?php if (is_page('home')) { ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.onepage-scroll.js"></script>
  <link href='<?php echo get_template_directory_uri(); ?>/js/onepage-scroll.css' rel='stylesheet' type='text/css'>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
    $(".scroll-main").onepage_scroll({
  	sectionContainer: ".scroll",
    updateURL: false,
    loop: false,
  	animationTime: 800,
    responsiveFallback: 800,
  	 afterMove: function(){
          var active_rel = $(this).find('section.active').attr('rel');
  			$(".flash.active").addClass("seeu");
  			$(".active .ani").addClass("seeu");
  			/*PG 2*/
  			$(".bg2.active .tred").addClass("mover");
  			/*PG 3*/
  	        $(".active .flag").delay( 500 ).addClass("flag-end");
  	        $(".bg3.active h1").delay( 100 ).addClass("fade-end");
  	        $(".bg3.active p.fade-start").delay( 800 ).addClass("fade-end");
  	        $(".bg3.active a.fade-start").delay( 1200 ).addClass("fade-end");
  			$(".bg3.active .clouds").addClass("mover");
      },
  	 beforeMove: function(){
          var active_rel = $(this).find('section.active').attr('rel');
  			$(".flash.active").removeClass("seeu");
  			$(".bg1-grab").removeClass("blur");
  			$(".bg1-grab").css("display","none");
  			$(".active .logo").css("display","block");
      },
    });
  	$(".scroll-up").click(function(){
  		$(".scroll-main").moveTo(1);
  	});
  	$(".scroll-dn").click(function(){
  		$(".scroll-main").moveDown();
  	});
  	$(".scroll-3").click(function(){
  		$(".scroll-main").moveTo(3);
  	});
  	$(".scroll-1").click(function(){
  		$(".scroll-main").moveTo(1);
  	});
  });
  </script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll-main").moveTo(1);
      $(".home1").addClass('slide-in');
  });
  </script>

<?php } ?>

<script>
jQuery(document).ready(function($) {
  $( '.c-info input' ).focusin(function() {
    $( this ).parent( '.wpcf7-form-control-wrap' ).addClass('focused');
  });
  $( '.c-info input' ).focusout(function() {
    if( !$(this).val() ) {
      $( this ).parent( '.wpcf7-form-control-wrap' ).removeClass('focused');
    }
  });
});
</script>
