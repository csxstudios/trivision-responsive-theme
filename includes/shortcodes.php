<?php 
// Portfolio Gallery - Landing Page
add_shortcode('folio_gallery', 'folio_gallery_func');
function folio_gallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?> 

	    <div id="our-work" class="gallery zoom-gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }else{} ?>">
	        <?php 
	          $args = array(   
	            'post_type' => 'portfolio',
	            'order' => 'ASC',
	            'posts_per_page' => $num1,
	          );  
	          $wp_query = new WP_Query($args);
	          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
	          $cates = get_the_terms(get_the_ID(),'categories');
	          $cate_slug = '';
	              foreach((array)$cates as $cate){
	              if(count($cates)>0){	                
	                $cate_slug .= $cate->slug .' ';     
	              } 
	          }
	          $format = get_post_format($post->ID);	
	          $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
			  $workthumb = get_post_meta(get_the_ID(), 'wpcf-portfolio-thumbnail', true);
	        ?><div class="item <?php echo esc_attr($cate_slug); ?>">
	<div class="picframe">
		<a class="<?php if($format=='video'){echo 'popup-youtube';}else{echo 'image-popup-gallery';} ?>" title="<?php the_title(); ?>" href="<?php echo get_page_link(); ?>">
			<span class="overlay">
				<span class="pf_text">
					<span class="project-name"><?php the_title(); ?></span>
					<span class="project-subtitle"><!-- carousel --><?php echo do_shortcode('[types field="portfolio-subtitle"][/types]'); ?><!-- /carousel --></span>
				</span>
			</span>
		</a>
		<img src="<?php if($workthumb) {echo $workthumb;} else {echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));}?>" alt="">
	</div>
</div><?php endwhile; wp_reset_postdata(); ?>
        </div>
<?php
    return ob_get_clean();
}

// Portfolio Gallery - Landing Page
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("Portfolio Gallery", $trivision_theme_name),
   "base"      => "folio_gallery",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Show All Portfolio", $trivision_theme_name),
         "param_name"=> "all",
         "value"     => "",
         "description" => __("Text Filter Show All Portfolio.", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number portfolio per page", $trivision_theme_name ),
         "param_name" => "num",
         "value" => 8,
         "description" => __("Enter Number Portfolio.", $trivision_theme_name )
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Select Columns.", $trivision_theme_name),
         "param_name" => "columns",
         "value" => array(   
                     __('Columns 4', $trivision_theme_name) => 4,
                     __('Columns 3', $trivision_theme_name) => 3,
                     __('Columns 2', $trivision_theme_name) => 2,
                    ),
         "description" => __("Select number columns for show.", $trivision_theme_name)
      ),
    )));
}

// Team Modals - Lightboxes
add_shortcode('team_modals', 'team_modals_func');
function team_modals_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);
	$column_math = 12 / $columns;

	ob_start(); ?> 

	    <section id="our-team" class="text-center <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }else{ echo 'team_4_cols';} ?>">
		<?php 
		$args = array(
		'post_type' => 'bio',
		'posts_per_page' => $num1,
		'order' => ASC,
		);  
		$team_query = new WP_Query($args);
		while ($team_query -> have_posts()) : $team_query -> the_post(); 
		$cates = get_the_terms(get_the_ID(),'categories');
		$cate_slug = '';
		  foreach((array)$cates as $cate){
		  if(count($cates)>0){	                
			$cate_slug .= $cate->slug .' ';     
		  } 
		}
		$format = get_post_format($post->ID);	
		$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
		$workthumb = get_post_meta(get_the_ID(), 'wpcf-portfolio-thumbnail', true);
		$link = get_page_link();
		?>
			<div class="col-md-<?php echo $column_math; ?>">
			<div class="bio-pic"><a href="#" data-toggle="modal" data-target="#bio-<?php echo get_the_ID(); ?>"><img class="img-responsive" src="<?php if($workthumb) {echo $workthumb;} else {echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));}?>" alt="<?php the_title(); ?>"></a></div>
			<div class="bio-link">
			<p><strong><?php the_title(); ?></strong><br/><?php echo get_the_excerpt(); ?></p>
			<a href="#" data-toggle="modal" class="btn-outline" data-target="#bio-<?php echo get_the_ID(); ?>">BIO</a></div>
			</div>
		<?php endwhile;?>
        </section>
		<section class="bio-modals">
		<?php
		while ($team_query -> have_posts()) : $team_query -> the_post(); 
		?>
		<div id="bio-<?php echo get_the_ID(); ?>" class="modal fade bios" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content text-left">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal"><img class="svg" src="<?php bloginfo('template_directory');?>/images/icon-close.svg" alt="close" /></button>
				</div>
				<div class="modal-body">
					<div class="row">
					<div class="col-md-2 col-md-offset-1"><img class="img-responsive" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt="<?php the_title(); ?>" /></div>
					<div class="col-md-8">
					<h1><?php the_title(); ?></h1>
					<p class="strong"><?php echo get_the_excerpt(); ?></p>
					<?php the_content(); ?>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
		</section>
