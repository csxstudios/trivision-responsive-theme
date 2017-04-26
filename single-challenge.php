<?php get_header(); ?>
			<div id="body" class="single">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
<?php get_footer(); ?>