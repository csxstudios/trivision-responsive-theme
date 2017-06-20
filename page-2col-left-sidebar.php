<?php
/*
 * Template Name: 2 Column - Left Sidebar
 * Description: Loop to show thumbnails of subpages of this page.
 */
get_header();
?>
			<div id="body<?php if (is_front_page()) {echo '-home';}?>">
				<div class="container">
				<div class="row">
					<div class="col-md-4">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar')) : ?>
					<!-- no dynamic sidebar -->			
					<?php endif; ?>
					</div>
					<div class="col-md-8">
					<?php while (have_posts()) : the_post()?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					</div>
				</div>
				</div>
			</div>
			<?php if ($post->post_name !== 'contact-us' and !is_front_page()) {?><div class="pad-0"></div><?php } ?>
		</section>
<?php get_footer(); ?>