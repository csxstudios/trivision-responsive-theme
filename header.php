<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>	
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<link rel="shortcut icon" href="<?php $favtest = get_theme_mod( 'logo_favicon' ); if ($favtest) {echo get_theme_mod( 'logo_favicon' );} else {echo bloginfo('template_directory').'/favicon.ico';}?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php wp_head(); ?>
	<?php if ( is_admin_bar_showing() ) { ?>
	<style id="admin-bar" type="text/css" media="screen">
	html {margin-top: 32px !important;}
	* html body {margin-top: 32px !important;}
	.navbar-fixed-top {top:initial!important;}
	@media screen and (max-width: 782px) {
		html { margin-top: 46px !important;}
		* html body {margin-top: 46px !important;}
	}
	</style>
	<?php } ?>
	<?php 
	//Theme Customizer
	$fonttest = get_theme_mod( 'font_setting' );
	if($fonttest) {$fontcss = preg_replace('/\s+/', '+', $fonttest);$fontfam = $fonttest;} else {$fontcss="Open+Sans";$fontfam = "Open Sans";}
	$titletest = get_theme_mod( 'title_align' );
	if($titletest) {$titlealign = $titletest;} else {$titlealign = "left";}
	$searchtest  = get_theme_mod( 'search_image' );
	if($searchtest) {$searchimg = $searchtest;} else {$searchimg = get_bloginfo('template_directory').'/images/heading-about.jpg';}
	$statustest  = get_theme_mod( 'text_status' );
	$statusbadgetest  = get_theme_mod( 'option_badge' );
	$statusslug  = get_theme_mod( 'text_status_slug' );
	if($statusbadgetest) {$statusbadge = $statusbadgetest;} else {$statusbadge = "0";}
	
	//Accent Colors
	$accenttest = get_theme_mod( 'color_accent' );
	$footertest = get_theme_mod( 'color_footer' );
	$copyrighttest = get_theme_mod( 'color_copyright' );
	$watermarktest = get_theme_mod( 'logo_footer' );
	$menutest  = get_theme_mod( 'color_menu' );
	if(!$menutest) {$menutest = "#000000";}
	$menutest = hex2rgb($menutest);
	$menubg = implode(", ", $menutest);
	$preloadertest  = get_theme_mod( 'color_preloader' );
	$opacitytest1  = get_theme_mod( 'text_opacity1' );
	$opacitytest2  = get_theme_mod( 'text_opacity2' );
	$linktest  = get_theme_mod( 'color_links' );
	$headertest  = get_theme_mod( 'header_position' );
	$symboltest  = get_theme_mod( 'symbol_setting' );
	$inverttest  = get_theme_mod( 'invert_setting' );
	
	if($footertest) {$footerbg = $footertest;} else {$footerbg = "#2e2e2e";}
	if($symboltest) {$symbol = $symboltest;} else {$symbol = "circle";}
	if($copyrighttest) {$copyrightbg = $copyrighttest;} else {$copyrightbg = "#262626";}
	if($preloadertest) {$preloaderbg = $preloadertest;} else {$preloaderbg = "#000000";}
	if($opacitytest1) {$opacityval1 = $opacitytest1;} else {$opacityval1 = "0";}
	if($opacitytest2) {$opacityval2 = $opacitytest2;} else {$opacityval2 = "0.9";}
	if (!$accenttest) {$accenttest = "#FAB702";}
	if ($headertest == 'above') {$headerpos = "158px";} else {$headerpos = "0px";}
	$menudropdowntest = hex2rgb($copyrightbg);
	$menudropdownbg = implode(", ", $menudropdowntest);
	$menudropdownhovertest = hex2rgb($accenttest);
	$menudropdownhoverbg = implode(", ", $menudropdownhovertest);
	?>
	<style id="customizer" type="text/css">
	@import url('https://fonts.googleapis.com/css?family=<?php echo $fontcss; ?>:300,400,600,700,800');
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800');
	html, body {color:#7b7c7c;font-family: '<?php echo $fontfam; ?>', sans-serif;}
	#sidr {display:none;}
	.sidr.left {display:block!important;}
	.headline-font h3, #body h3, #body-home h3, #body-home h4, #body h4, .sidr, #cta-contact h3, .modal h3  {font-family: 'Montserrat',Arial, Helvetica, sans-serif;text-transform:uppercase;}
	#footer h2:before, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, #primary-nav .current-menu-item .dropdown-menu > a {background-color:rgba(<?php echo $menudropdownhoverbg; ?>, .8)!important;}
	#main-header svg:hover .st99 {fill:<?php echo $accenttest; ?>;}
	#body a:hover, #body-home a:hover, .sidr .current-menu-item > a, figure:hover figcaption {color:<?php echo $accenttest; ?>;}
	#main-header .nav > li > a:hover, #main-header .nav > li > a:focus, #scroll-header .nav > li > a:hover, #scroll-header .nav > li > a:focus, ul.social-list li a:hover, ul.social-list li a:hover i, #main-header .nav > li > a:after, .breadcrumb a,	#top-menu .nav > li > a:hover, #main-header .nav > li > a:focus, #footer a:hover, #footer-bottom a:hover, .accent, .covers-3d .wpb_wrapper:hover .wpb_text_column a, .sidr ul li:hover>a, #footer a:hover, .current-menu-parent > a, #primary-nav .current-menu-item.dropdown > a, .dropdown-menu .current-menu-item a {color:<?php echo $accenttest; ?>!important;}
	#footer {<?php if($watermarktest){ echo 'background:'.$footerbg.' url('.$watermarktest.') no-repeat right bottom;';} else {echo 'background-color:'.$footerbg.';';} ?>}
	.img-scale figure:hover, .date-box {background-color: rgba(<?php echo $menudropdownbg; ?>, 0.1)!important;}
	.dropdown-menu {background-color: rgba(<?php echo $menudropdownbg; ?>, <?php echo $opacityval2; ?>)!important;}	
	#footer-bottom {background-color: rgba(<?php echo $menudropdownbg; ?>, 1)!important;}	
	#header {background-color: rgba(<?php if ($headertest == 'above') { echo '255,255,255,.85';} else {echo $menudropdownbg.', '.$opacityval2;} ?>);}
	.header-scroll {background-color: rgba(<?php echo $menubg; ?>, <?php echo $opacityval2; ?>)!important;}	
	#body-home, #body-page {padding-top:<?php echo $headerpos; ?>;}
	#preloader {background-color:<?php echo $preloaderbg; ?>;}
	.sidr{background-color:<?php echo $copyrightbg; ?>;}
	#main-header .nav > li > a:after {content: '<?php
	switch ($symbol) {
    case "circle":
        echo "\\f111";
        break;
    case "star":
        echo "\\f005";
        break;
    case "angle-right":
        echo "\\f054";
        break;
	case "play-triangle":
        echo "\\f04b";
        break;
	case "none":
        echo "";
        break;
    default:
       echo "\\f111";
	}
	?>';}
	<?php if ($headertest == 'above') { echo '#top-menu {border-bottom: solid 1px rgba(0,0,0,.1)!important;}';} ?>
	<?php if ($inverttest == 'knockout') { echo '.header-scroll svg g * {fill: #fff!important;}';} ?>
	<?php if ($linktest) { echo '#body a, #body-home a, #footer a, #simple-menu i, #top-menu ul.social-list li a, #top-menu ul.social-list li i, .navbar-default .navbar-nav > li > a, .nav > li > a {color:'.$linktest.';}';} 
	if ($linktest && $linktest!='#ffffff') { echo 'h1, h2, h3 {color:'.$linktest.';}';} 
	?>
	.btn-outline:hover {background-color: <?php echo $accenttest; ?>;color: #fff!important;border-color: <?php echo $accenttest; ?>;}
	.btn-outline {color: <?php echo $accenttest; ?>!important;background-color: rgba(255, 255, 255, 0);border-color: <?php echo $accenttest; ?>;}
	<?php if ($footerdark) { ?>
	#footer h3 {color: #fff;}
	<?php } ?>
	</style>
	</head>
	<body>
	<?php
	$preloadertest = get_theme_mod( 'option_preloader' );
	if (is_front_page() AND $preloadertest==1)
	{?>	
	<div id="preloader">
		<div class="logo-animated"></div>
	</div>	
	<?php } ?>	
	<div id="wrapper">	
		<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => $trivision_theme_name,
				'depth'             => 0,
				'container'         => 'div',
				'container_id'      => 'sidr',
				'menu_class'        => 'sidr-menu',
				'fallback_cb'       => 'wp_page_menu',
				'walker'            => '')
			);
		?>
		<div id="page">
			<div id="header" class="navbar-fixed-top">
				<div id="top-menu">
				<div class="container">
					<div class="pull-left"></div>
					<div class="pull-right">
					<ul class="social-list">
						<li><a href="<?php bloginfo('url');?>"><i class="fa fa-home fa-lg"></i></a></li>
						<?php 
						if ($statusslug) {
						// Status Query
						$args = array(
							'post_type'              => $statusslug,
							'nopaging'               => true,
							'order'                  => 'ASC',
							'orderby'                => 'date',
						);
						$args2 = array(
							'post_type'              => $statusslug,
							'nopaging'               => true,
							'order'                  => 'ASC',
							'orderby'                => 'date',
							'meta_query'	=> array(
												'relation'		=> 'AND',
												array(
													'key'	  	=> 'wpcf-status-level',
													'value'	  	=> '1',
													'compare' 	=> '=',
												),),
						);

						// The Query
						$query = new WP_Query( $args );
						$query2 = new WP_Query( $args2 );
						$count = $query->post_count;
						$countalert = $query2->post_count;
						if($countalert==0) {$badgecount = $count;$badgeclass="";} else {$badgecount = $countalert;$badgeclass=" badge-alert";}
						}
						
						if($statustest) {
							$statustitle = '<li><a href="#" data-toggle="modal" data-target="#status">'.$statustest;
							//$statustitle.=' <span class="badge">'.$count.'</span>';
							if ($badgetest == 1) {$statustitle.=' <span class="badge'.$badgeclass.'">'.$badgecount.'</span>';}
							if ($countalert > 0) {$statustitle.=' <span class="badge'.$badgeclass.'">'.$badgecount.'</span>';}
							$statustitle.= '</a></li>';
							echo $statustitle;
						}
							wp_nav_menu( array(
								'menu'              => 'topnav',
								'theme_location'    => $trivision_theme_name,
								'depth'             => 0,
								'container'         => '',
								'items_wrap' => '%3$s',
								'fallback_cb'       => false,
								'walker'            => '')
							);
						?>
						<li class="hidden-sm hidden-xs"><a href="#" data-toggle="modal" data-target="#search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
						<?php 
						$social_array = array('facebook', 'twitter', 'youtube', 'yelp', 'google', 'pinterest', 'instagram', 'linkedin', 'envelope');
						foreach ($social_array as $social) {
							$social_acct = 'text_'.$social;
							$social_link = get_theme_mod( $social_acct );
							$social_target = '_blank';
							if ($social == 'envelope') {$social_link = 'mailto:'.get_theme_mod( $social_acct );$social_target = '_self';}
							if ($social_link) {echo '<li class="hidden-sm hidden-xs"><a target="'.$social_target.'" href="'.$social_link.'"><i class="fa fa-'.$social.' fa-lg"></i></a></li>';}
							$social_test .= $social_link;
						}
						$social_link = get_theme_mod( 'text_phone' );
						//if ($social_link) {echo '<li class="cta cta-alert"><a href="tel:'.$social_link.'"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></a> '.$social_link.'</li>';}
						if (!$social_test) { ?>
						<li class="hidden-sm"><a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook fa-lg"></i></a></li>
						<li class="hidden-sm"><a target="_blank" href="https://www.pinterest.com/"><i class="fa fa-pinterest fa-lg"></i></a></li>
						<li class="hidden-sm"><a target="_blank" href="https://www.instagram.com/"><i class="fa fa-instagram fa-lg"></i></a></li>
						<?php } ?>
					</ul>
					<div class="modal fade in" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h2 class="modal-title text-center" id="myModalLabel">Search</h2>
						  </div>
						  <div class="modal-body">
							<div class="search">
							<form method="get" id="searchform" action="<?php bloginfo('url');?>">
								<input type="text" name="s" id="s" placeholder="" class="searchBox" value="">
								<input type="submit" name="" value="" class="btnSubmit" title="Begin Search">
							</form>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<?php if ($statusslug) { ?>
					<div class="modal fade in" id="status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h1 class="modal-title text-center strong" id="myModalLabel">School Status</h1>
						  </div>
						  <div class="modal-body">
							<?php 
							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
							?>
							<h3><?php echo get_the_title(); ?>: </h3><?php the_content(); ?>
							<?php 
								}
							}
							// Restore original Post Data
							wp_reset_postdata();
							?>
						  </div>
						</div>
					  </div>
					</div>
					<?php } //end status modal ?>
					</div>
				<div class="clear"></div>
				</div>
				</div>
				<div id="main-header">
					<div class="container">
						<?php //echo get_theme_mod( 'logo_main' ); ?>
						<div class="pull-left"><a href="<?php bloginfo('url');?>"><img src="<?php $logotest = get_theme_mod( 'logo_main' ); if ($logotest) { echo $logotest; } else { echo bloginfo('template_directory').'/images/logo-tagline.svg'; } ?>" class="svg-logo<?php if ($inverttest == 'knockout') { echo ' svg';} ?>" /></a>
						<?php if (get_theme_mod( 'text_phone' )) {?>
						<div class="sticky-tel hidden-lg hidden-md hidden-sm hidden-xs">
						<a href="tel:+17037133332"><h3><?php echo get_theme_mod( 'text_phone' ); ?></h3></a>
						</div>
						<?php } ?>
						</div>
						<?php
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => $trivision_theme_name,
								'depth'             => 0,
								'container'         => 'div',
								'container_class'   => 'collapse navbar-collapse pull-right',
								'container_id'      => 'primary-nav',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);
						?>						
						<div class="pull-right hidden-lg">
							<a id="simple-menu" href="#sidr">
							<i class="fa fa-bars fa-2x"></i>
							</a>
						</div>
						<?php if (get_theme_mod( 'text_phone' )) {?>
						<div class="pull-right sticky-tel hidden-lg hidden-xs" style="padding:27px 0;">
						<a href="tel:+17037133332"><h3><?php echo get_theme_mod( 'text_phone' ); ?></h3></a>
						</div>
						<?php } ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php
			$subpage = (is_front_page() || is_single() || is_search() ? -1 : 1);
			$posttest = get_post_type();
			if($posttest == 'sector' || $posttest == 'service') {$subpage = $subpage + 2;}
			if ($subpage > 0){				
				$this_type = $post->post_type;
				$parent = array_reverse(get_post_ancestors($post->ID));
				$first_parent = get_page($parent[0]);
				$parent_image = wp_get_attachment_url(get_post_thumbnail_id($first_parent->ID));
				if ($parent_image == '') {$parent_image = get_bloginfo('template_directory').'/images/subheader-placeholder.jpg';}
				if ($this_type == 'post') {$banner = 'post';} else {$banner = 'page';}
				if (is_404()) {$banner = 'search';}
				if(get_the_post_thumbnail()){					
					$bannerimg = wp_get_attachment_url(get_post_thumbnail_id()); 
				}
				if (is_search()) {$bannerimg = get_bloginfo('template_directory').'/images/12.jpg';}
				else {
					switch ($banner) {
					case "post" :
						$bannerimg = get_bloginfo('template_directory').'/images/heading-about.jpg';
					break;
					case "page" :
						if(!$bannerimg) {$bannerimg = $parent_image;}
					break;
					case "search" :
						$bannerimg = get_bloginfo('template_directory').'/images/search-placeholder.jpg';
					break;
					default :
					$bannerimg = get_bloginfo('template_directory').'/images/12.jpg';
					}
				}
				?>
				<section id="body-page">
				<div id="page-heading" class="heading-transparent text-center pt-<?php echo $this_type; ?>" style="background-image:url(<?php echo $bannerimg; ?>)">
				<div class="header-bg"></div>
					<div class="container">
					<div id="page-heading-<?php echo $titlealign; ?>">
						<h1 id="page-title"><?php if(is_home()) { echo 'Blog'; } elseif(is_404()) {echo 'Page Not Found';} else {echo the_title();} ?></h1>
					</div>
					<?php if ($titlealign == 'left') { ?>
					<div id="breadcrumb">
						<?php echo the_breadcrumb(); ?>
						<?php //echo $first_parent->ID; ?>
					</div>
					<?php } ?>
					<div class="clear"></div>
					</div>
				</div>
				<div class="wpb_wrapper wow fadeIn"><div class="cut2 cut-blue"></div><div class="cut2 cut-green"></div></div>
				<?php } 
				if (is_search()) { 								
				?>
				<section id="body-page">
				<div id="page-heading" class="heading-transparent text-center" style="background-image:url(<?php echo $searchimg; ?>)">
				<div class="header-bg"></div>
					<div class="container">
					<div id="page-heading-<?php echo $titlealign; ?>">
						<h1 id="page-title"><?php printf( __( 'Search results for: %s', 'TriVisionTheme' ), get_search_query() ); ?></h1>
					</div>
					<?php if ($titlealign == 'left') { ?>
					<div id="breadcrumb">
						<?php echo the_breadcrumb(); ?>
						<?php //echo $first_parent->ID; ?>
					</div>
					<?php } ?>
					<div class="clear"></div>
					</div>
				</div>
				<?php } 
				if (is_single() && $subpage <= 0) { 
				if(get_the_post_thumbnail()){					
					$bannerimg = wp_get_attachment_url(get_post_thumbnail_id()); 
				}
				switch ($posttest) {
					case "post" :
						$category = get_the_category(); 
						$posttitle = $category[0]->cat_name;
					break;
					case "event" :
						$posttitle = "Event";
					break;
					default :
					if($posttest=='page') {$posttitle='Events';}
				}
				?>
				<section id="body-page" class="post-<?php echo $posttest; ?>">
				<?php if ($posttest == "bio") { ?>
				<div class="wpb_wrapper wow fadeIn animated animated" style="visibility: visible;"><div class="cut2 cut-blue"></div><div class="cut2 cut-green"></div></div>
				<?php } else { ?>
				<div id="page-heading" class="heading-transparent text-center" style="background-color:<?php echo $linktest; ?>;background-image:url(<?php echo $bannerimg; ?>);">
				<div class="header-bg"></div>
					<div class="container">
					<div id="page-heading-<?php echo $titlealign; ?>">
						<h1 id="page-title"><?php if ($posttitle) {echo $posttitle;} else {the_title();} ?></h1>
					</div>
					<?php if ($titlealign == 'left') { ?>
					<div id="breadcrumb">
						<?php echo the_breadcrumb(); ?>
						<?php //echo $first_parent->ID; ?>
					</div>
					<?php } ?>
					<div class="clear"></div>
					</div>
				</div>
				<?php } ?>
				<?php } ?>
			