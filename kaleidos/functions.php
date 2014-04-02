<?php
/**
 * Kaleidos functions and definitions
 *
 * @package Kaleidos
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kaleidos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kaleidos_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kaleidos, use a find and replace
	 * to change 'kaleidos' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kaleidos', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kaleidos' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'video', 'quote' ) );

	// Setup the WordPress core custom background feature.
    /*
	add_theme_support( 'custom-background', apply_filters( 'kaleidos_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    */

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // kaleidos_setup
add_action( 'after_setup_theme', 'kaleidos_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function kaleidos_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kaleidos' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kaleidos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kaleidos_scripts() {
	wp_enqueue_style( 'kaleidos-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kaleidos-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kaleidos-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'kaleidos-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), '20140401', true );

	wp_enqueue_script( 'kaleidos-main', get_template_directory_uri() . '/js/main.js', array(), '20140402', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaleidos_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

##
# Create and init custom Taxonomy for languages
##
add_action( 'init', 'create_language_tax' );

function create_language_tax() {
    $labels = array(
		'name'              => _x( 'Languages', 'taxonomy general name' ),
		'singular_name'     => _x( 'Language', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Languages' ),
		'all_items'         => __( 'All Languages' ),
		'parent_item'       => __( 'Parent Language' ),
		'parent_item_colon' => __( 'Parent Languages:' ),
		'edit_item'         => __( 'Edit Language' ),
		'update_item'       => __( 'Update Languages' ),
		'add_new_item'      => __( 'Add New Languages' ),
		'new_item_name'     => __( 'New Languages Name' ),
		'menu_name'         => __( 'Language' ),
	);
	register_taxonomy(
		'lang',
		'post',
		array(
            'labels' => $labels,
			'rewrite' => array( 'slug' => 'lang' ),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
			'hierarchical' => true,
		)
	);
}

##
# Show admin custom user fields
##
add_action( 'show_user_profile', 'user_custom_fields' );
add_action( 'edit_user_profile', 'user_custom_fields' );

function user_custom_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">
        <tr>
            <th>
                <label for="user_position">Position</label>
            </th>
            <td>
                <input type="text" name="user_position" id="user_position" value="<?php echo esc_attr( get_the_author_meta( 'user_position', $user->ID ) ); ?>" class="regular-text" />
                <p class="description"> Please enter your position. Ex. 'Engineer'</p>
            </td>
        </tr>
        <tr>
            <th>
                <label for="user_color">Color</label>
            </th>
            <td>
                <input type="text" name="user_color" id="user_color" value="<?php echo esc_attr( get_the_author_meta( 'user_color', $user->ID ) ); ?>" class="regular-text" />
                <p class="description"> Please enter your personal color. Ex. '#CC0000'</p>
            </td>
        </tr>
   </table>
<?php }

##
# Save user custom fileds
##
add_action( 'personal_options_update', 'save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'save_user_custom_fields' );

function save_user_custom_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
    return false;

    ## Add as many ad need for new user custom fields
    update_usermeta( $user_id, 'user_position', $_POST['user_position'] );
    update_usermeta( $user_id, 'user_color', $_POST['user_color'] );
}
