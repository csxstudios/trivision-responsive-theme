<?php get_header(); ?>
			<div id="body" class="single">
				<div class="container pad-60">
				<div class="row">
				<?php while (have_posts()) : the_post() ?>
				<div class="col-md-5 pad-20">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive" />
					<div class="bio-quick-facts pad-20"><?php if(types_render_field('bio-quick-facts', array('raw'=>'true'))){ echo types_render_field("bio-quick-facts", array( ));} ?></div>
				</div>
				<div class="col-md-7">
					<div class="post-title">
					<h3 class="strong" style="margin-bottom:0;"><?php the_title(); ?></h3>
					<h4 style="margin-top:0;"><?php echo get_the_excerpt(); ?></h4>
					<?php //echo synved_social_share_markup(); ?>			
					<?php the_content(); ?>
					<hr/>
					</div>
				<?php endwhile; ?>
				</div>
				</div>
				</div>
			<div class="text-center" style="display:none;"><a onclick="javascript:history.go(-1)" class="outline-btn">GO BACK</a></div>
			<div class="pad-60"></div>
			</div>
		</section>
<?php get_footer(); ?>