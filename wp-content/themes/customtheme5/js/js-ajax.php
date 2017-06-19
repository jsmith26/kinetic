<script type="text/javascript">
/*employee ajax tabs*/
jQuery(document).ready(function($) {
  $(".list-nav .current-menu-item a").addClass("active");
  $(function() {
    String.prototype.decodeHTML = function() {
      return $("<div>", {html: "" + this}).html();
    };

    var $main = $(".list-bod"),

    init = function() {
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
      $main.load(href + " .ajax-go>*", ajaxLoad);
    };

    init();

    $(window).on("popstate", function(e) {
      if (e.originalEvent.state !== null) {
        loadPage(location.href);
      }
    });

    $(document).on("click", ".list-nav a", function() {
      $(".list-bod").empty();
      $(".list-nav a").removeClass("active");
      var href = $(this).attr("href");
      $(this).addClass("active");
      if (href.indexOf(document.domain) > -1
        || href.indexOf(':') === -1)
      {
        history.pushState({}, '', href);
        loadPage(href);
        return false;
      }
    });
  });

  $body = $("main");
  $(document).on({
    ajaxStart: function() {
      $(".list-bod").removeClass("done");
      $(".loader").addClass("loading");
      $(".list-bod").addClass("loading");
    },
     ajaxStop: function() {
       $(".loader").removeClass("loading");
       $(".list-bod").removeClass("loading");
       $(".list-bod").addClass("done");
     }
   });

});
</script>

<script type="text/javascript">
/*projects ajax tabs*/
jQuery(document).ready(function($) {
  $(".p-nav .current-menu-item a").addClass("active");
  $(function() {
    String.prototype.decodeHTML = function() {
      return $("<div>", {html: "" + this}).html();
    };

    var $main = $(".p-bod"),

    init = function() {
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
      $main.load(href + " .ajax-go>*", ajaxLoad);
    };

    init();

    $(window).on("popstate", function(e) {
      if (e.originalEvent.state !== null) {
        loadPage(location.href);
      }
    });

    $(document).on("click", ".p-nav a", function() {
      $(".p-bod").empty();
      $(".p-nav a").removeClass("active");
      var href = $(this).attr("href");
      $(this).addClass("active");
      if (href.indexOf(document.domain) > -1
        || href.indexOf(':') === -1)
      {
        history.pushState({}, '', href);
        loadPage(href);
        return false;
      }
    });
  });

  $body = $("main");
  $(document).on({
    ajaxStart: function() {
      $(".p-bod").removeClass("done");
      $(".loader").addClass("loading");
      $(".p-bod").addClass("loading");
    },
     ajaxStop: function() {
       $(".loader").removeClass("loading");
       $(".p-bod").removeClass("loading");
       $(".p-bod").addClass("done");
     }
   });

});
</script>
