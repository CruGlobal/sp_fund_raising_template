<?php
if (!empty($_REQUEST['Amount'])) {
	$options = get_option('optionsframework');
	if (isset($options['id'])) {
		$pieces = get_option($options['id']);
		if (!isset($pieces[$options['id'] . '_current_amount'])) {
			$pieces[$options['id'] . '_current_amount'] = 0;
		}
    $amount = str_replace(array('$',','), '', $_REQUEST['Amount']);
		$pieces[$options['id'] . '_current_amount'] += (int) $amount;
		update_option($options['id'], $pieces);
	}
	//header('Location: /?thanks=yes');
	exit;
}

// remove the generator from the head
remove_action('wp_head', 'wp_generator');



/*
$post_id - The ID of the post you'd like to change.
$status -  The post status publish|pending|draft|private|static|object|attachment|inherit|future|trash.
*/
function change_post_status($post_id,$status){
    $current_post = get_post( $post_id, 'ARRAY_A' );
    $current_post['post_status'] = $status;
    wp_update_post($current_post);
}

// check for default content
function first_run_options() {
  $check = get_option('theme_name_activation_check');
  if ( $check != "set" ) {
    $post = array(
      'post_author' => get_current_user_id(),
      'post_content' => 'Blog Holder',
      'post_name' =>  'Blog',
      'post_status' => 'publish',
      'post_title' => 'Blog',
      'post_type' => 'page',
      'post_parent' => 0,
      'menu_order' => 0,
      'to_ping' =>  '',
      'pinged' => '',
    );
    wp_insert_post($post);
    add_option('theme_name_activation_check', "set");
    
    $blog = get_page_by_title('Blog Homepage');
    update_option( 'page_for_posts', $blog->ID );
    
    if(get_page_by_title('Calendar')) {change_post_status(6,'draft');};
    if(get_page_by_title('Message Board')) {change_post_status(4,'draft');};
    if(get_page_by_title('Prayer Center')) {change_post_status(5,'draft');};
    if(get_page_by_title('Resource Center')) {change_post_status(7,'draft');};
    if(get_page_by_title('Sample Page')) {};
    
    if(get_page_by_title('Sample Page')) {
      $sample = get_page_by_title( 'Sample Page' );
      update_option( 'page_on_front', $sample->ID );
      update_option( 'show_on_front', 'page' );
    }
    
    
  }
}
add_action('wp_head', 'first_run_options');


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



/*
* parse_youtube_url() PHP function
* Author: takien
* URL: http://takien.com
*
* @param string $url URL to be parsed, eg:
* http://youtu.be/zc0s358b3Ys,
* http://www.youtube.com/embed/zc0s358b3Ys
* http://www.youtube.com/watch?v=zc0s358b3Ys
* @param string $return what to return
* - embed, return embed code
* - thumb, return URL to thumbnail image
* - hqthumb, return URL to high quality thumbnail image.
* @param string $width width of embeded video, default 560
* @param string $height height of embeded video, default 349
* @param string $rel whether embeded video to show related video after play or not.

*/

function parse_youtube_url($url,$return='embed',$width='',$height='',$rel=0){
    $urls = parse_url($url);

    //url is http://youtu.be/xxxx
    if($urls['host'] == 'youtu.be'){
        $id = ltrim($urls['path'],'/');
    }
    //url is http://www.youtube.com/embed/xxxx
    else if(strpos($urls['path'],'embed') == 1){
        $id = end(explode('/',$urls['path']));
    }
     //url is xxxx only
    else if(strpos($url,'/')===false){
        $id = $url;
    }
    //http://www.youtube.com/watch?feature=player_embedded&v=m-t4pcO99gI
    //url is http://www.youtube.com/watch?v=xxxx
    else{
        parse_str($urls['query']);
        $id = $v;
        if(!empty($feature)){
            $id = end(explode('v=',$urls['query']));
        }
    }
    //return embed iframe
    if($return == 'embed'){
        return '<iframe src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'" frameborder="0" width="100%'.''/* ($width?$width:560) */.'" height="100%'.''/* ($height?$height:349) */.'"></iframe>';
    }
    //return normal thumb
    else if($return == 'thumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
    }
    //return hqthumb
    else if($return == 'hqthumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
    }
    // else return id
    else{
        return $id;
    }
}

?>
