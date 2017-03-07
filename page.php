<?php get_header(); ?>
			<div id="body<?php if (is_front_page()) {echo '-home';}?>">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
			<?php if ($post->post_name !== 'contact-us' and !is_front_page()) {?><div class="pad-0"></div><?php } ?>
		</section>
<?php get_footer(); ?>