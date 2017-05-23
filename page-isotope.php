<?php
/*
 * Template Name: Isotope Grid
 * Description: Show Isotope grid
 */
get_header();
?>
			<div id="body<?php if (is_front_page()) {echo '-home';}?>">			<style>
			/* ---- grid ---- */
			.grid {
			  background: #DDD;
			  max-width: 100%;
			}			
			/* clear fix */
			.grid:after {
			  content: '';
			  display: block;
			  clear: both;
			}
			/* ---- .grid-item ---- */			.grid-item {
			  float: left;
			  height:324px;
			  width:30%;
			  /* background: #0D8; */
			  border: 0px solid #fff;
			  border-color: hsla(0, 0%, 0%, 0.7);
			}
			.grid-sizer {width: 1%;}
			.grid-item--width2 { width: 35%; }
			.grid-item--width3 { width: 40%; }
			.grid-item--height2 { height: 648px; }			
			/*
			  Bootstrap Carousel Fade Transition (for Bootstrap 3.3.x)
			  CSS from:       http://codepen.io/transportedman/pen/NPWRGq			  and:            http://stackoverflow.com/questions/18548731/bootstrap-3-carousel-fading-to-new-slide-instead-of-sliding-to-new-slide
			  Inspired from:  http://codepen.io/Rowno/pen/Afykb 
			*/
			.carousel-fade .carousel-inner .item {opacity: 0;transition-property: opacity;}			.carousel-fade .carousel-inner .active {opacity: 1;}			.carousel-fade .carousel-inner .active.left, .carousel-fade .carousel-inner .active.right {left: 0;opacity: 0;z-index: 1;}
			.carousel-fade .carousel-inner .next.left, .carousel-fade .carousel-inner .prev.right {opacity: 1;}
			.carousel-fade .carousel-control {z-index: 2;}
			/*
			  WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
			  Need to override the 3.3 new styles for modern browsers & apply opacity
			*/
			@media all and (transform-3d), (-webkit-transform-3d) {
				.carousel-fade .carousel-inner > .item.next,
				.carousel-fade .carousel-inner > .item.active.right {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .item.prev,
				.carousel-fade .carousel-inner > .item.active.left {
					opacity: 0;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
				.carousel-fade .carousel-inner > .item.next.left,
				.carousel-fade .carousel-inner > .item.prev.right,
				.carousel-fade .carousel-inner > .item.active {
					opacity: 1;
					-webkit-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
				}
			}
			.carousel-isotope, .carousel-isotope .item, .carousel-isotope .carousel-inner, .carousel-isotope figure, .carousel-isotope figcaption {
				height:100%;
			}
			.carousel-isotope .item {
				background-size:cover;
				background-position:center center;
			}
			.carousel-isotope figcaption a {
				position:relative;
				transition:.2s all ease-in-out;
				opacity:0;
				display:block;
				width:100%;
				height:100%;
			}
			.carousel-isotope figcaption span {
				position: absolute;
				bottom: 0;
				text-transform:none;
				color:#fff;
				padding: 30px;
			}
			.carousel-isotope figure:hover figcaption a {opacity:1;background: linear-gradient(to bottom, rgba(0,0,0,0) 30%,rgba(0,0,0,.25) 60%,rgba(0,0,0,.5) 100%);color:#fff!important;}
			.carousel-isotope img {
				max-width: 100%;
				height: auto;
				display:block;
			}
			.bucket h3 {margin:0px;padding:15px 0;line-height:1;color:#fff;position:relative;transition: .2s all ease-in-out;}
			.bucket h3:after {
				content: '';
				position: absolute;
				left: 0;
				right:0;
				margin:0 auto;
				top: 100%;
				width: 0;
				height: 0;
				border-left: 20px solid transparent;
				border-right: 20px solid transparent;
				border-top: 20px solid #004182;
				clear: both;
				opacity:0;
				transition: .2s all ease-in-out;
			}
			.home-buckets {background: repeating-linear-gradient(to bottom, #001f3f, #001f3f 54px, #004182 54px, #004182 300px);}			.home-buckets figure {position:relative;overflow:hidden;}			.home-buckets figcaption {position:absolute;height:100%;width:100%;top:100%;transition: .2s all ease-in-out;}			.home-buckets figure:hover figcaption {top:30px;}			.home-buckets figure img {opacity:1;transition: .2s all ease-in-out;}			.home-buckets figure:hover img {opacity:0;}			.bucket-text-title {font-size:200%;display:none!important;}			.bucket-text-title, .bucket-text-block {color:#fff;width:100%;text-align:center;text-transform:none;display:block;padding:30px;}
			.bucket-skyblue:hover h3 {background: deepskyblue;opacity: 1;}
			.bucket-skyblue:hover {background: linear-gradient(to bottom, rgba(90,154,203,0) 0%,rgba(90,154,203,0) 30%,rgba(90,154,203,1) 100%);}
			.bucket.bucket-skyblue:hover h3::after {border-top: 20px solid deepskyblue;opacity:1;}
			.bucket-green:hover h3 {background: rgba(57,181,74,1);opacity: 1;}
			.bucket-green:hover {background: linear-gradient(to bottom, rgba(57,181,74,0) 0%,rgba(57,181,74,0) 30%,rgba(57,181,74,1) 100%);}
			.bucket.bucket-green:hover h3::after {border-top: 20px solid rgba(57,181,74,100);opacity:1;}			
			.bucket-red:hover h3 {background: rgba(242,111,104,1);opacity: 1;}
			.bucket-red:hover {background: linear-gradient(to bottom, rgba(242,111,104,0) 0%,rgba(242,111,104,0) 30%,rgba(242,111,104,1) 100%);}
			.bucket.bucket-red:hover h3::after {border-top: 20px solid rgba(242,111,104,100);opacity:1;}
			.bucket-orange:hover h3 {background: rgba(247,148,29,1);opacity: 1;}
			.bucket-orange:hover {background: linear-gradient(to bottom, rgba(247,148,29,0) 0%,rgba(247,148,29,0) 30%,rgba(247,148,29,1) 100%);}
			.bucket.bucket-orange:hover h3::after {border-top: 20px solid rgba(247,148,29,100);opacity:1;}
			.bucket-purple:hover h3 {background: rgba(113,66,154,1);opacity: 1;}
			.bucket-purple:hover {background: linear-gradient(to bottom, rgba(113,66,154,0) 0%,rgba(113,66,154,0) 30%,rgba(113,66,154,1) 100%);}
			.bucket.bucket-purple:hover h3::after {border-top: 20px solid rgba(113,66,154,100);opacity:1;}						.bucket-teal:hover h3 {background: rgba(101,203,201,1);opacity: 1;}			.bucket-teal:hover {background: linear-gradient(to bottom, rgba(101,203,201,0) 0%,rgba(101,203,201,0) 30%,rgba(101,203,201,1) 100%);}			.bucket.bucket-teal:hover h3::after {border-top: 20px solid rgba(101,203,201,100);opacity:1;}
			@media (max-width: 991px) {
				.grid-item {height: 164px;}
				.grid-item--height2 { height: 328px; }
				.home-buckets {background: #004182;}
			}

			@media (max-width: 768px) {
				.grid-item {height: 60vh;width:100%;}
			}

			</style>
			<div class="grid" id="grid">
				<div class="grid-sizer"></div>
				<div class="grid-item grid-item--width3">
					<div id="carousel-signature" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
					  <?php
						// WP_Query arguments
						$args = array(
						'post_type' => 'post',
						'category_name' => 'signature-event',
						'posts_per_page' => 3,
						);
						// The Query
						$query_signature = new WP_Query( $args );
						$counter = 0;
						// The Loop
						if ( $query_signature->have_posts() ) {
							while ( $query_signature->have_posts() ) {
								$query_signature->the_post();
								// do something
								$counter++;
								$postimg = esc_url(wp_get_attachment_url(get_post_thumbnail_id()));
								if(!$postimg) {$postimg = '(//placehold.it/768x324/d28aff';}
						?>
						<div class="item<?php if ($counter==1) {echo ' active';} ?>" style="background-image:url(<?php echo $postimg; ?>);">
							<figure>
							<figcaption><a href="<?php echo get_page_link(); ?>"><span><?php the_excerpt(); ?></span></a></figcaption>
							</figure>
						</div>	
						<?php
							}
						} else {
							// no posts found
						}
						// Restore original Post Data
						wp_reset_postdata();
					  ?>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item">
					<div id="carousel-partners" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-Partners-576×324-2.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/partners/"><span>Our Champion Partners</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-Partners-576×324-5.jpg);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/partners/"><span>Our Champion Partners</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-Partners-576×324-4.jpg);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/partners/"><span>Our Champion Partners</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--height2">
					<div id="carousel-dulles" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-footprints-576×648.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/dulles-footprint/"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-footprints-576×648-2.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/dulles-footprint/"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-footprints-576×648-3.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/dulles-footprint/"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--width2">
					<div id="carousel-mixers" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-mixers-672×324-4.jpg);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/mixers/"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-mixers-672×324-2.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/mixers/"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner-mixers-672×324-3.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/mixers/"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--width2">
					<div id="carousel-smb" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner0small-business-672×324-3.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/small-business/"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner0small-business-672×324-2.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/small-business/"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/Homepage-Banner0small-business-672×324.png);">
							<figure>
							<figcaption><a href="http://www.trivisionclients.com/drcc/small-business/"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
			</div>
			<div class="home-buckets">
				<div class="container-fluid text-center">
					<div class="row">
						<div class="col-md-1"></div>						
						<div class="col-md-2"><div class="bucket bucket-skyblue row"><h3>Connect</h3><figure><img src="http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/icon-homepage-CONNECT.png"/><figcaption><a href="#"><span class="bucket-text-title">Title</span><span class="bucket-text-block">300 Networking Opportunities!</span></a></figcaption></figure></div></div>
						<div class="col-md-2"><div class="bucket bucket-green row"><h3>Grow</h3><figure><img src="http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/icon-homepage-GROW.png"/><figcaption><a href="#"><span class="bucket-text-title">Title</span><span class="bucket-text-block">Inexpensive, dynamic marketing!</span></a></figcaption></figure></div></div>
						<div class="col-md-2"><div class="bucket bucket-red row"><h3>Advocate</h3><figure><img src="http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/icon-homepage-ADVOCATE.png"/><figcaption><a href="#"><span class="bucket-text-title">Title</span><span class="bucket-text-block">The largest business lobby in the state!</span></a></figcaption></figure></div></div>
						<div class="col-md-2"><div class="bucket bucket-orange row"><h3>Impact</h3><figure><img src="http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/icon-homepage-IMPACT.png"/><figcaption><a href="#"><span class="bucket-text-title">Title</span><span class="bucket-text-block">Your chance to make a difference!</span></a></figcaption></figure></div></div>
						<div class="col-md-2"><div class="bucket bucket-teal row"><h3>Join</h3><figure><img src="http://www.trivisionclients.com/drcc/wp-content/uploads/2017/05/icon-homepage-JOIN.png"/><figcaption><a href="#"><span class="bucket-text-title">Title</span><span class="bucket-text-block">Your one-stop shop for a balanced life!</span></a></figcaption></figure></div></div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
			<?php if ($post->post_name !== 'contact-us' and !is_front_page()) {?><div class="pad-0"></div><?php } ?>
		</section>
<?php get_footer(); ?>