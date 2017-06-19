<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.onepage-scroll.js"></script>
<link href='<?php echo get_template_directory_uri(); ?>/js/onepage-scroll.css' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  jQuery(document).ready(function($) {
  $(".blog-scroll").onepage_scroll({
  sectionContainer: ".scroll",
  updateURL: true,
  loop: false,
  responsiveFallback: 900,
  animationTime: 400,
   afterMove: function(){
        var newImg = $('.active .thepic').text();
        //var newPic = $('.active').attr('newpic','');
        var previmg = $("<img />").attr('src', newImg);
        $(".img-hold").empty();
        $(".img-hold").append(previmg);
        $(".img-hold").fadeIn(400);
    },
   beforeMove: function(){
        var active_rel = $(this).find('section.active').attr('rel');
    },
  });
  $(".scroll-main").moveTo(1);
  $('body').addClass('hide-news');
});
</script>
