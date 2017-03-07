<?php
/*
 * Template Name: Subpage Rows
 * Description: Loop to show rows of subpages of this page.
 */
get_header();
?>
			<div id="body">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<section class="subpages">
				<?php
				$ref_id = $post->ID;
					// WP_Query arguments
				$args = array (
					'post_parent'            => $ref_id,
					'post_type'              => 'page',
					'post_per_page'          => 4,
					'order'                  => 'ASC',
					'orderby'                => 'menu_order',
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
				<div class="container"><h3><?php the_title(); ?></h3></div>
				<?php the_content(); ?>
				<?php
						}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
				?>
			</section>
			</div>
<?php get_footer(); ?>