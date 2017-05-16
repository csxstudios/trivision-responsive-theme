<?php
$trivision_theme_name = 'TriVisionTheme';

require_once('includes/theme-customizer.php');
require_once('includes/shortcodes.php');
//require_once('includes/vc_shortcode.php');
//require_once('includes/theme-plugins.php');
require_once('includes/wp_bootstrap_navwalker.php');
// Proper way to enqueue scripts and styles

function theme_scripts() {
	$ver_stamp = filemtime( get_stylesheet_directory() . '/css/index.css');
	$ver_stamp_style = filemtime( get_stylesheet_directory() . '/style.css');
	$ver_stamp_js = @filemtime( get_template_directory_uri() . '/js/loadmore.js');
	wp_enqueue_style( 'sidrcss', get_template_directory_uri().'/css/jquery.sidr.dark.min.css');
	wp_enqueue_style( 'style', get_stylesheet_uri(), false,  3.2 );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'index', get_template_directory_uri() . '/css/index.css', false,  $ver_stamp );	
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'wow-js', get_template_directory_uri()."/js/wow.min.js", array(), false, true);
	wp_enqueue_script( 'loadmore', get_template_directory_uri() . '/js/loadmore.js', array('jquery'), 1.0, true );
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bootstrapmin', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), 3.3, false);
	wp_enqueue_script( 'bootstraphover', get_template_directory_uri() . '/js/bootstrap-hover-dropdown.min.js', array('jquery'), 1.0, true );
	wp_enqueue_script( 'video', get_template_directory_uri() . '/js/video_header.js', array('jquery'), 1.0, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts', 0 );

function register_navmenus() {
	global $trivision_theme_name;
	register_nav_menus( array(
		'primary'   => __('Primary Nav', $trivision_theme_name),
		'topnav'   => __('Top Nav', $trivision_theme_name),
		'footer'   => __('Footer Nav', $trivision_theme_name),
	) );
	if ( !is_nav_menu( 'primary' )) {$menu_id = wp_create_nav_menu( 'primary' );}
	if ( !is_nav_menu( 'topnav' )) {$menu_id = wp_create_nav_menu( 'topnav' );}
	if ( !is_nav_menu( 'footer' )) {$menu_id = wp_create_nav_menu( 'footer' );}
}

add_action( 'init', 'register_navmenus' );

add_filter('relevanssi_pre_excerpt_content', 'rlv_trim_vc_shortcodes');
function rlv_trim_vc_shortcodes($content) {
    $content = preg_replace('/\[\/?vc.*?\]/', '', $content);
    $content = preg_replace('/\[\/?mk.*?\]/', '', $content);
    $content = preg_replace('/\[\/?rev.*?\]/', '', $content);
    return $content;
}

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Right Sidebar',
		'id' => 'sidebar_right',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name'=> 'Footer Widget Col-1',
		'id' => 'footer_col1',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Footer Widget Col-2',
		'id' => 'footer_col2',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Footer Widget Col-3',
		'id' => 'footer_col3',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'trivision_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function trivision_theme_register_required_plugins() {
	global $trivision_theme_name;

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Plugin Download the http://wordpress.org
        array(
            'name'               => 'Wordfence Security',
            'slug'               => 'wordfence',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),

        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Contact Form DB', // The plugin name
            'slug'                     => 'contact-form-7-to-database-extension', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Duplicate Post', // The plugin name
            'slug'                     => 'duplicate-post', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Duplicate Post', // The plugin name
            'slug'                     => 'duplicate-post', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'EWWW Image Optimizer', // The plugin name
            'slug'                     => 'ewww-image-optimizer', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Responsive Menu', // The plugin name
            'slug'                     => 'responsive-menu', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Admin Columns', // The plugin name
            'slug'                     => 'codepress-admin-columns', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Black Studio TinyMCE Widget', // The plugin name
            'slug'                     => 'black-studio-tinymce-widget', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'WP Google Maps', // The plugin name
            'slug'                     => 'wp-google-maps', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Types', // The plugin name
            'slug'                     => 'types', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Private Blog', // The plugin name
            'slug'                     => 'password-protect-wordpress', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'WP Video Lightbox', // The plugin name
            'slug'                     => 'wp-video-lightbox', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Envira Gallery Lite', // The plugin name
            'slug'                     => 'envira-gallery-lite', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Duplicator', // The plugin name
            'slug'                     => 'duplicator', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Google Analytics Dashboard for WP', // The plugin name
            'slug'                     => 'google-analytics-dashboard-for-wp', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'All in One SEO Pack', // The plugin name
            'slug'                     => 'all-in-one-seo-pack', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
		array(
            'name'                     => 'Scalable Vector Graphics (SVG)', // The plugin name
            'slug'                     => 'scalable-vector-graphics-svg', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),
        // This is an example of how to include a plugin from a private repo in your theme.
        array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/includes/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).            
            'source'             => get_template_directory_uri() . '/includes/plugins/revslider.zip', // The plugin source.            
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 			
		array(
            'name'                     => 'Woocommerce', // The plugin name
            'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are wrapped in a sprintf(), so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', $trivision_theme_name ),
            'menu_title'                      => __( 'Install Plugins', $trivision_theme_name ),
            'installing'                      => __( 'Installing Plugin: %s', $trivision_theme_name ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', $trivision_theme_name ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %s plugin.',
                'Sorry, but you do not have the correct permissions to install the %s plugins.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %s plugins.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %s plugin.',
                'Sorry, but you do not have the correct permissions to update the %s plugins.',
                $trivision_theme_name
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                $trivision_theme_name
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                $trivision_theme_name
            ),
            'return'                          => __( 'Return to Required Plugins Installer', $trivision_theme_name ),
            'plugin_activated'                => __( 'Plugin activated successfully.', $trivision_theme_name ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', $trivision_theme_name ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

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

add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
 
function custom_email_confirmation_validation_filter( $result, $tag ) {
    $tag = new WPCF7_FormTag( $tag );
 
    if ( 'your-email-confirm' == $tag->name ) {
        $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
        $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
 
        if ( $your_email != $your_email_confirm ) {
            $result->invalidate( $tag, "Are you sure this is the correct address?" );
        }
    }
 
    return $result;
}

function disable_types_frontend() {
    // Maybe modify $example in some way.
    return false;
}
add_filter( 'types_information_table', 'disable_types_frontend' );

function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumb"><li><a href="'.get_bloginfo('url').'">Home</a></li>';
    if (!is_home()) {
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                //echo '</li><li>';
                //the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                }
                echo $output;
                echo '<li class="active" title="'.$title.'">'.$title.'</li>';
            } else {
                echo '<li class="active">'.get_the_title().'</li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...<p class="readmore"><a href="'. get_permalink($post->ID) . '">Read More +</a></p>';
}
//add_filter('excerpt_more', 'new_excerpt_more');

//pagination
function the_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => $prev,
        'next_text' => $next,		
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '', $return );
}

function comments_tmpl($defaults) {
	$defaults['title_reply'] = 'Make a Comment or Leave a Reply';
	$defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required" class="form-control"></textarea></p>';
	//$defaults['title_reply_to'] = 'Your text %s';
	return $defaults;
}
add_filter('comment_form_defaults', 'comments_tmpl');

if ( ! function_exists( 'custom_comments' ) ) :
// Template for comments and pingbacks.
function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard pull-left">
			<?php echo get_avatar( $comment, 40 ); ?>
		</div>
		<div class="comment-meta commentmetadata pull-left">
			<small><?php printf( __( '%s'), sprintf( '<span class="red">%s</span>  ', get_comment_author_link() ) ); ?><?php printf( __( '%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></small>
			<div class="comment-body">
			<i class="blue"><?php if ( $comment->comment_approved == '0' ) : ?>
				<small><?php _e( 'Your comment has been submitted and will be reviewed for approval shortly.'); ?></small>
			<?php endif; ?></i>
			<?php comment_text(); ?>
			</div>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="reply clear">
			<small><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></small>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<small><?php _e( 'Pingback:'); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)'), ' ' ); ?></small>
	<?php
			break;
	endswitch;
}
endif;
?>