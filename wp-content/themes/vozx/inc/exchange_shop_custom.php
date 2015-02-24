<?php 

global $vozx_options;

/************* Exchange **************/

// Sold out banner and featured item sign
if(!function_exists('ABdev_vozx_exchange_out_of_stock')) {
	function ABdev_vozx_exchange_out_of_stock() {
		if ( ! empty( $GLOBALS['it_exchange']['product']->ID ) ) :
			$stock_number = it_exchange_get_product_feature( $GLOBALS['it_exchange']['product']->ID, 'inventory' );
			if ($stock_number == 0 && $stock_number != ''){
				echo '<span class="soldout">'.esc_attr__('Out of stock', 'ABdev_vozx').'</span>';
			}
		 endif;
	}
}

add_action( 'it_exchange_content_store_begin_product_element', 'ABdev_vozx_exchange_out_of_stock', 10 );

// Display categories
if (isset($vozx_options['exchange_categories_show']) && $vozx_options['exchange_categories_show']==1) {
	if(!function_exists('ABdev_vozx_exchange_get_product_categories')) {
		function ABdev_vozx_exchange_get_product_categories() {
		    $all_prod_cats = '';
		    if ( ! empty( $GLOBALS['it_exchange']['product']->ID ) ) :
		            $terms = get_the_terms( $GLOBALS['it_exchange']['product']->ID, 'it_exchange_category' );
		            if ( $terms && !is_wp_error( $terms ) ) :
		                    $prod_cats = array();
		                            foreach ( $terms as $term ) {
		                                    $prod_cats[] = $term->name;
		                            }
		                    $all_prod_cats = join( ", ", $prod_cats );
		                    $all_prod_cats_class = join( " ", $prod_cats );
		            endif;
		    endif;
		    if (isset($all_prod_cats) && isset($all_prod_cats_class)) {
		    	echo '<div class="my-exchange-product-categories ' . esc_attr($all_prod_cats_class) . '">'. wp_kses($all_prod_cats, ABdev_allowed_tags()) .'</div>';
		    }
		}
	}

	add_action( 'it_exchange_content_store_info_before_title_element', 'ABdev_vozx_exchange_get_product_categories', 10 ); 
 }

// Single product description title
if(!function_exists('ABdev_vozx_exchange_description_title')){
	function ABdev_vozx_exchange_description_title(){
		echo '<div class="it-exchange-product-description-title"><h2>'.esc_attr__('Description', 'ABdev_vozx').'</h2></div>';
	}
}

add_action( 'it_exchange_content_product_before_description_element', 'ABdev_vozx_exchange_description_title', 10 );

//Catalog mode
if (isset($vozx_options['exchange_catalog']) && $vozx_options['exchange_catalog']=='with_prices') {

	if(!function_exists('ABdev_vozx_exchange_catalog')){
		function ABdev_vozx_exchange_catalog(){
			if (isset( $GLOBALS['wp_widget_factory'])) {
			 	$GLOBALS['wp_widget_factory']->widgets['IT_Exchange_Super_Widget'] = null;
	    	}
		} 
	}

	add_action( 'it_exchange_content_product_after_description_element', 'ABdev_vozx_exchange_catalog', 99);

}

if (isset($vozx_options['exchange_catalog']) && $vozx_options['exchange_catalog']=='without_prices') {

	if(!function_exists('ABdev_vozx_exchange_catalog')){
		function ABdev_vozx_exchange_catalog(){
			if (isset( $GLOBALS['wp_widget_factory'])) {
			 	$GLOBALS['wp_widget_factory']->widgets['IT_Exchange_Super_Widget'] = null;
	    	}
		} 
	}

	add_action( 'it_exchange_content_product_after_description_element', 'ABdev_vozx_exchange_catalog', 99);

	if (!function_exists('ABdev_vozx_exchange_catalog_no_price_product_page')) {
		function ABdev_vozx_exchange_catalog_no_price_product_page( $elements ) {
			foreach ( $elements as $key => $element ) {
			         if ( 'base-price' == $element ) {
			                 unset( $elements[$key] );
			         }
			}
			return $elements;
		}
	}
	
	add_action( 'it_exchange_get_content_product_product_info_loop_elements', 'ABdev_vozx_exchange_catalog_no_price_product_page' );

	if (!function_exists('ABdev_vozx_exchange_catalog_no_price_products')) {
			function ABdev_vozx_exchange_catalog_no_price_products( $elements ) {
				foreach ( $elements as $key => $element ) {
				         if ( 'base-price' == $element ) {
				                 unset( $elements[$key] );
				         }
				}
				return $elements;
			}
		}
		
	add_action( 'it_exchange_get_store_product_product_info_loop_elements', 'ABdev_vozx_exchange_catalog_no_price_products' );

}

