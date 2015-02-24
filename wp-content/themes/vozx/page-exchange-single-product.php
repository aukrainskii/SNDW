<?php
/*
Template Name: Exchange single product template
*/

global $vozx_options;
$values = get_post_custom( $post->ID );  


get_header();

get_template_part('partials/header_menu');

if( !isset($values['abdev_hide_breadcrumbs'][0]) || (isset($values['abdev_hide_breadcrumbs'][0]) && !$values['abdev_hide_breadcrumbs'][0] == 1)){
	get_template_part('partials/title_breadcrumbs_bar');
}
?>

		<div id="default_page_row" class="container">

			<div class="row">
				<div class="span12 content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
						<?php the_content();?>
					<?php endwhile; endif;?>
				</div>
			</div><!-- end row -->

		</div>

<?php get_footer();