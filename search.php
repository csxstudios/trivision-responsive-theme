<?php get_header(); ?>
			<div id="body" class="single">
				<div class="container pad-60">
			<?php while (have_posts()) : the_post()?>
					<div class="row">
					<h3><a href="<?php echo get_page_link(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
					<div class="text-left"><a href="<?php echo get_page_link(); ?>" class="outline-btn">VIEW PAGE ></a></div>
					<hr/>
					</div>
			<?php endwhile; ?>
				</div>
			<div class="pad-60"></div>
			</div>
		</section>
<?php get_footer(); ?>