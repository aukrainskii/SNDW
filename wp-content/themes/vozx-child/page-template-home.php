<?php 

/**
 * Template Name: Home Page Template
 */

get_header();
?>

<nav class="fixed">
	<div class="midnightHeader default">
		<div class="logo-holder">
			<a class="logo"><span class="screenreader"></span></a>
		</div>
	</div>
</nav>

<!-- main section -->
<?php 
	$section_background = function_exists('get_field') ? get_field('section_background') : '';
	$text_colour = function_exists('get_field') ? get_field('text_colour') : '#ffffff';
	$text_position = function_exists('get_field') ? get_field('text_position') : 'center';
?>
<section class="hp-section main full-height text-<?php echo $text_position; ?>" data-midnight="default" style="background: url(<?php echo $section_background; ?>) no-repeat 50% 50%; color:<?php echo $text_colour; ?>">
		<div class="container">
			<div class="wow fadeInUp">
				<p>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<?php the_content();?>
				<?php endwhile; endif;?>
				</p>
			</div>
		</div>
		<div class="scroll-prompt wow fadeInDown"></div>
</section><!-- end main section -->

<!-- get child sections -->
<?php 
$home_args = array (
		'post_parent' => $post->ID,
		'post_type' => 'page',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
$home_query = new WP_Query($home_args);

if ( $home_query->have_posts() ) {
		while ( $home_query->have_posts() ) {
			$home_query->the_post();
			$section_background = function_exists('get_field') ? get_field('section_background') : '';
			$text_colour = function_exists('get_field') ? get_field('text_colour') : '#ffffff';
			$text_position = function_exists('get_field') ? get_field('text_position') : 'center';
			if ( $text_position == "left" ) { 
				$animation = "fadeInLeft";
			} else if ( $text_position == "right" ) {
				$animation = "fadeInRight";
			} else {
				$animation = "fadeInUp";
			}
			?>

			  
			  <section class="hp-section full-height text-<?php echo $text_position; ?>" data-midnight="section-<?php echo $post->menu_order; ?>" style="background: url(<?php echo $section_background; ?>) no-repeat 50% 50%; color:<?php echo $text_colour; ?>">
				  <div class="hp-container">
					    <div class="container">

					      <div class="wow <?php echo $animation; ?>">
					      	<h2 style="color:<?php echo $text_colour; ?>"><?php the_title(); ?></h2>	
					      </div>

					      <div class="wow <?php echo $animation; ?>">
					      	<p><?php the_content(); ?></p> 
					      </div>
					    </div>
				    </div>
			  </section>

			<?php
			}
		wp_reset_postdata();
	}
?><!-- end get child sections -->



<?php get_footer(); ?>