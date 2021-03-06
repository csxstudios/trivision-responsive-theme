 			<?php
			//$pretest = get_theme_mod('prefooter_title');
			//$pretest = "Our Partners";
			if ($pretest!='') {$prefooter = get_page_by_title( $pretest );}
			if ($prefooter) { ?>
			<div id="partners" class="hidden-sm hidden-xs pad-40">
				<div class="container text-center"><h2 class="title-line"><span>Our Partners</span></h2></div>
			<?php
			echo apply_filters('the_content', $prefooter->post_content);
			echo '<div class="pad-30"></div></div>';
			} ?>				
			<div id="footer">
				<?php
				$footercolstest = get_theme_mod( 'footer_columns' );
				if($footercolstest) {$footercols = 12/$footercolstest;} else {$footercols = 4;$footercolstest = 3;}
				if($footercolstest == 5) {$footercols = 15;}
				$pagesitemap = get_page_by_title( 'Sitemap' );
				if ($pagesitemap) { 
					echo '<div class="custom-footer">';
					echo apply_filters('the_content', $pagesitemap->post_content); 					
				} else { ?>
				<div class="container">
				<div class="row">
				<?php
				for($i=1; $i<=$footercolstest; $i++) { 
					$footerwidget = 'Footer Widget Col-'.$i;
				?>
					<div id="footer-col-<?php echo $i; ?>" class="col-md-<?php echo $footercols; ?>">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($footerwidget)) : ?>
					<!-- no dynamic sidebar -->			
					<?php endif; ?>
					<?php if($i == $footercolstest) { 
						echo '<ul class="social-list">';
						$social_array = array('facebook', 'twitter', 'youtube', 'yelp', 'google', 'pinterest', 'instagram', 'linkedin', 'envelope');
						foreach ($social_array as $social) {
							$social_acct = 'text_'.$social;
							$social_link = get_theme_mod( $social_acct );
							$social_target = '_blank';
							if ($social == 'envelope') {$social_link = 'mailto:'.get_theme_mod( $social_acct );$social_target = '_self';}
							if ($social_link) {echo '<li class="hidden-sm hidden-xs"><a target="'.$social_target.'" href="'.$social_link.'"><i class="fa fa-'.$social.' fa-lg"></i></a></li>';}
							$social_test .= $social_link;
						}
						echo '</ul>';
					} ?>
					</div>
				<?php } ?>
				</div>
				<div class="row">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget Full-Width')) : ?>
				<?php endif; ?>
				</div>
				<?php }
				$copydivtest = get_theme_mod( 'copyright_div' );
				if($copydivtest == 'combined') {
				?>
				<div class="footer-copyright text-center" style="padding-bottom:30px;">
					<?php
					$rangetest = get_theme_mod('copyright_setting');				
					$credittest = get_theme_mod('copyright_credit');
					//echo $rangetest;
					if($rangetest == '1') {$rangedisplay =get_theme_mod('text_year', date('Y') ); $rangedisplay .= ' - '.date("Y");} else {$rangedisplay = date("Y");}
					if($credittest!='') {$creditdisplay = $credittest;} else {$creditdisplay = "1";}
					//echo $creditdisplay;
					echo'&copy;'.$rangedisplay.' '.get_theme_mod('text_copyright', get_bloginfo('name'));
					if ($creditdisplay=="1") {echo '<br/><small>Branding &amp; Web Development by <a title="Trivision Creative" href="http://trivisioncreative.com/" target="_blank">TriVision Creative</a></small>';} else {echo '. All Rights Reserved.';}
					
				if (wp_nav_menu( array( 'theme_location' => 'Footer Nav', 'echo' => false )) !== false) {
					// This is where your menu module would go
					echo '<ul class="footer-nav">';
					wp_nav_menu( array( 'menu' => 'footer', 'theme_location' => 'Footer Nav', 'container' => false, 'items_wrap' => '%3$s', 'link_before' => '<small>', 'link_after' => '</small>', 'depth' => 0 ));
					echo '</ul>';
				}
					?>
				</div>
				<?php } ?>
				</div>
			</div>
			<?php if($copydivtest == 'separate' || $copydivtest == '') { ?>
			<div id="footer-bottom">
			<div class="container">
				<div class="footer-copyright text-center">
				<?php
				$rangetest = get_theme_mod('copyright_setting');				
				$credittest = get_theme_mod('copyright_credit');
				//echo $rangetest;
				if($rangetest == '1') {$rangedisplay =get_theme_mod('text_year', date('Y') ); $rangedisplay .= ' - '.date("Y");} else {$rangedisplay = date("Y");}
				if($credittest!='') {$creditdisplay = $credittest;} else {$creditdisplay = "1";}
				//echo $creditdisplay;
				echo'&copy;'.$rangedisplay.' '.get_theme_mod('text_copyright', get_bloginfo('name'));
				if ($creditdisplay=="1") {echo '<br/><span class="copyright-branding">Branding &amp; Web Development by <a title="Trivision Creative" href="http://trivisioncreative.com/" target="_blank">TriVision Creative</a></span>';} else {echo '. All Rights Reserved.';}
				
				?>
				</div>
			</div>
			</div>
			<?php } ?>
		</div>
	</div><!--wrapper-->
	<footer>
	<?php
	$ctatest = get_theme_mod( 'cta_image' );
	if ($ctatest) { ?>
	<span id="sticky-block" class="affix hidden-xs hidden-sm"><a href="#" data-toggle="modal" data-target="#cta-contact"><img src="<?php echo $ctatest; ?>" alt="Call to Action"/></a> </span>
	<div id="cta-contact" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content text-left">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal"><img class="svg" src="<?php bloginfo('template_directory');?>/images/icon-close.svg" alt="close" /></button>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
				<h1 class="strong">Call us or fill out the form below.</h1>
				<h3 style="text-transform:none;">Eileen Balberde<br/>Admissions Director<br/>(703) 713-3332 ext. 1004</h3>
				<hr/>
				<h3>Schedule a Tour</h3>
				<?php echo do_shortcode('[contact-form-7 id="1390" title="Tour Form"]'); ?>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
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
	</footer>
	<?php wp_footer(); ?>
	<?php 
	$topnavtest  = get_theme_mod( 'topnav_display' );
	if($topnavtest == "on") { ?>
	<script>
	//<![CDATA[
	jQuery(document).ready(function ($) {
		//sidr menu
		$('#simple-menu').sidr();
		//show fixed navbar
		//var st_pos = jQuery("#page").scrollTop();
		//console.log(st_pos);
		
		$('#sidr #menu-primary .menu-item-has-children > a').click(function(e) {
			e.preventDefault();
			$(this).next().slideToggle();
		});
		
		jQuery(window).bind("scroll", function() {
		if (jQuery(this).scrollTop() > 80) {
			jQuery('#top-menu').slideUp();
			jQuery('#header').addClass('header-scroll');
		} else {
			jQuery('#top-menu').slideDown();
			jQuery('#header').removeClass('header-scroll');
		}
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#top-menu').slideUp();
			jQuery('#header').addClass('header-scroll');
		}
		});
		
	});//]]>  
	</script>
	<?php } else { ?>
	<script>
	//<![CDATA[
	jQuery(document).ready(function ($) {
		$( "body" ).click(function() {
		  $('#simple-menu').sidr('close');
		});
		//sidr responsive menu
		$('#simple-menu').sidr({
		  //name: 'sidr-right',
		  //side: 'right'
		});
		
		$('.menu-item-search').find('a').attr('data-toggle', 'modal');
		$('.menu-item-search').find('a').attr('data-target', '#search');
		
		$('#sidr #menu-primary .menu-item-has-children > a').click(function(e) {
			e.preventDefault();
			$(this).next().slideToggle();
		});
		
		var $grid = $('.grid').isotope({
		  // set itemSelector so .grid-sizer is not used in layout
		  itemSelector: '.grid-item',
		  initLayout: false,
		  percentPosition: true,
		  masonry: {
			// use element for option
			columnWidth: '.grid-sizer'
		  }
		});
		$('#grid').fadeTo('slow',1);
		$grid.isotope({ filter: '*' });	
	});//]]>  
	</script>
	<?php } ?>
	</body>
</html>