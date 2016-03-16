<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', '_s' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'FFD500',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar2', '_c' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {

	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'classic_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


function example_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'social_icon_section',
		array(
			'title' => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'social_icon_facebook',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_facebook',
		array(
			'label' => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_twitter',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_twitter',
		array(
			'label' => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_linkedin',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_linkedin',
		array(
			'label' => 'Ссылка на Linkedin',
			'section' => 'social_icon_section',
			'type' => 'url',
			'default' => 'http://'
		)
	);
	$wp_customize->add_section(
		'contact_section',
		array(
			'title' => 'Contact',
			'description' => 'Это секция настроек.',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting(
		'number',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'number',
		array(
			'label' => 'Number',
			'section' => 'contact_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'email',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'email',
		array(
			'label' => 'Email',
			'section' => 'contact_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_section( 'bwpy_theme_colors', array(
		'title' => __( 'Theme Colors', 'bwpy' ),
		'priority' => 100,
	) );

// add color picker setting
	$wp_customize->add_setting( 'color', array(
		'default' => '#ff0000'
	) );

// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label' => 'Link Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'color',

	) ) );
	$wp_customize->add_section(
		'example_section_one',
		array(
			'title' => 'Баннер',
			'description' => 'This is a settings section.',
			'priority' => 2,
		)
	);
	$wp_customize->add_setting( 'img-upload' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload',
			array(
				'label' => 'Image Upload',
				'section' => 'example_section_one',
				'settings' => 'img-upload'
			)
		)
	);
	$wp_customize->add_section(
		'logo',
		array(
			'title' => 'Логотип',
			'description' => 'This is a settings section.',
			'priority' => 1,
		)
	);
	$wp_customize->add_setting( 'logo-img' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo-img',
			array(
				'label' => 'Logo img',
				'section' => 'logo',
				'settings' => 'logo-img',
				'default' => ''
			)
		)
	);
	$wp_customize->add_section(
		'sidebar_placement',
		array(
			'title' => 'Sidebar',
			'description' => 'This is a settings section.',
			'priority' => 3,
		)
	);
	$wp_customize->add_setting(
		'sidebar_placement',
		array(
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'sidebar_placement',
		array(
			'type' => 'radio',
			'label' => 'Sidebar',
			'section' => 'sidebar_placement',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
			),
		)
	);
}
add_action( 'customize_register', 'example_customizer' );

function bwpy_customizer_head_styles() {
	$color = get_theme_mod( 'color' );

	if ( $color != '#ff0000' ) :
		?>
		<style type="text/css">

			li.current-menu-item a:before, .menu-primary-menu-container ul li a:hover:before  {
				border-left: 8px solid <?php echo $color; ?>!important;
			}
			 #primary-menu, .read-more,.gallery article .entry-content .wrapper-cat h3,
			 .gallery article .entry-content .wrapper-cat h3,.widget_text button,
			 .contact-number,.contact-email,#secondary .widget_recent_entries ul li:hover,
			 #secondary .widget_categories ul li:hover{
				background-color: <?php echo $color; ?>!important;
			}

		</style>
		<?php
	endif;
}
add_action( 'wp_head', 'bwpy_customizer_head_styles' );

function side_customizer()
{
	$example_position = get_theme_mod('sidebar_placement');
	if ($example_position != '') {
		switch ($example_position) {
			case 'right':
				// Do nothing. The theme already aligns the logo to the left
				break;
			case 'left':
				?>
				<style type="text/css">
					#primary {
						float: right;
					}
					 #secondary {
						float: left ;
					}
				</style><?php
		}
	}
}
add_action( 'wp_head', 'side_customizer' );
function pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		echo "<div class=\"pagination\">";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>\n";
	}
}
function wp_corenavi() {
	global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = ' '; //текст ссылки "Предыдущая страница"
	$a['next_text'] = ' '; //текст ссылки "Следующая страница"
	$a['prev_next'] = false;
	if ($max > 1) echo '<div class="navigation">';

	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}
function mayak_widget_php($widget_content) {
	if (strpos($widget_content, '<' . '?') !== false) {
		ob_start();
		eval('?' . '>' . $widget_content);
		$widget_content = ob_get_contents();
		ob_end_clean();
	}
	return $widget_content;
}
add_filter('widget_text', 'mayak_widget_php', 99);

add_action('init', 'slider_register');
function slider_register() {
	$args = array(
		'label' => __('slider'),
		'singular_label' => __('slide'),
		'add_new'=> 'add',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'custom-fields', 'editor', 'thumbnail'),
		'menu_position'=> null,
		'menu_icon'=> null,
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'categories', 'custom-fields' ),
	);
	register_post_type( 'slider' , $args );
}