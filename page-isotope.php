<?php
/*
 * Template Name: Isotope Grid
 * Description: Show Isotope grid
 */
get_header();
?>
			<div id="body<?php if (is_front_page()) {echo '-home';}?>">
			<style>
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

			/* ---- .grid-item ---- */

			.grid-item {
			  float: left;
			  height:324px;
			  width:30%;
			  background: #0D8;
			  border: 0px solid #fff;
			  border-color: hsla(0, 0%, 0%, 0.7);
			}
			.grid-sizer {
				width: 1%;
			}
			.grid-item--width2 { width: 35%; }
			.grid-item--width3 { width: 40%; }
			.grid-item--height2 { height: 648px; }
			
			/*
			  Bootstrap Carousel Fade Transition (for Bootstrap 3.3.x)
			  CSS from:       http://codepen.io/transportedman/pen/NPWRGq
			  and:            http://stackoverflow.com/questions/18548731/bootstrap-3-carousel-fading-to-new-slide-instead-of-sliding-to-new-slide
			  Inspired from:  http://codepen.io/Rowno/pen/Afykb 
			*/
			.carousel-fade .carousel-inner .item {
			  opacity: 0;
			  transition-property: opacity;
			}

			.carousel-fade .carousel-inner .active {
			  opacity: 1;
			}

			.carousel-fade .carousel-inner .active.left,
			.carousel-fade .carousel-inner .active.right {
			  left: 0;
			  opacity: 0;
			  z-index: 1;
			}

			.carousel-fade .carousel-inner .next.left,
			.carousel-fade .carousel-inner .prev.right {
			  opacity: 1;
			}

			.carousel-fade .carousel-control {
			  z-index: 2;
			}

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
			@media (max-width: 991px) {
			.grid-item {height: 164px;}
			.grid-item--height2 { height: 328px; }
			}
			@media (max-width: 768px) {
			.grid-item {height: 60vh;width:100%;}
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
			.home-buckets {background: repeating-linear-gradient(to bottom, #001f3f, #001f3f 54px, #004182 54px, #004182 300px);}
			.bucket-skyblue:hover h3 {background: deepskyblue;opacity: 1;}
			.bucket-skyblue:hover {background: linear-gradient(to bottom, rgba(90,154,203,0) 0%,rgba(90,154,203,0) 30%,rgba(90,154,203,1) 100%);}
			.bucket.bucket-skyblue:hover h3::after {border-top: 20px solid deepskyblue;opacity:1;}
			</style>
			<div class="grid" id="grid">
				<div class="grid-sizer"></div>
				<div class="grid-item grid-item--width3">
					<div id="carousel-signature" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(//placehold.it/768x324/d28aff);">
							<figure style="height:100%;">
							<figcaption><a href="#"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/768x324/ff7af7);">
							<figure>
							<figcaption><a href="#"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/768x324/dedede);">
							<figure>
							<figcaption><a href="#"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item">
					<div id="carousel-partners" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(//placehold.it/576x324/fbc421);">
							<figure>
							<figcaption><a href="#"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/576x324/ffffff);">
							<figure>
							<figcaption><a href="#"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/576x324/21bbfb);">
							<figure>
							<figcaption><a href="#"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--height2">
					<div id="carousel-dulles" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(//placehold.it/576x648/55EE55);">
							<figure>
							<figcaption><a href="#"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/576x648/55EE55);">
							<figure>
							<figcaption><a href="#"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/576x648/dedede);">
							<figure>
							<figcaption><a href="#"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--width2">
					<div id="carousel-mixers" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(//placehold.it/672x324/90ff8a);">
							<figure>
							<figcaption><a href="#"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/672x324/fb9721);">
							<figure>
							<figcaption><a href="#"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/672x324/ffda8a);">
							<figure>
							<figcaption><a href="#"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
							</figure>
						</div>
					  </div>
					</div>
				</div>
				<div class="grid-item grid-item--width2">
					<div id="carousel-smb" class="carousel slide carousel-fade carousel-isotope" data-ride="carousel" data-interval="3000" data-pause="hover">
					  <div class="carousel-inner" role="listbox">
						<div class="item active" style="background-image:url(//placehold.it/672x324/8a8dff);">
							<figure>
							<figcaption><a href="#"><span>My Health Matters 5K/1 mile Walk event on May 20.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/672x324/ff8a8a);">
							<figure>
							<figcaption><a href="#"><span>This is the month to set your networking soaring! Register now for the Signature Flight Mixer on May 25.</span></a></figcaption>
							</figure>
						</div>
						<div class="item" style="background-image:url(//placehold.it/672x324/CCFEFE);">
							<figure>
							<figcaption><a href="#"><span>Break out the clubs and start warming up! It's time to register for the Annual Golf Scramble on June 9.</span></a></figcaption>
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
						<div class="col-md-2"><div class="bucket bucket-skyblue row"><h3>Connect</h3><img src="<?php bloginfo("template_url"); ?>/images/icon-placeholder.png" class="img-responsive center-block"/></div></div>
						<div class="col-md-2 bucket-green"><div class="bucket"><h3>Grow</h3></div></div>
						<div class="col-md-2 bucket-red"><div class="bucket"><h3>Advocate</h3></div></div>
						<div class="col-md-2 bucket-orange"><div class="bucket"><h3>Impact</h3></div></div>
						<div class="col-md-2 bucket-purple"><div class="bucket"><h3>Join</h3></div></div>
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