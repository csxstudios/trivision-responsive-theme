<?php get_header(); ?>
	<div id="body" class="container pad-30 text-center">
			<h1><strong>404</strong></h1>
			<h2 class="strong">Oops, we can't seem to find the page you're looking for.</h2>
			<div class="pad-30">
			<h3>Try Using our Search</h3>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="search">
					<form method="get" id="searchform" action="<?php bloginfo('url');?>">
						<input type="text" name="s" id="s" placeholder="" class="searchBox" value="">
						<input type="submit" name="" value="" class="btnSubmit" title="Begin Search">
					</form>
					</div>
				</div>
			</div>
			</div>
			<div class="pad-60"></div>
	</div>
<?php get_footer(); ?>