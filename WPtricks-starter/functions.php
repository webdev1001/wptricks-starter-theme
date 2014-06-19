<?php
/*
 *  INCLUDE OPTIONS FOT THE THEME CUSTOMIZER
 *************************************************************/
require_once dirname( __FILE__ ) . '/options.php';

/*
 * WIDGETS
 *************************************************************/
 
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'The sidebar for the blog widget area',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer One',
		'id' => 'footer-one',
		'description' => 'The first footer widget area',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
		));
	register_sidebar(array(
		'name' => 'Footer Two',
		'id' => 'footer-two',
		'description' => 'The second footer widget area',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
		));
	register_sidebar(array(
		'name' => 'Footer Three',
		'id' => 'footer-three',
		'description' => 'The third footer widget area',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
		));
	register_sidebar(array(
		'name' => 'Footer Four',
		'id' => 'footer-four',
		'description' => 'The fourth footer widget area',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
		));
}

/*
 * REGISTER NAVIATION MENU
 *************************************************************/

function register_my_menu() { //REGISTER NAV MENU
	register_nav_menu('header-menu',__( 'Header Menu' )); 
}
add_action( 'init', 'register_my_menu' );


/*
 * ADD THEME SUPPORT FOR POST-THUMBNAILS
 *************************************************************/

/* TO INCLUDE THE THUMBNAILS ADD THIS...
 * change the "large-thumbnail" to name you desire for your image
 
 *	<?php the_post_thumbnail( 'large-thumbnail' ); ?> */
 
add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 84, 84, true); // ADDING TRUE CROPS THE IMAGE, REMOVE ", TRUE" TO SCALE THE IMAGES.
	add_image_size( 'large-thumbnail', 1000, 480, true );
	add_image_size( 'facebook-og-thumbnail', 600, 480, true ); // CALLING THIS IN OUR HEADER, IN THE FACEBOOK OG TAG. (CORRECT SIZE AS OF 24/05/2014)

		
/*
 * SOCIAL MEDIA
 *************************************************************/
 
function add_this() { // ADD THIS SOCIAL SHARING INCLUDED , CALLED IN SINGLE.PHP
	echo '<ul class="addthis_toolbox addthis_default_style" addthis:url="' . $url . '" addthis:title="' . $title . '">
							<li><a class="addthis_counter addthis_bubble_style"></a></li>
							<li><a class="addthis_button_facebook"></a></li>
							<li><a class="addthis_button_twitter"></a></li>
							<li><a class="addthis_button_google_plusone_share"></a></li>
							<li><a class="addthis_button_compact"></a></li>
                        </ul>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>'
; }

/*
 * NEW EXCERPT
 *************************************************************/

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	  if (count($excerpt)>=$limit) {
		  array_pop($excerpt);
		  $excerpt = implode(" ",$excerpt).'...';
	  } else {
		  $excerpt = implode(" ",$excerpt);
	  }
		  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		  return $excerpt;
	  }
	  
	  function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
		  array_pop($content);
		  $content = implode(" ",$content).'...';
	  } else {
		  $content = implode(" ",$content);
	  }
		  $content = preg_replace('/[.+]/','', $content);
		  $content = apply_filters('the_content', $content);
		  $content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
/*
To display the excerpt add this:
	<?php $content = get_the_content(); echo wp_trim_words( $content , '38' ); ?> - Change the '38' to which ever number of words you would like to display
*/

/*
 * READ MORE
 *************************************************************/

function new_excerpt_more($more) {
global $post;
return '… <div class="read-more"><a class="button non-uniform" href="'. get_permalink($post->ID) . '">' . '<b>+</b> Read More' . '</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
 * GENERATE META TAGS
 *************************************************************/

function tags4meta() {
$posttags = get_the_tags();
foreach((array)$posttags as $tag) {
$tags4meta .= $tag->name . ',';
}
if (!is_single()) { ?>wordpress theme development, jquery, css, php, <?php } //CHANGE THIS TO YOUR OWN META TAGS
echo "$tags4meta";

} 

?>