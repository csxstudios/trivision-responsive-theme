<?php 
get_header(); 
?>
<div id="body">
<section class="container pad-60">	
	<div class="row">
	<div class="col-md-8 search">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="news-article">
		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		<?php the_time("F d, Y"); ?>
		<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'img-responsive' ) ); ?></a>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="outline-btn">READ MORE</a>
		</div>
		<hr/>
	<?php endwhile; ?>
	<?php else : ?>
		<p>I'm not sure what you're looking for.</p>
	<?php endif; ?>
	</div>
	<div class="col-md-4">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar')) : ?>
	<!-- no dynamic sidebar -->			
	<?php endif; ?>
	</div>
	</div>
	<div class="nav-controls">
	<div class="nav-previous pull-left"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i> Previous page'); ?></div>
	<div class="nav-next pull-right"><?php next_posts_link( 'Next page <i class="fa fa-chevron-right"></i>' ); ?></div>
	</div>
	<div class="pad-97"></div>
</section>
</div>
<?php get_footer(); ?>