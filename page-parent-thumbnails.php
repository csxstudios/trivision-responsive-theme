<?php
/*
 * Template Name: Parent Thumbnails
 * Description: Loop to show thumbnails of subpages of this page.
 */
get_header();
?>
			<div id="body">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<section class="subpages container">
				<div class="row">
				<?php
				$ref_id = wp_get_post_parent_id( $post->ID );
					// WP_Query arguments
				$args = array (
					'post_parent'            => $ref_id,
					'post_type'              => 'page',
					'post_per_page'          => 5,
					'order'                  => 'ASC',
					'orderby'                => 'menu_order',
					'post__not_in'           => array($post->ID),
				);

				// The Query
				$query = new WP_Query( $args );
				$counter = 0;
				$queryCount = $query->found_posts;
				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						// do something	
					$counter++;
					$workthumb = get_post_meta($post->ID, 'wpcf-page-icon', true);
					$worktitle = $post->post_title;
					$worklink = get_page_link( $post->ID );
					if(!$workthumb) {
						$workthumb = get_bloginfo('template_directory');
						$workthumb.= '/images/integrio-icons-company-integrity-integration.png';
					}
				?>
				<div class="col-md-3 text-center">
					<a href="<?php echo $worklink; ?>">
					<figure class="block-lg">
					<img class="img-responsive" src="<?php echo $workthumb; ?>" alt="<?php echo $worktitle; ?>"/>
					<figcaption class="pad-10"><?php echo $worktitle; ?></figcaption>
					</figure>
					</a>
				</div>
				<?php
				if ($counter % 4 == 0) { echo '</div><div class="row">';} 
						}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>
				</div>
			</section>
			</div>
			<div class="pad-100"></div>
<?php get_footer(); ?>