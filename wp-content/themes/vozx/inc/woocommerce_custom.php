<?php 

/********* Woocommerce Shop ***********/
add_theme_support( 'woocommerce' );

global $vozx_options;

// Container for the shop items 
if ( ! function_exists( 'ABdev_vozx_open_woocommerce_content_wrappers' ) ){
	function ABdev_vozx_open_woocommerce_content_wrappers(){
		global $vozx_options;
	    echo '<div class="container shop_container column-'.esc_attr($vozx_options['column_number']).'"><div class="row">';
	}
}

if ( ! function_exists( 'ABdev_vozx_close_woocommerce_content_wrappers' ) ){
	function ABdev_vozx_close_woocommerce_content_wrappers(){
	    echo '</div></div>';
	}
}


if( isset($vozx_options['woocommerce_layout']) && $vozx_options['woocommerce_layout']=='left_sidebar') {
	if ( ! function_exists( 'ABdev_vozx_product_wrapper_open' ) ){
		function ABdev_vozx_product_wrapper_open(){
			echo '<div class="span9 content_with_left_sidebar">';
		}
	}
} elseif( isset($vozx_options['woocommerce_layout']) && $vozx_options['woocommerce_layout']=='right_sidebar'){
	if ( ! function_exists( 'ABdev_vozx_product_wrapper_open' ) ){
		function ABdev_vozx_product_wrapper_open(){
			echo '<div class="span9 content_with_right_sidebar">';
		}
	}
} else{
	if ( ! function_exists( 'ABdev_vozx_product_wrapper_open' ) ){
		function ABdev_vozx_product_wrapper_open(){
			echo '<div class="span12">';
		}
	}
}

if ( ! function_exists( 'ABdev_vozx_product_wrapper_close' ) ){
	function ABdev_vozx_product_wrapper_close(){
		echo '</div>';
	}
}

if(isset($vozx_options['woocommerce_layout']) && $vozx_options['woocommerce_layout']=='left_sidebar'){
	if ( ! function_exists( 'ABdev_vozx_before_shop_loop_sidebar' ) ){
		function ABdev_vozx_before_shop_loop_sidebar() {
			global $vozx_options;

			echo '<aside class="span3 sidebar sidebar_left">'; 
			dynamic_sidebar($vozx_options['shop_sidebar']);
			echo '</aside>';
		}
	}
} elseif(isset($vozx_options['woocommerce_layout']) && $vozx_options['woocommerce_layout']=='right_sidebar'){
	if ( ! function_exists( 'ABdev_vozx_before_shop_loop_sidebar' ) ){
		function ABdev_vozx_before_shop_loop_sidebar() {
			global $vozx_options;

			echo '<aside class="span3 sidebar sidebar_right">'; 
			dynamic_sidebar($vozx_options['shop_sidebar']);
			echo '</aside>';
		}
	}
} else{
	if ( ! function_exists( 'ABdev_vozx_before_shop_loop_sidebar' ) ){
		function ABdev_vozx_before_shop_loop_sidebar() {
			echo '';
		}
	}
}

add_action( 'woocommerce_after_shop_loop', 'ABdev_vozx_before_shop_loop_sidebar', 20);


if ( ! function_exists( 'ABdev_vozx_prepare_woocommerce_wrappers' ) ){
	function ABdev_vozx_prepare_woocommerce_wrappers(){
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_content_wrapper', 10);
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_output_content_wrapper_end', 10);
		
		add_action( 'woocommerce_before_main_content', 'ABdev_vozx_open_woocommerce_content_wrappers', 10 );
		add_action( 'woocommerce_after_main_content', 'ABdev_vozx_close_woocommerce_content_wrappers', 10 );    
		add_action( 'woocommerce_before_shop_loop', 'ABdev_vozx_product_wrapper_open', 10 );
		add_action( 'woocommerce_after_shop_loop', 'ABdev_vozx_product_wrapper_close', 10 );
	}
}

add_action( 'wp_head', 'ABdev_vozx_prepare_woocommerce_wrappers' );