<?php
    return ob_get_clean();
}

// Team Modals - Lightboxes
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("Team Modals", $trivision_theme_name),
   "base"      => "team_modals",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Show All Members", $trivision_theme_name),
         "param_name"=> "all",
         "value"     => "",
         "description" => __("Text Filter Show All Members.", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of members per page", $trivision_theme_name ),
         "param_name" => "num",
         "value" => 8,
         "description" => __("Enter Number of Members.", $trivision_theme_name )
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Select Columns.", $trivision_theme_name),
         "param_name" => "columns",
         "value" => array(   
                     __('Columns 4', $trivision_theme_name) => 4,
                     __('Columns 3', $trivision_theme_name) => 3,
                     __('Columns 2', $trivision_theme_name) => 2,
                    ),
         "description" => __("Select number columns for show.", $trivision_theme_name)
      ),
    )));
}

// Posts by Year
add_shortcode('postsby_year', 'postsby_year_func');
function postsby_year_func($atts, $content = null){
	extract(shortcode_atts(array(
		'cat'		=> 	'',
		'num'		=> 	'',
		'display'   => 	'',
	), $atts));

	//$all1 = (!empty($all) ? $all : '-1');
	//$num1 = (!empty($num) ? $num : 8);
	//$column_math = 12 / $columns;
	//$cat = 'in-the-news';
	$counter = 0;

	ob_start(); ?> 

	    <section id="postsbyyear">

		<?php 
		$args = array(
		'category_name' => $cat,
		'order' => 'DESC',
		'nopaging' => '1',
		);  
		$yearly_query = new WP_Query($args);
		while ($yearly_query -> have_posts()) : $yearly_query -> the_post();
		$counter++;
		$link = get_page_link();
		$this_year = get_the_date('Y');
		if ($prev_year != $this_year) {
		  // Year boundary
		  if (!is_null($prev_year)) {
			 // A list is already open, close it first
			 echo '</div><hr/>';
		  }
		  echo '<h2 class="strong">' . $this_year . '</h2>';
		  echo '<div>';
		}
		echo '<p>';
		echo '<a rel="' .get_permalink(). '" href="' .get_permalink(). ' ">';
		the_title();
		echo '</a>';
		echo '</p>';
		$prev_year = $this_year;
		?>
		<?php endwhile; wp_reset_postdata(); echo '</div>';?>

		</section>
<?php
    return ob_get_clean();
}

