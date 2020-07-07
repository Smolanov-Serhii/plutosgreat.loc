<?php
/**
 * plutosgreat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package plutosgreat
 */
// удаляет H2 из шаблона пагинации

function mayak_cats_images(){
    $ags = array(
        'taxonomy'=>'category',
        'parent' => get_query_var('cat'),
        'meta_query' => array(array('key' => 'id-cat-images',)),
    );
    $terms = get_terms($ags);
    $count = count($terms);
    if($count > 0){
        echo '<div class="cat-thumbnail"><ul>';
        foreach ($terms as $term) {
            $term_taxonomy_id = $term->term_taxonomy_id;
            $image_id = get_term_meta ( $term_taxonomy_id, 'id-cat-images', true );
            echo '<li>
       <a href="' .get_category_link($term_taxonomy_id).'">' .wp_get_attachment_image ( $image_id, 'thumbnail' ). '</a>
       <a href="' .get_category_link($term_taxonomy_id).'">'. $term->name.'</a>
       </li>';
        }
        echo '</ul></div>';
    }
}


foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}

foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination( array(
    'end_size' => 2,
) );


function the_truncated_post($symbol_amount) {
    $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

//обрезание описания рубрик в админке сайта start
function wph_trim_cats() {
    add_filter('get_terms', 'wph_truncate_cats_description', 10, 2);
}
function wph_truncate_cats_description($terms, $taxonomies) {
    if('category' != $taxonomies[0])
        return $terms;
    foreach($terms as $key=>$term) {
        $terms[$key]->description = mb_substr($term->description, 0, 80);
        if($term->description != '') {
            $terms[$key]->description .= '...';
        }
    }
    return $terms;
}
add_action('admin_head-edit-tags.php', 'wph_trim_cats');
//обрезание описания рубрик в админке сайта end

add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    }
    return $title;
}
if ( ! function_exists( 'plutosgreat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function plutosgreat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on plutosgreat, use a find and replace
		 * to change 'plutosgreat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'plutosgreat', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'plutosgreat' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'plutosgreat_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'plutosgreat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function plutosgreat_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'plutosgreat_content_width', 640 );
}
add_action( 'after_setup_theme', 'plutosgreat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function plutosgreat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'plutosgreat' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'plutosgreat' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'plutosgreat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function plutosgreat_scripts() {

    wp_enqueue_style( 'plutosgreat-normalize', get_template_directory_uri() . '/src/scss/normalizer.css', array(), '1.0.0', false);
	wp_enqueue_style( 'plutosgreat-style', get_template_directory_uri() . '/dist/css/style.css', array(), '1.0.0', false);
	wp_enqueue_style( 'plutosgreat-aos', get_template_directory_uri() . '/src/scss/aos.css', array(), '1.0.0', false);

    wp_enqueue_script( 'plutosgreat-slick', get_template_directory_uri() . '/src/js/slick.js', array('jquery'), null, true);
	wp_enqueue_script( 'plutosgreat-navigation', get_template_directory_uri() . '/dist/js/common.js', array(), '1.0.0', true);
	wp_enqueue_script( 'plutosgreat-aos', get_template_directory_uri() . '/src/js/aos.js', array('jquery'), null, true);

	wp_enqueue_script( 'plutosgreat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'plutosgreat_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

