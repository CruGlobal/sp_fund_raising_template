<?php


// remove the generator from the head
remove_action('wp_head', 'wp_generator'); 



// add widget areas
function affari_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Widgets' ),
		'id' => 'sidebar-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Footer One' ),
		'id' => 'footer1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Footer Two' ),
		'id' => 'footer2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Footer Three' ),
		'id' => 'footer3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', 'affari_widgets_init');


// add affari_is_subpage() function
function affari_is_subpage($parent) {
	global $post;
	if (is_page() && ($parent == $post->post_parent)) {   // test to see if the page has a parent
    return $post->post_parent;             // return the ID of the parent post
  } else {                                  // there is no parent so ...
    return false;                          // ... the answer to the question is false
  }
}


// pushed footer or not
function affari_pushed($david) {
	if ($david == true) {
		echo "pushwrapper";
	}
}

// add breadcrumb
function affari_the_breadcrumb() {
  echo '<ul id="crumbs">';
  if (!is_home()) {
    echo '<li><a href="' . get_option('home') . '">Home</a>&nbsp;&raquo;&nbsp;</li>';
    if (is_category() || is_single()) {
      echo '<li>';
      the_category('</li><li>');
      if (is_single()) {
        echo '</li><li>';
        the_title();
      }
      echo '</li>';
    } elseif (is_page()) {
      if($post->post_parent) { 
        $anc = get_post_ancestors($post->ID);
        foreach ($anc as $ancestor) {
          $output = '<li>'.get_the_title($ancestor).'</li>'.$output;
        }
        echo $output;
      } else {
        echo '<li>';
        echo the_title();
        echo '</li>';
      }
    }  
  }
  elseif (is_tag()) {single_tag_title();}
  elseif (is_day()) {echo '<li>Archive for ' . the_time('F jS, Y') . '</li>';}
  elseif (is_month()) {echo'<li>Archive for ' . the_time('F, Y') . '</li>';}
  elseif (is_year()) {echo'<li>Archive for ' . the_time('Y') . '</li>';}
  elseif (is_author()) {echo'<li>Author Archive</li>';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li>Blog Archives</li>';}
  elseif (is_search()) {echo'<li>Search Results</li>';}
	echo '</ul>';
}

// theme options
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'project_image', 608, 362, true ); //300 pixels wide (and unlimited height)
	add_image_size( 'square', 85, 85, true ); //(cropped)
}

function get_image_id($image_url) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';"));
    return $attachment[0];
}

?>