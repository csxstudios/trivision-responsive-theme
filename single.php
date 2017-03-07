<?php get_header(); ?>
			<div id="body" class="single">
				<div class="container pad-60">
			<?php while (have_posts()) : the_post()?>
					<div class="post-title row">
					<h3 class="strong"><?php the_title(); ?></h3>
					<p class="small"><?php echo get_the_date(); ?></p>
					<?php echo synved_social_share_markup(); ?>
					</div>
					<div class="row pad-30">					
					<?php the_content(); ?>
					<hr/>
					</div>
			<?php endwhile; ?>
				</div>
			<div class="text-center"><a onclick="javascript:history.go(-1)" class="outline-btn">GO BACK</a></div>
			<div class="pad-60"></div>
			</div>
		</section>
<?php get_footer(); ?>