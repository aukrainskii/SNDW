<?php

/*
Template Name: Coming Soon Page
*/


get_header();

get_template_part('partials/header_menu'); 

?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<?php the_content();?>
	<?php endwhile; endif;?>
	
<?php get_footer();