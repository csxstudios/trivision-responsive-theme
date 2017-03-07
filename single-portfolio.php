<?php get_header(); ?>
			<div id="body" class="single pad-60">
			<?php while (have_posts()) : the_post()?>
				<?php do_shortcode('[types field="portfolio-subtitle"][/types]'); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<div class="text-center"><a onclick="javascript:history.go(-1)" class="outline-btn">GO BACK</a></div>
			<div class="pad-60"></div>
			</div>
<?php get_footer(); ?>