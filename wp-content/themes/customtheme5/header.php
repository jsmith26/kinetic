<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
<?php include("js/js-top.php"); ?>
</head>

<body class="pg-<?php echo the_slug(); ?>">
  <div id="m-nav"><!--just mobile-->
    <a class="nav-open">+</a><a class="nav-close">&#10006;</a>
    <nav class="mob">
      <?php wp_nav_menu( array('menu' => 'top' )); ?>
      <div class="mob-social">
          <a href="http://facebook.com/kineticmc" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="http://instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="http://linkedin.com" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      </div>
    </nav>
  </div>
<header>
  <div class="box-inner">
      <div class="logo"><a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/kinetic-logo.png" /></a></div>
      <div class="h-rt">
        <nav class="prime">
            <?php wp_nav_menu( array('menu' => 'top' )); ?>
        </nav>
      </div>
    <div style="clear:both"></div>
    </div>
</header>

    <?php if ( is_home() && ! is_front_page() ) {
      echo '<div class="social-side vcent blue">';
    } else {
      echo '<div class="social-side vcent">';
    } ?>
  <div class="social-wrap vbod">
    <a href="http://facebook.com/kineticmc" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
    <a href="http://instagram.com/kineticmarketing" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
    <a href="http://linkedin.com" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
    </a>
  </div>
</div>