// Removing default sidebars on all shop pages
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Remove single product sidebar 
if(!function_exists('ABdev_woocommerce_remove_sidebar_shop' )){
	function ABdev_woocommerce_remove_sidebar_shop() {
	    if( function_exists('is_product') && is_product() )
	       remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}

add_action( 'template_redirect', 'ABdev_woocommerce_remove_sidebar_shop' );

// Removing breadcrumbs on all shop pages
if(!function_exists('ABdev_vozx_remove_wc_breadcrumbs' )){
	function ABdev_vozx_remove_wc_breadcrumbs() {
	    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

add_action( 'init', 'ABdev_vozx_remove_wc_breadcrumbs' );

// Setting your own title for shop page
if(!function_exists('ABdev_vozx_woocommerce_shop_page_title' )){
	function ABdev_vozx_woocommerce_shop_page_title( ) {
		global $vozx_options;
		if ( is_shop() && isset($vozx_options['shop_title']) && $vozx_options['shop_title'] != '' ){
			return esc_attr($vozx_options['shop_title']);
		} else{
			return ;
		}
	}
}

add_filter( 'woocommerce_page_title', 'ABdev_vozx_woocommerce_shop_page_title');

// Change number or columns 
if (!function_exists('ABdev_loop_columns')) {
	function ABdev_loop_columns() {
		global $vozx_options;
		return $vozx_options['column_number']; 
	}
}

add_filter('loop_shop_columns', 'ABdev_loop_columns');

// Change number or products per row 
if (!function_exists('ABdev_jk_related_products')) {
	function ABdev_jk_related_products() {
		global $vozx_options;

	    $args = array(
	        'posts_per_page' => $vozx_options['column_number'],  
	        'columns'        => $vozx_options['column_number'],  
	    );
	    return $args;
	}
}

add_filter( 'woocommerce_output_related_products_args', 'ABdev_jk_related_products' );

// Removing zoom class from main single product image
if (!function_exists('ABdev_remove_zoom_single_product_image_html')) {
	function ABdev_remove_zoom_single_product_image_html( $html, $post_id ){
	    $image_title = get_the_title( get_post_thumbnail_id() );
	    $image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
	    $image = get_the_post_thumbnail( $post_id, 'shop_single', array( 'title' => $image_title ) );
	    $html = '<a href="'.esc_url( $image_link ).'" itemprop="image" class="woocommerce-main-image" title="'.esc_attr($image_title).'" data-rel="prettyPhoto[product-gallery]">'.$image.'</a>';
	
	    return $html;
	}
}

add_filter( 'woocommerce_single_product_image_html', 'ABdev_remove_zoom_single_product_image_html', 10, 2 );

//Back to products button on single product page
if (!function_exists('ABdev_vozx_back_to_products_page_button')) {
	function ABdev_vozx_back_to_products_page_button() {
		$shop_page_url = esc_url(get_permalink( woocommerce_get_page_id( 'shop' ) ));
		echo '<a href="' . $shop_page_url . '" class="back_to_shop_button">' . esc_attr('Back to Products', 'ABdev_vozx') . '</a>';
	}
}

add_action('woocommerce_single_product_summary', 'ABdev_vozx_back_to_products_page_button', 40);

//AJAX Add to cart price update
if (!function_exists('ABdev_vozx_woocommerce_header_add_to_cart_fragment')) {
	function ABdev_vozx_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;	
		ob_start();	
		?>
		<a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'ABdev_vozx'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'ABdev_vozx'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		<?php	
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
}

add_filter('add_to_cart_fragments', 'ABdev_vozx_woocommerce_header_add_to_cart_fragment');

// Woocommerce pagination override 
if (!function_exists('ABdev_custom_override_pagination_args')) {
	function ABdev_custom_override_pagination_args( $args ) {
		$args['prev_text'] = '<i class="ci_icon-chevron-left"></i>';
		$args['next_text'] = '<i class="ci_icon-chevron-right"></i>';
		return $args;
	}
}

add_filter( 'woocommerce_pagination_args' , 'ABdev_custom_override_pagination_args' );

// Sold out banner and featured item sign
if (!function_exists('ABdev_vozx_soldout_products')) {
	function ABdev_vozx_soldout_products() {
	    global $product;

	    if ( !$product->is_in_stock() ) {
	        echo '<span class="soldout">'.esc_attr__('Out of stock', 'ABdev_vozx').'</span>';
	    }
    }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'ABdev_vozx_soldout_products' );

// Featured Products
if (!function_exists('ABdev_vozx_featured_products')) {
	function ABdev_vozx_featured_products() {
	    global $product;

	    if ( $product->is_featured() ) {
	        echo '<span class="featured"><i class="ci_icon-star-o"></i></span>';
	    }
    }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'ABdev_vozx_featured_products' );

//New Product Badge
if (!function_exists('ABdev_vozx_on_sale')) {
	function ABdev_vozx_on_sale(){
	    global $product;
		global $vozx_options;	    

		$days_old = floor((time() - strtotime(get_the_date())) / 86400);
		$consider_new = (isset($vozx_options['consider_new']) && $vozx_options['consider_new']!='') ? esc_attr($vozx_options['consider_new']) : '5';

		if ( $consider_new > $days_old ){
			echo '<span class="new">'.esc_attr__('NEW', 'ABdev_vozx').'</span>';
		}

	}
}

add_action( 'woocommerce_before_shop_loop_item_title', 'ABdev_vozx_on_sale' );

//Catalog mode

if (isset($vozx_options['woocommerce_catalog']) && $vozx_options['woocommerce_catalog']=='with_prices') {

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); //Removes add to cart button

	if (!function_exists('ABdev_vozx_woocommerce_replace_add_to_cart')) {
		function ABdev_vozx_woocommerce_replace_add_to_cart() {
			echo '<form action="' . esc_attr(get_permalink()) . '" method="get">
            		<button type="submit" class="single_add_to_cart_button button">'.__('Read More', 'ABdev_vozx').'</button>
          		</form>';
		}
	}

	add_action( 'woocommerce_after_shop_loop_item', 'ABdev_vozx_woocommerce_replace_add_to_cart', 10 ); //Adds read more button

	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); //Removes add to cart button

	remove_action( 'woocommerce_after_shop_loop_item_title', 'ABdev_vozx_soldout_products' ); //Removes soldout tag
}

if (isset($vozx_options['woocommerce_catalog']) && $vozx_options['woocommerce_catalog']=='without_prices') {

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); //Removes add to cart button

	if (!function_exists('ABdev_vozx_woocommerce_replace_add_to_cart')) {
		function ABdev_vozx_woocommerce_replace_add_to_cart() {
			echo '<form action="' . esc_attr(get_permalink()) . '" method="get">
            		<button type="submit" class="single_add_to_cart_button button">'.esc_attr__('Read More', 'ABdev_vozx').'</button>
          		</form>';
		}
	}

	add_action( 'woocommerce_after_shop_loop_item', 'ABdev_vozx_woocommerce_replace_add_to_cart', 10 ); //Adds read more button

	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); //Removes add to cart button

	remove_action( 'woocommerce_after_shop_loop_item_title', 'ABdev_vozx_soldout_products' ); //Removes soldout tag
	
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); //Removes on sale tag

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 ); //Removes price

	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); //Removes price
	
	remove_action( 'woocommerce_before_shop_loop_item_title', 'ABdev_vozx_featured_products' ); //Removes featured star

}