// Posts by Year Settings
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("Posts by Year", $trivision_theme_name),
   "base"      => "postsby_year",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Categories", $trivision_theme_name),
         "param_name"=> "cat",
         "value"     => "",
         "description" => __("Category slugs, separated by commas.", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of Posts", $trivision_theme_name ),
         "param_name" => "num",
         "value" => "",
         "description" => __("Leave blank to show all posts.", $trivision_theme_name )
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Select Columns.", $trivision_theme_name),
         "param_name" => "display",
         "value" => array(   
                     __('List', $trivision_theme_name) => 'list',
                     __('Columns 4', $trivision_theme_name) => 4,
                     __('Columns 3', $trivision_theme_name) => 3,
                     __('Columns 2', $trivision_theme_name) => 2,
                    ),
         "description" => __("Select number columns for show.", $trivision_theme_name)
      ),
    )));
}

// Bootstrap Responsive Timeline
add_shortcode('timeline_responsive', 'timeline_responsive_func');
function timeline_responsive_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
	), $atts));

	$all1 = (!empty($all) ? $all : '-1');
	$num1 = (!empty($num) ? $num : 8);
	$column_math = 12 / $columns;
	$counter = 0;

	ob_start(); ?> 

	    <section id="timeline">
		<ul class="timeline">
		<?php 
		$args = array(
		'post_type' => 'timeline-event',
		'posts_per_page' => $num1,
		'order' => ASC,
		);  
		$timeline_query = new WP_Query($args);
		while ($timeline_query -> have_posts()) : $timeline_query -> the_post();
		$counter++;
		$link = get_page_link();
		?>
		<li class="event-<?php echo get_the_ID(); ?><?php if($counter % 2 == 0) {echo " timeline-inverted";} ?>">
          <div class="timeline-badge"><i class="fa fa-star"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><?php the_title(); ?></h4>
            </div>
            <div class="timeline-body">
              <?php the_content(); ?>
            </div>
          </div>
        </li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		</section>
<?php
    return ob_get_clean();
}

// Bootstrap Responsive Timeline Settings
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("Timeline", $trivision_theme_name),
   "base"      => "timeline_responsive",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Categories", $trivision_theme_name),
         "param_name"=> "",
         "value"     => "",
         "description" => __("Leave blank to show all posts.", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of Posts", $trivision_theme_name ),
         "param_name" => "num",
         "value" => "",
         "description" => __("Leave blank to show all posts.", $trivision_theme_name )
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Select Columns.", $trivision_theme_name),
         "param_name" => "columns",
         "value" => array(   
                     __('Columns 4', $trivision_theme_name) => 4,
                     __('Columns 3', $trivision_theme_name) => 3,
                     __('Columns 2', $trivision_theme_name) => 2,
                    ),
         "description" => __("Select number columns for show.", $trivision_theme_name)
      ),
    )));
}

