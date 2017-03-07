<?php 
// Buttons
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
	), $atts));
	ob_start(); 
?>			
    <a href="<?php echo esc_url($btnlink); ?>" class="btn btn-default"><?php echo htmlspecialchars_decode($btntext); ?></a>
<?php 
	return ob_get_clean();
}
// Buttons
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("TV Button", $trivision_theme_name),
   "base" => "button",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-tv",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button Text", $trivision_theme_name),
         "param_name" => "btntext",
         "value" => "",
         "description" => __("Button Text", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button Link", $trivision_theme_name),
         "param_name" => "btnlink",
         "value" => '',
         "description" => __("Button Link", $trivision_theme_name)
      ),

    )));
}

// Grid Builder Shortcodes

add_filter( 'vc_grid_item_shortcodes', 'my_module_add_grid_shortcodes' );
function my_module_add_grid_shortcodes( $shortcodes ) {
   $shortcodes['vc_post_content'] = array(
     'name' => __( 'Post Content', $trivision_theme_name ),
     'base' => 'vc_post_content',
     'category' => __( 'Content', $trivision_theme_name ),
     'description' => __( 'Show current post content', $trivision_theme_name ),
     'post_type' => Vc_Grid_Item_Editor::postType(),
  );
 
 
   return $shortcodes;
}
 
// output function
add_shortcode( 'vc_post_content', 'vc_post_content_render' );
function vc_post_content_render() {
	$vc_post_content_filtered = apply_filters('the_content','{{ post_data:post_content }}');
	return '<h2>{{ post_data:post_content }}</h2>'; // usage of template variable post_data with argument "ID"
}

 ?>