<?php




add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){

	//////////////////////////////////////
	///////////// SCRIPTS ////////////////
	//////////////////////////////////////
	/// MODERNIZR
	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js');
	wp_enqueue_script('modernizr');
	
	// Easing Functions
	wp_register_script('jquery.easing', get_bloginfo('template_url') . '/bower_components/jquery.easing/js/jquery.easing.min.js', array(), false, true);
	wp_enqueue_script('jquery.easing');
	
	// Scroll To Plugin
	wp_register_script('jquery.scrollTo', get_bloginfo('template_url') . '/bower_components/jquery.scrollTo/jquery.scrollTo.min.js', array(), false, true);
	wp_enqueue_script('jquery.scrollTo');


	// Fancybox Plugin
	wp_register_script('jquery.fancybox', get_bloginfo('template_url') . '/bower_components/fancyBox/source/jquery.fancybox.js', array(), false, true);
	wp_enqueue_script('jquery.fancybox');

	// Main Script
	wp_register_script('main_js', get_bloginfo('template_url') . '/js/main.js', array('jquery'), false, true);
	wp_enqueue_script('main_js');




	//////////////////////////////////////
	/////////////// CSS //////////////////
	//////////////////////////////////////
	// Fonts
	wp_enqueue_style('font_playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
	wp_enqueue_style('font_raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500,700');
	
	// Main Styles
	wp_enqueue_style('global', get_bloginfo('template_url') . '/style.css');




	//////////////////////////////////////
	// AJAX OBJECTS REFERENCE
	//////////////////////////////////////
	$reference_object = array(
		'base'				=> get_stylesheet_directory_uri(),
		'ajaxurl'			=> admin_url( 'admin-ajax.php' ),
		'action'			=> 'ajaxSortedContent',
	);
	wp_localize_script('main_js', 'base_reference', $reference_object );

}

//Add Featured Image Support
add_theme_support('post-thumbnails');


// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}
add_action( 'init', 'register_menus' );

add_filter('wp_nav_menu_items','add_custom_in_menu', 10, 2);

function add_custom_in_menu( $items, $args )
{
	
    if( $args->theme_location == 'main-nav' )
    {
        $new_item       = array( '<li class="title"><h1 class="main_title"><a href="'.get_bloginfo('siteurl').'/inteligencia">Claudia Olgu&iacute;n</a></h1></li>' );
        $items          = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );

        $array_items    = explode( ',', $items );
        array_splice( $array_items, 2, 0, $new_item ); // splice in at position 3
        $items          = implode( '', $array_items );
    }
    return $items;
}




function register_widgets(){

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}//end register_widgets()
add_action( 'widgets_init', 'register_widgets' );





/////////////////////////////////////////////////////////////
// MODIFY MAIN LOOP
/////////////////////////////////////////////////////////////
function my_modify_main_query( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) { // Run only on the homepage
		$query->query_vars['post_type'] = 'noticias';
	}
}
add_action( 'pre_get_posts', 'my_modify_main_query' );



/////////////////////////////////////////////////////////////
// LIMIT EXCERPT CHARACTERS
/////////////////////////////////////////////////////////////
function custom_excerpt_length( $length ) {
	return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/////////////////////////////////////////////////////////////
// AJAX CALLS
/////////////////////////////////////////////////////////////

function ajaxSortedContent() {

	// Custom Query
	$options = array(
		'order' => 'DESC',
		'post_status' => 'publish',
		'post_type' => array('post'),
		'posts_per_page'	=> 5
	);

	if($_POST['category']){
		$options['category_name'] = $_POST['category'];
	}
	//print_r($options);
	$sorted_posts = new WP_Query($options );


	// Init Object Stream
	ob_start();

	// Posts Loop
	while ( $sorted_posts->have_posts() ) : $sorted_posts->the_post();
	   get_template_part('content', 'item');
	endwhile;  
	
	$content .= ob_get_contents();
	ob_end_clean();
	// End Object Stream
	

	// JSON Object
	$return = array(
		'content'	=> $content
	);


	// Return result
	wp_send_json($return);
}
add_action( 'wp_ajax_nopriv_ajaxSortedContent', 'ajaxSortedContent' );
add_action( 'wp_ajax_ajaxSortedContent', 'ajaxSortedContent' );









/////////////////////////////////////////////////////////////
// CONVERT URLS TO BITLY SHORTENER
/////////////////////////////////////////////////////////////

function make_bitly_url($url){
	
	//Properties
	$appkey = '12c4dafc84295a965f6f76af1f79eddfb443428a';
	$format = 'txt';
	$version = '2.0.1';
	
	//call Bitly API
	$bitly = 'https://api-ssl.bitly.com/v3/shorten?longUrl='.urlencode($url).'&access_token='.$appkey.'&format='.$format;
	
	//get the shortened URL
	$response = file_get_contents($bitly);
	
	return $response ? trim($response) : $url;
}



