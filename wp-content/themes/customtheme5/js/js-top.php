<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.css" type="text/css" />
<script type="text/javascript">
/*---hide empty p---*/
jQuery(document).ready(function($) {
  $('p').each(function() {
      var $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
          $this.remove();
  });
});
</script>
