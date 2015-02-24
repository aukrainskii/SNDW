<div class="widget_search">
	<form name="search" id="search" method="get" action="<?php echo esc_url(home_url()); ?>">
		<input name="s" type="text" placeholder="<?php esc_attr_e('Search','ABdev_vozx'); ?>" value="<?php echo esc_attr(get_search_query()); ?>">
		<a class="submit"><i class="ci_icon-search"></i></a>
	</form>
</div>