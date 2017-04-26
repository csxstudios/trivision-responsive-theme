<?php get_header(); ?>
			<div id="body" class="single pad-30">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
<?php get_footer(); ?>