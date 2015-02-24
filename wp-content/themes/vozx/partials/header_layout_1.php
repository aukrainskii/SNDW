<?php 
	global $vozx_options;
?>

<header id="ABdev_main_header" class="clearfix header_layout_1">
	<div id="top_container">
		<div class="container">
			<div class="row">
				<div class="span8">
					<div id="logo">
						<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo (isset($vozx_options['header_logo']['url']) && $vozx_options['header_logo']['url'] != '') ? esc_url( $vozx_options['header_logo']['url'] ) : TEMPPATH.'/images/logo.png';?>" alt="<?php bloginfo('name');?>"></a>
					</div>
				</div>
				<div class="span4 right_aligned">
					<div class="logo_search_bar">
						<?php get_template_part('partials/header_search_default');  ?>
					</div>
					<div id="ABdev_menu_toggle"><i class="ci_icon-navicon"></i></div>				
				</div>
			</div>
		</div>
	</div>

	<div id="nav_menu_bar">
		<div class="container">
			<?php if(isset($vozx_options['woocommerce_catalog']) && $vozx_options['woocommerce_catalog'] != 1) :?>
				<?php if( in_array('woocommerce/woocommerce.php', get_option('active_plugins')) ):?>
				<?php global $woocommerce; ?>
					<span id="shop_links" class="cart_right"><?php _e('Cart:','ABdev_vozx') ?>
						<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'ABdev_vozx'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'ABdev_vozx'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a><i class="ci_icon-shopping-cart"></i>
					<div class="cart_dropdown_widget">
						<?php the_widget('WC_Widget_Cart'); ?>
					</div>
					</span>
				<?php endif; ?>
			<?php endif; ?>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container' => false,'menu_id' => 'main_menu','menu_class' => '','walker'=> new vozx_walker_nav_menu, 'fallback_cb' => false ) );?>
			</nav>
		</div>
	</div>
</header>

<div id="ABdev_header_spacer"></div>


