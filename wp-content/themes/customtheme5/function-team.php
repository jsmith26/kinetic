<script type="text/javascript">
/*TEAM POP UP AJAX*/
jQuery(document).ready(function($) {
  $(function() {
    String.prototype.decodeHTML = function() {
      return $("<div>", {html: "" + this}).html();
    };

    var $main = $(".lb-frame"),

    init = function() {
            $('.lb-frame.team-frame').append('<a class="pop-close">Close</a>');
            $(".pop-close").click(function() {
            	$("#dimmer-w").fadeOut(300);
              $(".lb-frame").fadeOut(300);
              $(".lb-frame").empty();
            	$('body').removeClass('stop-scroll');
            });
           $('p').each(function() {
               var $this = $(this);
               if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
                   $this.remove();
           });
    },

    ajaxLoad = function(html) {
      document.title = html
        .match(/<title>(.*?)<\/title>/)[1]
        .trim()
        .decodeHTML();

      init();
    },

    loadPage = function(href) {
      $main.load(href + " .ajax-fill", ajaxLoad);
    };

    init();

    $(window).on("popstate", function(e) {
      if (e.originalEvent.state !== null) {
        loadPage(location.href);
      }
    });

    $(document).on("click", ".a-fire", function() {
     $('#dimmer-w').fadeIn(200);
      var href = $(this).attr("href");
      if (href.indexOf(document.domain) > -1
        || href.indexOf(':') === -1)
      {
        loadPage(href);
        return false;
      }
    });
  });
  $body = $("body");
  $(document).on({
    ajaxStart: function() {
      $(".lb-frame").addClass("loading");
      $(".loader").addClass("loading");
    },
     ajaxStop: function() {
       $(".lb-frame").removeClass("loading");
       $(".loader").removeClass("loading");
       $('.lb-frame').fadeIn(400);
     }
   });
});
</script>
