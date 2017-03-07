<form method="get" id="searchform" action="<?php bloginfo('url');?>">
	<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" class="searchBox" />
	<input type="submit" value="Go" class="btnSubmit" title="Begin Search" id="searchSubmit" />
</form>