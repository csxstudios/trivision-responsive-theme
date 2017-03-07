<?php 
/* 
 
Simple class to let themes add dependencies on plugins in ways they might find useful
 
Example usage:
 
    $test = new Theme_Plugin_Dependency( 'simple-facebook-connect', 'http://ottopress.com/wordpress-plugins/simple-facebook-connect/' );
    if ( $test->check_active() ) 
        echo 'SFC is installed and activated!';
    else if ( $test->check() ) 
        echo 'SFC is installed, but not activated. <a href="'.$test->activate_link().'">Click here to activate the plugin.</a>';
    else if ( $install_link = $test->install_link() )
        echo 'SFC is not installed. <a href="'.$install_link.'">Click here to install the plugin.</a>';
    else 
        echo 'SFC is not installed and could not be found in the Plugin Directory. Please install this plugin manually.';
 
*/
if (!class_exists('Theme_Plugin_Dependency')) {
    class Theme_Plugin_Dependency {
        // input information from the theme
        var $slug;
        var $uri;
 
        // installed plugins and uris of them
        private $plugins; // holds the list of plugins and their info
        private $uris; // holds just the URIs for quick and easy searching
 
        // both slug and PluginURI are required for checking things
        function __construct( $slug, $uri ) {
            $this->slug = $slug;
            $this->uri = $uri;
            if ( empty( $this->plugins ) ) 
                $this->plugins = get_plugins();
            if ( empty( $this->uris ) ) 
                $this->uris = wp_list_pluck($this->plugins, 'PluginURI');
        }
 
        // return true if installed, false if not
        function check() {
            return in_array($this->uri, $this->uris);
        }
 
        // return true if installed and activated, false if not
        function check_active() {
            $plugin_file = $this->get_plugin_file();
            if ($plugin_file) return is_plugin_active($plugin_file);
            return false;
        }
 
        // gives a link to activate the plugin
        function activate_link() {
            $plugin_file = $this->get_plugin_file();
            if ($plugin_file) return wp_nonce_url(self_admin_url('plugins.php?action=activate&plugin='.$plugin_file), 'activate-plugin_'.$plugin_file);
            return false;
        }
 
        // return a nonced installation link for the plugin. checks wordpress.org to make sure it's there first.
        function install_link() {
            include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
 
            $info = plugins_api('plugin_information', array('slug' => $this->slug ));
 
            if ( is_wp_error( $info ) ) 
                return false; // plugin not available from wordpress.org
 
            return wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=' . $this->slug), 'install-plugin_' . $this->slug);
        }
 
        // return array key of plugin if installed, false if not, private because this isn't needed for themes, generally
        private function get_plugin_file() {
            return array_search($this->uri, $this->uris);
        }
    }
}

$tplugins = array ( 
	array (
	"slug" => "contact-form-7",
	"uri" => "https://wordpress.org/plugins/contact-form-7/",
	"title" => "Contact Form 7"
	),
	array (
	"slug" => "contact-form-7-to-database-extension",
	"uri" => "https://wordpress.org/plugins/contact-form-7-to-database-extension/",
	"title" => "Contact Form DB"
	),
	array (
	"slug" => "types",
	"uri" => "https://wordpress.org/plugins/types/",
	"title" => "Types"
	),
	array (
	"slug" => "scalable-vector-graphics-svg",
	"uri" => "https://wordpress.org/plugins/scalable-vector-graphics-svg/",
	"title" => "Scalable Vector Graphics (SVG)"
	),
	array (
	"slug" => "wordfence",
	"uri" => "https://wordpress.org/plugins/wordfence/",
	"title" => "Wordfence Security"
	),
	array (
	"slug" => "simple-history",
	"uri" => "https://wordpress.org/plugins/simple-history/",
	"title" => "Simple History"
	),
	array (
	"slug" => "ewww-image-optimizer",
	"uri" => "https://wordpress.org/plugins/ewww-image-optimizer/",
	"title" => "EWWW Image Optimizer"
	),
	array (
	"slug" => "duplicator",
	"uri" => "https://wordpress.org/plugins/duplicator/",
	"title" => "Duplicator"
	),
	array (
	"slug" => "enable-media-replace",
	"uri" => "https://wordpress.org/plugins/enable-media-replace/",
	"title" => "Enable Media Replace"
	),
	array (
	"slug" => "wp-google-maps",
	"uri" => "https://wordpress.org/plugins/wp-google-maps/",
	"title" => "WP Google Maps"
	),
	array (
	"slug" => "google-analytics-dashboard-for-wp",
	"uri" => "https://wordpress.org/plugins/google-analytics-dashboard-for-wp/",
	"title" => "Google Analytics Dashboard for WP"
	),
	array (
	"slug" => "wp-video-lightbox",
	"uri" => "https://wordpress.org/plugins/wp-video-lightbox/",
	"title" => "WP Video Lightbox"
	),
	array (
	"slug" => "black-studio-tinymce-widget",
	"uri" => "https://wordpress.org/plugins/black-studio-tinymce-widget/",
	"title" => "TinyMCE Widget"
	),
	array (
	"slug" => "advanced-responsive-video-embedder",
	"uri" => "https://wordpress.org/plugins/advanced-responsive-video-embedder/",
	"title" => "Advanced Responsive Video Embedder"
	),
	array (
	"slug" => "password-protect-wordpress",
	"uri" => "https://wordpress.org/plugins/password-protect-wordpress/",
	"title" => "Private Blog"
	)
);
foreach ($tplugins as $tplugin) {
    $t_slug = $tplugin['slug'];
    $t_uri = $tplugin['uri'];
    $t_title = $tplugin['title'];
	
	$test = new Theme_Plugin_Dependency( $t_slug, $t_uri );
    if ( $test->check_active() ) 
        echo $t_title.' is installed and activated!';
    else if ( $test->check() ) 
        echo  $t_title.' is installed, but not activated. <a href="'.$test->activate_link().'">Click here to activate the plugin.</a>';
    else if ( $install_link = $test->install_link() )
        echo  $t_title.' is not installed. <a href="'.$install_link.'">Click here to install the plugin.</a>';
    else 
        echo  $t_title.' is not installed and could not be found in the Plugin Directory. Please install this plugin manually.';
}
?>