// Custom Loop
add_shortcode('custom_loop', 'custom_loop_func');
function custom_loop_func($atts, $content = null){
	extract(shortcode_atts(array(
		'type'		=> 	'',
		'cat'		=> 	'',
		'num'		=> 	'',
		'customclass'		=> 	'',
		'columns'   => 	'',
		'sort'   => 	'',
		'metasort'   => 	'',
		'display'   => 	'',
		'excerptshow'   => 	'',
		'excerptl'   => 	'',
		'imgmore'   => 	'',
		'wpcftext'   => 	'',
		'custlayout'   => 	'',
	), $atts));

	$posttype = (!empty($type) ? $type : '');
	$postcat = (!empty($cat) ? $cat : '');
	$maxposts = (!empty($num) ? $num : '-1');
	$postdisplay = (!empty($display) ? $display : 'li');
	$modallayout = (!empty($custlayout) ? $custlayout : '218');
	$column_math = 12 / $columns;
	if ($imgmore) {$readmore = wp_get_attachment_image_src($imgmore, "large");}
	if ($imgmore) {$readmoreimg = $readmore[0];}
	if ($excerptshow == '' || $excerptshow == 1) {$excerpton = 1;}
	if ($columns == 5) {$column_math= 15;}

	ob_start(); ?>		
	    <section class="custom-loop flex-top wpb_row text-center">		
		<?php 
		if ($postdisplay == "carousel") {			
			$output = '<div class="carousel-controls text-right">';
			$output.= '<a class="carousel-left" href="#myCarousel" role="button" data-slide="prev">';
			$output.= '<span class="fa fa-angle-left" aria-hidden="true"></span>';
			$output.= '<span class="sr-only">Previous</span>';
			$output.= '</a>';
			$output.= '<a class="carousel-right" href="#myCarousel" role="button" data-slide="next">';
			$output.= '<span class="fa fa-angle-right" aria-hidden="true"></span>';
			$output.= '<span class="sr-only">Next</span>';
			$output.= '</a>';
			$output.= '</div>';
			$output.= '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
			$output.= '<div class="carousel-inner" role="listbox">';
			$output.= '<div class="item active">';
			$output.= '<div class="row">';
			echo $output;
		}
		if ($maxposts < 0) {
			$args2 = array(
			'post_type' => $posttype,
			'category_name' => $postcat,
			'posts_per_page' => $maxposts,
			//'orderby' => 'meta_value',
			//'meta_key' => 'wpcf-speaker-last-name',
			'order' => $sort,
			//'meta_query'	=> array('relation'	=> 'AND', array('key' => 'wpcf-speaker-heirarchy', 'value' => 'keynote', 'compare' => '=',),),
			);
		} else {
			global $paged;
			$curpage = $paged ? $paged : 1;
			$args2 = array(
			'post_type' => $posttype,
			'category_name' => $postcat,
			'posts_per_page' => $maxposts,
			'order' => $sort,
			'paged' => $paged,
			);
		}
		$args3 = array(
		'post_type' => $posttype,
		'category_name' => $postcat,
		'posts_per_page' => $maxposts,
		'orderby' => 'meta_value',
		'meta_key' => $metasort,
		'order' => $sort,
		//'meta_query'	=> array('relation'	=> 'AND', array('key' => 'wpcf-speaker-heirarchy', 'value' => 'keynote', 'compare' => '=',),),
		);
		$counter = 0;
		if ($metasort) {$custom_query = new WP_Query($args3);} else {$custom_query = new WP_Query($args2);}
		$count = $custom_query->post_count;
		while ($custom_query -> have_posts()) : $custom_query -> the_post();
		$counter++;
		if ($counter % 3 == 0) {$row = 1;} else {$row = 0;}
		if ($counter == $count) {$row = 0;}
		//$format = get_post_format($post->ID);	
		//$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
		$hoverimg = get_post_meta(get_the_ID(), 'wpcf-hover-image', true);
		$custlink = get_post_meta(get_the_ID(), 'wpcf-custom-page-link', true);
		$postimg = esc_url(wp_get_attachment_url(get_post_thumbnail_id()));
		$custmeta = get_post_meta(get_the_ID(), $metasort, true);
		$custcolor = get_post_meta(get_the_ID(), 'wpcf-custom-color', true);
		//if(!$hoverimg) {$hoverimg = get_template_directory_uri().'/images/news-placeholder.jpg';}
		if(!$custlink) {$link = get_page_link();} else {$link = $custlink;}
		if($custcolor) {$custstyle = ' style="background-color:'.$custcolor.';"';}
		$pid = get_the_ID();
		if (!$postimg) {
			$attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
			if ( ! is_array($attachments) ) continue;
			//$count = count($attachments);
			$first_attachment = array_shift($attachments);
			$postimg = wp_get_attachment_image_src($first_attachment->ID, 'large');
			if ( ! is_array($postimg) ) continue;
			$postimg = $postimg[0];
		}
		if(!$postimg) {$postimg = get_template_directory_uri().'/images/news-placeholder.jpg';}
		if ($postdisplay == 'modals' || $postdisplay == 'cols' || $postdisplay == 'carousel' || $postdisplay =='magazine') { 
		?>
			<div class="loop-<?php echo get_the_ID(); ?> loop-post loop-post-<?php echo $counter; ?> col-sm-6 <?php if ($column_math==15) {echo 'col-lg-'.$column_math.' col-md-4';} else {echo 'col-md-'.$column_math;} if($customclass) {echo ' '.$customclass;} ?>">
			<?php if ($hoverimg) { ?>
			<div class="loop-pic wpb_single_image bg-cover" style="background-image:url('<?php echo $postimg;?>');"><figure><a href="<?php echo $link; ?>"><img src="<?php echo $hoverimg;?>" class="img-responsive" alt="<?php the_title(); ?>"></a></figure></div>
			<?php } if ($postdisplay == 'modals') { ?>
			<div class="loop-pic wpb_single_image img-scale"><figure><a href="#" data-toggle="modal" data-target="#modal-<?php echo get_the_ID(); ?>"><img src="<?php echo $postimg;?>" class="text-center" alt="<?php echo get_the_title(); ?>"></a></figure></div>
			<?php } if ($postdisplay == 'carousel' || $postdisplay == 'cols') { ?>
			<div class="loop-pic wpb_single_image img-scale"><figure><a href="<?php echo $link; ?>"><img src="<?php echo $postimg;?>" class="img-responsive" alt="<?php the_title(); ?>"></a></figure></div>
			<?php } ?>
			<div class="loop-link headline-font<?php if ($postdisplay == 'magazine') {echo ' col-magazine';}?>">
			<?php if ($postdisplay == 'modals') { ?>
			<h4 class="strong" style="color: #253a74!important;"><a href="#" data-toggle="modal" data-target="#modal-<?php echo get_the_ID(); ?>"><?php the_title(); ?><?php if ($wpcftext) { ?><br/><small style="line-height:1.4em;">Class of <?php echo get_post_meta(get_the_ID(), $wpcftext, true); ?></small><?php } ?></a></h4>
			<?php } elseif ($postdisplay == 'magazine') { ?>
			<div class="loop-pic" style="background-image:url(<?php echo $postimg;?>);background-size:cover;"><h2 class="strong"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2></div>
			<?php } else { ?>
			<h4 class="strong" style="margin-bottom:3px;"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
			<?php if ($postdisplay == 'carousel' || $postdisplay == 'cols') {
					//show custom field text
					if ($wpcftext) {echo '<p class="small">'.get_post_meta(get_the_ID(), $wpcftext, true).'</p>';} else {echo '<p class="small">'.get_the_date().'</p>';}
				} 
			?>
			<?php } ?>
			<div class="loop-text"<?php echo $custstyle; ?>>
			<?php if ($excerpton == 1) {
				if ($excerptl) {echo excerpt(15);} else {the_excerpt();} 
				if ($imgmore) {echo '<div class="img-readmore"><a href="'.$link.'"><img src="'.$readmoreimg.'" alt="Read More" /></a></div>';}
			}?>
			</div>
			</div>
			</div>
		<?php } else { ?>
			<div class="row text-left pad-30">
			<div class="col-md-2 pad-10">
			<div class="loop-pic wpb_single_image"><figure><a href="<?php echo $link; ?>"><img src="<?php echo $postimg;?>" class="img-responsive" alt="<?php the_title(); ?>"></a></figure></div>
			</div>
			<div class="col-md-8">
			<h4 class="strong"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
			<?php if ($excerpton == 1) {
				if ($excerptl) {echo excerpt($excerptl);} else {the_excerpt();}
			}?>
			</div>
			</div>
		<?php }
		if ($postdisplay == 'carousel' AND $row == 1) {echo '</div></div><div class="item"><div class="row">';}
		endwhile;
		
		if ($postdisplay == "carousel") {
			$output = '</div>';
			$output.= '</div>';
			$output.= '</div>';

			$output.= '</div>';
			echo $output;
		} ?>
		</section>
		<?php if ($maxposts > 0 AND $postdisplay != 'carousel') { echo '
		<div id="page-links" class="text-center">
			<a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
			<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
			for($i=1;$i<=$custom_query->max_num_pages;$i++)
				echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
			echo '
			<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $custom_query->max_num_pages ? $curpage+1 : $custom_query->max_num_pages)).'">&rsaquo;</a>
			<a class="last page button" href="'.get_pagenum_link($custom_query->max_num_pages).'">&raquo;</a>
		</div>
		'; }
		wp_reset_postdata();
		?>        
		<?php if ($postdisplay == 'modals') { ?>
		<section class="cust-modals">
		<?php
		while ($custom_query -> have_posts()) : $custom_query -> the_post();
		$postimg = esc_url(wp_get_attachment_url(get_post_thumbnail_id()));		
		?>
		<div id="modal-<?php echo get_the_ID(); ?>" class="modal fade bios" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content text-left">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal"><img class="svg" src="<?php bloginfo('template_directory');?>/images/icon-close.svg" alt="close" /></button>
				</div>
				<div class="modal-body">
				<div class="panel-body">				
					<?php if ($modallayout == "218") { ?>
						<?php if ($postimg) { ?>
						<div class="col-md-2 col-md-offset-1"><img class="img-responsive" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt="<?php the_title(); ?>" /></div>
						<?php $modalcol = '8'; } else {$modalcol = '10';} ?>
						<div class="col-md-<?php if ($modalcol == '10') {echo $modalcol.' col-md-offset-1';} else {echo $modalcol;}?>">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						</div>
					<?php } ?>
					<?php if ($modallayout == "bio") { ?>
						<?php if ($postimg) { ?>
						<div class="col-md-4">
						<img class="img-responsive" src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" alt="<?php the_title(); ?>" />
						<div class="bio-quick-facts pad-20"><?php if(types_render_field('bio-quick-facts', array('raw'=>'true'))){ echo types_render_field("bio-quick-facts", array( ));} ?></div>
						</div>
						<?php } ?>
						<div class="col-md-8">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
						</div>
					<?php } ?>
					<?php if ($modallayout == "full") { ?>
						<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
						<hr/>
						<?php the_content(); ?>
						</div>
					<?php } ?>
				</div>
				</div>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
		</section>
		<?php } ?>
