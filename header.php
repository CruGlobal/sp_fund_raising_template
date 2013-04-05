<?php
  
  //include "lessc.inc.php";
  //try {lessc::ccompile(dirname(__FILE__) . '/css/style.less', dirname(__FILE__) . '/css/style.css');}
  //catch (exception $ex) {exit('lessc fatal error:<br />'.$ex->getMessage());}
  
	
	if (is_front_page()) {$logotag = "h1";} else {$logotag = "div";}
	
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta content="True" name="HandheldFriendly">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <meta name="viewport" content="width=device-width">
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
<?php wp_head(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/facebook_user_id.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.mobilemenu.js"></script>
<script>
	jQuery(document).ready(function(){
		jQuery('.menu ul').mobileMenu({prependTo: '#mobilenav'});
	});
</script>

<!-- END WP HEAD INFO -->

<?php
  $img_url = of_get_option('spkick_project_image', 'Not Set');
  $img_id = get_image_id($img_url);
?>

<meta property="og:image" content="<?php echo $img_url; ?>" /> 
<meta property="og:site_name" content="<?php echo of_get_option('spkick_tripname', 'Not Set'); ?>" /> 
<meta property="og:title" content="<?php echo of_get_option('spkick_tripname', 'Not Set'); ?>" /> 
<meta property="og:url" content="<?php echo get_site_url(); ?>" /> 
<meta property="og:description" content="I just gave to help <?php echo of_get_option('spkick_person_name', 'Not Set'); ?> go on a Summer Project to <?php echo of_get_option('spkick_tripname', 'Not Set'); ?>. Join the team" /> 
<meta property="og:type" content="website" /> 

</head>

<body id="<?php echo $post->post_name; ?>" <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=58248234608";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="masterwrapper">

  <header id="mainheader">
    <div class="row">
      <div class="grid_6">
        <div id="logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
        </div>
      </div>
      <div class="grid_6 cruright">
        <div id="crulogo">
          <a href="http://www.cruoncampus.org/" target="_blank>"><img src="<?php bloginfo('template_url'); ?>/images/crulogo.png" alt="Cru" /></a>
        </div>
      </div>
    </div>
  </header>
  <?php
    $count_pages = wp_count_posts('page');
    $published_pages = $count_pages->publish;
    
    $count_posts = wp_count_posts('post');
    $published_posts = $count_posts->publish;
    
  ?>
  <nav id="mainnav" role="navigation"
    <?php if(($published_pages >= 1) || ($published_posts >= 1)) :?><?php else: ?> class="empty"<?php endif; ?>
  >
    <div class="row">
      <div class="grid_12">
        <div id="mobilenav"></div>
        <?php 
          $theme_location = 'main';
          $theme_locations = get_nav_menu_locations();
          $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );  
        ?>
          
          
          <div class="menu">
            <ul>
              <li><a href="<?php echo home_url(); ?>">Home</a></li>
              <?php wp_list_pages(array('exclude' => 2, 'title_li' => '')); ?>
              <li><a href="" id="topgive" class="donatecta" >Give</a></li>
            </ul> 
          </div>
          
      </div>
    </div>
  </nav>
  
  <div id="mainwrapper">
    <div class="row">
      <div class="grid_12">