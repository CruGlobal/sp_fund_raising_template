<?php
  include "lessc.inc.php";
  try {lessc::ccompile(dirname(__FILE__) . '/css/style.less', dirname(__FILE__) . '/css/style.css');}
	catch (exception $ex) {exit('lessc fatal error:<br />'.$ex->getMessage());}
	
	if (is_front_page()) {$logotag = "h1";} else {$logotag = "div";}
	
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <!-- <meta name="viewport" content="width=1040,maximum-scale=5" /> -->
  <title>
      <?php 
         the_title();
      ?>
  </title>

  <link href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" rel="stylesheet" />
  <link href="<?php bloginfo('template_url'); ?>/css/grid.css" type="text/css" rel="stylesheet" />
  <link href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" rel="stylesheet" />
  <link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />

<!-- WP HEAD INFO -->
<?php wp_enqueue_script("jquery"); ?>
<script src="<?php bloginfo('template_url'); ?>/js/facebook_user_id.js" type="text/javascript"></script>
<?php wp_head(); ?>
<!-- END WP HEAD INFO -->


</head>

<body id="<?php echo $post->post_name; ?>" <?php body_class(); ?>>
<div id="masterwrapper" class="<?php affari_pushed(true); ?>">

  <header id="mainheader">
    <div class="row">
      <div class="grid_6">
        <div id="logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
        </div>
      </div>
      <div class="grid_6">
        <div id="crulogo">
          <a href="http://www.cruoncampus.org/" target="_blank>"><img src="<?php bloginfo('template_url'); ?>/images/crulogo.png" alt="Cru" /></a>
        </div>
      </div>
    </div>
  </header>
  
  <nav id="mainnav" role="navigation">
    <div class="row">
      <div class="grid_12">
        <?php wp_nav_menu(); echo "\n"; ?>
      </div>
    </div>
  </nav>
  
  <div id="mainwrapper">
    <div class="row">
      <div class="grid_12">