<?php
    return ob_get_clean();
}

// Custom Loop VC
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("Custom Loop", $trivision_theme_name),
   'description' => __("TriVision custom looper", $trivision_theme_name),
   "base"      => "custom_loop",
   "class"     => "",
   "icon"      => "icon-st",
   "category"  => 'Structure',
   'wrapper_class' => 'clearfix',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "span",
         "class"     => "vc_admin_label",
         "heading"   => __("Post Type", $trivision_theme_name),
         "param_name"=> "type",
         "value"     => "",
         "description" => __("Use post type slug. Leave empty to show all types.", $trivision_theme_name)
      ),
      array(
         "type"      => "textfield",
         "holder"    => "span",
         "class"     => "vc_admin_label",
         "heading"   => __("Post Category", $trivision_theme_name),
         "param_name"=> "cat",
         "value"     => "",
         "description" => __("Use post category slug. Leave empty to show all categories.", $trivision_theme_name)
      ),
      array(
         "type" => "textfield",
         "holder" => "",
         "class" => "",
         "heading" => __("Maximum Posts", $trivision_theme_name ),
         "param_name" => "num",
         "value" => "-1",
         "description" => __("Max. # of posts. Leave empty to show all posts.", $trivision_theme_name )
      ),
	  array(
         "type" => "textfield",
         "holder" => "",
         "class" => "",
         "heading" => __("CSS Class", $trivision_theme_name ),
         "param_name" => "customclass",
         "value" => "",
         "description" => __("CSS class name", $trivision_theme_name )
      ),
      array(
         "type" => "dropdown",
         "holder" => "",
         "class" => "",
         "heading" => __(" Columns.", $trivision_theme_name),
         "param_name" => "columns",
		 "admin_label"=>true,
         "value" => array(
                     __('Columns 3', $trivision_theme_name) => 3,
                     __('Columns 4', $trivision_theme_name) => 4,
                     __('Columns 2', $trivision_theme_name) => 2,
                     __('Columns 5', $trivision_theme_name) => 5,
                    ),
         "description" => __("Select # of columns to show.", $trivision_theme_name)
      ),
	  array(
         "type" => "dropdown",
         "holder" => "",
         "class" => "",
         "heading" => __("Sort Order", $trivision_theme_name),
         "param_name" => "sort",
		 "admin_label"=>true,
         "value" => array(   
                     __('DESC', $trivision_theme_name) => "DESC",
					 __('ASC', $trivision_theme_name) => "ASC",                     
                    ),
         "description" => __("Default is DESC.", $trivision_theme_name)
      ),
	  array(
         "type" => "textfield",
         "holder" => "",
         "class" => "",
         "heading" => __("Sort by Field (optional)", $trivision_theme_name ),
         "param_name" => "metasort",
         "value" => "",
         "description" => __("Sort by custom field slug (optional)", $trivision_theme_name )
      ),
	  array(
         "type" => "dropdown",
         "holder" => "",
         "class" => "",
         "heading" => __("Display", $trivision_theme_name),
         "param_name" => "display",
		 "admin_label"=>true,
         "value" => array(   
                     __('List', $trivision_theme_name) => "li",
					 __('Columns', $trivision_theme_name) => "cols",
					 __('Modals', $trivision_theme_name) => "modals",
					 __('Carousel', $trivision_theme_name) => "carousel",
					 __('Magazine Columns', $trivision_theme_name) => "magazine",
                    ),
         "description" => __("Layout display.", $trivision_theme_name)
      ),
	  array(
         "type" => "dropdown",
         "holder" => "",
         "class" => "",
         "heading" => __("Show Excerpt", $trivision_theme_name),
         "param_name" => "excerptshow",
		 "admin_label"=>false,
         "value" => array(   
                     __('Yes', $trivision_theme_name) => 1,
					 __('No', $trivision_theme_name) => 0,
                    ),
         "description" => __("Show excerpt.", $trivision_theme_name)
      ),
	  array(
         "type" => "textfield",
         "holder" => "",
         "class" => "",
         "heading" => __("Custom Excerpt Length (optional)", $trivision_theme_name ),
         "param_name" => "excerptl",
         "value" => "",
         "description" => __("Excerpt length in words (optional)", $trivision_theme_name )
      ),
	  array(
         "type" => "attach_image",
         "holder" => "",
         "class" => "",
         "heading" => __("Read more image (optional)", $trivision_theme_name ),
         "param_name" => "imgmore",
		 "admin_label"=>true,
         "value" => "",
         "description" => __("Add a read more image (optional)", $trivision_theme_name )
      ),
	  array(
         "type" => "textfield",
         "holder" => "",
         "class" => "",
         "heading" => __("Custom Field Output (optional)", $trivision_theme_name ),
         "param_name" => "wpcftext",
         "value" => "",
         "description" => __("Text underneath title (optional)", $trivision_theme_name )
      ),
	  array(
         "type" => "dropdown",
         "holder" => "",
         "class" => "",
         "heading" => __("Custom Layout (optional)", $trivision_theme_name),
         "param_name" => "custlayout",
		 "admin_label"=>false,
         "value" => array(   
                     __('Col-2-Offset-1, Col-8', $trivision_theme_name) => "218",
					 __('Full', $trivision_theme_name) => "full",
					 __('Bio Pic with Custom Details', $trivision_theme_name) => "bio",
                    ),
         "description" => __("Custom layout (optional).", $trivision_theme_name)
      ),
    )));
}
?>
