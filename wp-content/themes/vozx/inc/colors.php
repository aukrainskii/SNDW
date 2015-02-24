<?php 

if ( ! function_exists( 'ABdev_colors_css_hex2rgb' ) ){
	function ABdev_colors_css_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		return implode(",", $rgb); 
	} 
}

if ( ! function_exists( 'ABdev_colors_css_adjustBrightness' ) ){
	function ABdev_colors_css_adjustBrightness($hex, $steps) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max(-255, min(255, $steps));
		$hex = str_replace('#', '', $hex);
		if (strlen($hex) == 3) {
			$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
		}
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		$r = max(0,min(255,$r + $steps));
		$g = max(0,min(255,$g + $steps));  
		$b = max(0,min(255,$b + $steps));
		$r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
		$g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
		$b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
		return '#'.$r_hex.$g_hex.$b_hex;
	}
}



if(isset($vozx_options['main_color']) && $vozx_options['main_color'] != ''){ 
	$main_color = $vozx_options['main_color'];
	$hover_shadow = ABdev_colors_css_adjustBrightness($main_color, '-20');
	$custom_css.= '
		a{color: '.$main_color.';}
		#ABdev_menu_toggle{color: '.$main_color.'!important;}
		:focus{outline-color: '.$main_color.';}
		input:focus{outline-color: '.$main_color.'!important;}
		.text_red{color: '.$main_color.'!important;}
		::selection {color: #fff;background: '.$main_color.'!important;}
		#ABdev_main_header.transparent .search-icon.active i{color: '.$main_color.'!important;}
		button, input[type="submit"]{background: '.$main_color.'; border:1px solid '.$main_color.';}
		nav > ul > li:hover{color: '.$main_color.'!important;}
		nav > ul > li a:hover{color: '.$main_color.'!important;}
		nav > ul ul ul li > a:hover{color: '.$main_color.'!important;}
		nav > ul > .current-menu-item > a,nav > ul > .current-post-ancestor > a,nav > ul > .current-menu-ancestor > a{color: '.$main_color.';}
		nav > ul ul > .current-menu-item > a{color: '.$main_color.'!important;}
		nav > ul .sf-mega-inner .description_menu_item a{color:'.$main_color.';}
		#ABdev_main_header.transparent nav > ul > .current-menu-item > a,#ABdev_main_header.transparent nav > ul > .current-post-ancestor > a,#ABdev_main_header.transparent nav > ul > .current-menu-ancestor > a {color: '.$main_color.';}
		#ABdev_main_header.transparent nav > ul > li:hover{color: '.$main_color.';}
		#ABdev_main_header.transparent nav > ul > li a:hover{color: '.$main_color.';}
		.search-toggle:hover a{color: '.$main_color.'!important;}
		.search-toggle a.active{color: '.$main_color.';}
		.search-toggle.active{background: '.$main_color.';color: #fff;}
		#search-container .widget_search i:hover{color: '.$main_color.';}
		.widget_recent_comments .recentcomments .url:hover{color: '.$main_color.';}
		.post_info{border-bottom: 1px solid '.$main_color.';}
		.post_info:after{background: '.$main_color.';}
		.post_content .post_main .post_author i{color: '.$main_color.';}
		.post_content .post_main .post_author .post_tags a:hover{color: '.$main_color.';}
		.post_content .post_main h2:hover a{color: '.$main_color.';}
		#inner_post_pagination > span{color: '.$main_color.';}
		#inner_post_pagination > a:hover{color: '.$main_color.';}
		blockquote{border-left: 4px solid '.$main_color.';}
		.woocommerce ul.products li.product a:hover h3, .woocommerce-page ul.products li.product a:hover h3{color: '.$main_color.';}
		.post_info .post_main_date{color: '.$main_color.';}
		.post_main .postmeta-above a:hover{color: '.$main_color.';}
		.post_main .post_author .author_link a{color: '.$main_color.';}
		.post_main .post_main_inner_wrapper h2:hover a{color: '.$main_color.';}
		.post_main .post_main_inner_wrapper .post_author .post_author_inner i{color: '.$main_color.';}
		.post_main .post_main_inner_wrapper .post_author .post_tags i{color: '.$main_color.';}
		.post_main .post_main_inner_wrapper .post_padding .more-link_inside{color: '.$main_color.';}
		.post-password-form input[type="submit"]{background: '.$main_color.'; border: 1px solid '.$main_color.';}
		.post-password-form input[type="submit"]:hover{color: '.$main_color.';}
		.timeline_post h2:hover a{color: '.$main_color.';}
		.timeline_postmeta .post_author > a{color: '.$main_color.';}
		.timeline_postmeta .post_author .post_category a:hover{color: '.$main_color.';}
		.timeline_post_left:after,.timeline_post_right:after{background: '.$main_color.';border: 2px solid #d1d1d1;}
		#timeline_posts .post-readmore a.more-link{background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		#timeline_posts .post-readmore a.more-link:hover{background: '.$main_color.';color: #fff;}
		.grid_post h2:hover a{color: '.$main_color.';}
		.grid_postmeta a{color: '.$main_color.';}
		.rpwe-time.published:before{color: '.$main_color.';}
		.mini2_post .post_main_inner_wrapper h6 a:hover{color: '.$main_color.';}
		.mini2_post .post_author a{color: '.$main_color.';}
		#grid_posts .post-readmore a.more-link{   background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		#grid_posts .post-readmore a.more-link:hover{    background: '.$main_color.';color: #fff;}
		.blog_category_index_right .post_date,.blog_category_index_left .post_date,.blog_category_index_none .post_date{background: '.$main_color.';}
		.blog_category_index_right .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_left .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_none .post_main .post_main_inner_wrapper h2:hover a{color: '.$main_color.';}
		.blog_category_index_right .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_left .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_none .post_main .post_main_inner_wrapper .post_category a:hover{color:'.$main_color.';}
		.blog_category_index_right .post_main .post_main_inner_wrapper .post-readmore .more-link, .blog_category_index_left .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none .post_main .post_main_inner_wrapper .post-readmore .more-link{    background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		.blog_category_index_right .post_main .post_main_inner_wrapper .post-readmore .more-link:hover, .blog_category_index_left .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{    background: '.$main_color.';color: #fff;}
		.blog_category_index_right2 .post_date,.blog_category_index_left2 .post_date,.blog_category_index_none2 .post_date{background: '.$main_color.';}
		.blog_category_index_right2 .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_left2 .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_none2 .post_main .post_main_inner_wrapper h2:hover a{color: '.$main_color.';}
		.blog_category_index_right2 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_left2 .post_main .post_main_inner_wrapper .post_category a:hover,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post_category a:hover{color:'.$main_color.';}
		.blog_category_index_right2 .post_main .post_main_inner_wrapper .post-readmore .more-link, .blog_category_index_left2 .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post-readmore .more-link{    background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		.blog_category_index_right2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover, .blog_category_index_left2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none2 .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{    background: '.$main_color.';color: #fff;}
		.blog_category_index_right3 .post_info,.blog_category_index_left3 .post_info,.blog_category_index_none3 .post_info{border-bottom: 1px solid '.$main_color.';}
		.blog_category_index_right3 .post_info:after,.blog_category_index_left3 .post_info:after,.blog_category_index_none3 .post_info:after{background: '.$main_color.';}
		.blog_category_index_right3 .post_info .post_main_date,.blog_category_index_left3 .post_info .post_main_date,.blog_category_index_none3 .post_info .post_main_date{color: '.$main_color.';}
		.blog_category_index_right3 .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_left3 .post_main .post_main_inner_wrapper h2:hover a,.blog_category_index_none3 .post_main .post_main_inner_wrapper h2:hover a{color: '.$main_color.';}
		.blog_category_index_right3 .post_main .post_main_inner_wrapper .post_author .post_author_inner i,.blog_category_index_left3 .post_main .post_main_inner_wrapper .post_author .post_author_inner i,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post_author .post_author_inner i{color: '.$main_color.';}
		.blog_category_index_right3 .post_main .post_main_inner_wrapper .post_author .post_tags i,.blog_category_index_left3 .post_main .post_main_inner_wrapper .post_author .post_tags i,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post_author .post_tags i{color: '.$main_color.';}
		.blog_category_index_right3 .post_main .post_main_inner_wrapper .post_padding .more-link_inside, .blog_category_index_left3 .post_main .post_main_inner_wrapper .post_padding .more-link_inside,.blog_category_index_none3 .post_main .post_main_inner_wrapper .post_padding .more-link_inside{color: '.$main_color.';}
		.blog_category_index_right_mini .post_type,.blog_category_index_left_mini .post_type,.blog_category_index_none_mini .post_type{background: '.$main_color.';}
		.blog_category_index_right_mini .post_main h2 a:hover,.blog_category_index_left_mini .post_main h2 a:hover,.blog_category_index_none_mini .post_main h2 a:hover{color: '.$main_color.';}
		.blog_category_index_right_mini .post_main .post_main_inner_wrapper .post-readmore .more-link, .blog_category_index_left_mini .post_main .post_main_inner_wrapper .post-readmore .more-link,.blog_category_index_none_mini .post_main .post_main_inner_wrapper .post-readmore .more-link{    background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		.blog_category_index_right_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover, .blog_category_index_left_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover,.blog_category_index_none_mini .post_main .post_main_inner_wrapper .post-readmore .more-link:hover{    background: '.$main_color.';color: #fff;}
		.mini2_post .post_type{background: '.$main_color.';}
		.mini2_post .post_category a:hover{color: '.$main_color.';}
		.mini2_post .post_main_inner_wrapper h2 a:hover{color: '.$main_color.';}
		.blog_category_index_dual .post_main .post_main_inner_wrapper h2:hover a{color: '.$main_color.';}
		.blog_category_index_dual .post_main .post_main_inner_wrapper .post-readmore .more-link {    background: #fff;border: 1px solid #dddddd;color: '.$main_color.';}
		.blog_category_index_dual .post_main .post_main_inner_wrapper .post-readmore .more-link:hover {background: '.$main_color.';color: #fff;}
		#related_item_meta a:hover{color: '.$main_color.';}
		.related_article:hover .overlayed .overlay{background:rgba('.ABdev_colors_css_hex2rgb($main_color).',0.9);}
		.previous_post:hover a,.next_post:hover a{color: '.$main_color.';}
		.previous_post:hover i,.next_post:hover i{color: '.$main_color.';}
		.comment .reply,.comment .edit-link,.comment .reply a,.comment .edit-link a{color:'.$main_color.';}
		#respond #comment-submit{background: '.$main_color.';}
		#respond #comment-submit:hover{background: #fff;color: '.$main_color.';border: 1px solid '.$main_color.';}
		#respond .comment-form textarea[id="comment"]:focus{outline-color: '.$main_color.'!important;}
		#blog_pagination .page-numbers:hover{color: '.$main_color.';}
		#blog_pagination .page-numbers.current{color: '.$main_color.';}
		#inner_post_pagination > a:hover{color: '.$main_color.';}
		aside .widget a:hover{color: '.$main_color.';}
		.widget_search i{color: '.$main_color.';}
		.widget_search input:focus{outline-color: '.$main_color.'!important;}
		.widget_categories li:after{color: '.$main_color.';}
		.tagcloud a:hover{background: '.$main_color.';color: #fff!important;}
		.sidebar .ab-tweet-item .ab-tweet-date{color: '.$main_color.';}
		.rpwe-title a:hover{color: '.$main_color.'!important;}
		.sidebar .ab-tweet-item .ab-tweet-username{color: '.$main_color.';}
		.sidebar .ab-tweet-navigation a{color: '.$main_color.';}
		.ab-tweet-username{color: '.$main_color.';}
		.ab-tweet-text a{color: '.$main_color.';}
		.ab-tweet-date{color: '.$main_color.';}
		.ab-tweet-prev:hover:after, .ab-tweet-next:hover:after{color: '.$main_color.';}
		.more-link{color: '.$main_color.';}
		.blog_category_index_right3 .post_main .post_main_inner_wrapper .post_author .post_tags a:hover,
		.blog_category_index_left3 .post_main .post_main_inner_wrapper .post_author .post_tags a:hover,
		.blog_category_index_none3 .post_main .post_main_inner_wrapper .post_author .post_tags a:hover{color:'.$main_color.';}
		.blog_category_index_right_mini .post_main .post_main_inner_wrapper .post_category a:hover,
		.blog_category_index_left_mini .post_main .post_main_inner_wrapper .post_category a:hover,
		.blog_category_index_none_mini .post_main .post_main_inner_wrapper .post_category a:hover{color:'.$main_color.';}
		.blog_category_index_dual .post_main .post_category a:hover{color:'.$main_color.';}
		.ui-state-hover .ui-icon-triangle-1-s{background:#fff;}
		.dnd_blockquote_style3 a{color:'.$main_color.';}
		.dnd_blockquote_style3 p > small a:before{background: '.$main_color.';}
		.dnd_blockquote_style3 a:hover{color:'.$main_color.';}
		.dnd_blockquote_style2 p > small a:before{background: '.$main_color.';}
		.dnd_blockquote_style2 a{color:'.$main_color.';}
		.dnd_blockquote_style2 a:hover{color:'.$main_color.';}
		.dnd_blockquote_style1 p > small a:before{background: '.$main_color.';}
		.dnd_blockquote_style1 a{color:'.$main_color.';}
		.dnd_blockquote_style1 a:hover{color:'.$main_color.';}
		#tag_cloud-3 .tagcloud a:hover{border: 1px solid '.$main_color.'; background: '.$main_color.';}
		.widget_categories li:before{color: '.$main_color.';}
		.portfolio_item_meta h2 a:hover{color: '.$main_color.';}
		.portfolio_item_view_link a{background: '.$main_color.';color: #fff;}
		.portfolio_item_view_link a:hover{background: #fff;color: '.$main_color.';border: 1px solid '.$main_color.';}
		.portfolio_filter li a.selected, .portfolio_filter li:hover, .portfolio_filter li:hover a{color: '.$main_color.';}
		#single_portfolio_pagination .prev:hover i,#single_portfolio_pagination.single_portfolio_pagination_bottom .prev:hover i{color: '.$main_color.';}
		#single_portfolio_pagination .list:hover i,#single_portfolio_pagination.single_portfolio_pagination_bottom .list:hover i{color: '.$main_color.';}
		#single_portfolio_pagination .next:hover i,#single_portfolio_pagination.single_portfolio_pagination_bottom .next:hover i{color: '.$main_color.';}
		#single_portfolio_pagination i,#single_portfolio_pagination.single_portfolio_pagination_bottom i{color: '.$main_color.';}
		.portfolio_navigation a:hover{color: '.$main_color.';border: 1px solid '.$main_color.';}
		.portfolio_2columns_description .portfolio_item_meta_detail_description h2 a:hover{color: '.$main_color.';}
		.portfolio_3columns_description .portfolio_item_meta_detail_description h2 a:hover{color: '.$main_color.';}
		.portfolio_4columns_description .portfolio_item_meta_detail_description h2 a:hover{color: '.$main_color.';}
		#portfolio_list_fullwidth .post-readmore.portfolio-readmore a.more-link{background: -webkit-linear-gradient(#fff, #f5f6f8); background: -o-linear-gradient(#fff, #f5f6f8);         background: -moz-linear-gradient(#fff, #f5f6f8);        background: linear-gradient(#fff, #f5f6f8); border: 1px solid #f5f6f8;color: '.$main_color.';}
		#portfolio_single_column .portfolio_item_meta h2 a:hover{color: '.$main_color.';}
		#portfolio_list_fullwidth .post-readmore.portfolio-readmore a.more-link:hover{background: '.$main_color.';border: 1px solid '.$main_color.';color: #fff;}
		.sidebar .ab-tweet-text a{color:'.$main_color.';}
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range{background: '.$main_color.';}
		.woocommerce a.button:hover,.woocommerce-page a.button:hover{background: '.$main_color.';color: #fff !important;}
		.woocommerce button.button.alt:hover,.woocommerce-page button.button.alt:hover{background: '.$main_color.';color: #fff !important;}
		.woocommerce div.product .woocommerce-tabs ul.tabs li:hover, .woocommerce #content div.product .woocommerce-tabs ul.tabs li:hover, .woocommerce-page div.product .woocommerce-tabs ul.tabs li:hover, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li:hover{background: '.$main_color.';color: #fff;}
		.woocommerce #review_form #respond .form-submit input:hover, .woocommerce-page #review_form #respond .form-submit input:hover{background: '.$main_color.';color: #fff!important;}
		.woocommerce .star-rating, .woocommerce-page .star-rating{color: '.$main_color.';}
		.woocommerce .woocommerce-message:before, .woocommerce-page .woocommerce-message:before{ color: '.$main_color.';}
		.woocommerce table.cart a.remove, .woocommerce #content table.cart a.remove, .woocommerce-page table.cart a.remove, .woocommerce-page #content table.cart a.remove{ color: '.$main_color.';}
		.woocommerce table.cart a.remove:hover, .woocommerce #content table.cart a.remove:hover, .woocommerce-page table.cart a.remove:hover, .woocommerce-page #content table.cart a.remove:hover{ background: '.$main_color.';}
		.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover{background: '.$main_color.';color: #fff !important;}
		.woocommerce a.added_to_cart:hover, .woocommerce-page a.added_to_cart:hover{background: '.$main_color.';color: #fff !important;}
		.woocommerce a.button.alt, .woocommerce button.button.alt,.woocommerce input.button.alt, .woocommerce #respond input#submit.alt,.woocommerce #content input.button.alt, .woocommerce-page a.button.alt,.woocommerce-page button.button.alt, .woocommerce-page input.button.alt,.woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt{background: '.$main_color.';border: 1px solid '.$main_color.';color: #fff!important;}
		.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover,.woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover,.woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover,.woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover{border: 1px solid '.$main_color.';color: '.$main_color.'!important;background: #fff;}
		.woocommerce .cart-collaterals .shipping_calculator h2 a,.woocommerce-page .cart-collaterals .shipping_calculator h2 a{background: '.$main_color.';border: 1px solid #ddd;color: #fff !important;}
		.woocommerce .woocommerce-error:before, .woocommerce-page .woocommerce-error:before{color: '.$main_color.';}
		.woocommerce .woocommerce-info:before, .woocommerce-page .woocommerce-info:before{color: '.$main_color.';}
		.woocommerce ul.products li.product.featured:before, .woocommerce-page ul.products li.product.featured:before{color: '.$main_color.';}
		.woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price,
		.woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price{color:'.$main_color.';}
		.woocommerce ul.product_list_widget li ins span, .woocommerce-page ul.product_list_widget li ins span{color:'.$main_color.';}
		.ABt_testimonials_wrapper.picture_middle .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_middle .ABt_pagination a.selected{background: '.$main_color.';}
		.ABt_testimonials_wrapper.picture_middle .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_middle .ABt_pagination a:hover{background: '.$main_color.';}
		.ABt_testimonials_wrapper.picture_bottom .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_bottom .ABt_pagination a.selected{background: '.$main_color.';}
		.ABt_testimonials_wrapper.picture_bottom .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_bottom .ABt_pagination a:hover{background: '.$main_color.';}
		.ABt_testimonials_wrapper.picture_top .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.picture_top .ABt_pagination a.selected{background: '.$main_color.';}
		.ABt_testimonials_wrapper.picture_top .ABt_pagination a:hover,.ABt_testimonials_wrapper_static.picture_top .ABt_pagination a:hover{background: '.$main_color.';}
		.ABt_testimonials_wrapper.testimonials_big .ABt_pagination a.selected,.ABt_testimonials_wrapper_static.testimonials_big .ABt_pagination a.selected{background: '.$main_color.';}
		.ABt_testimonials_wrapper.testimonials_big.ABt_pagination a:hover,.ABt_testimonials_wrapper_static.testimonials_big .ABt_pagination a:hover{background: '.$main_color.';}
		#footer_onepage_container #back_to_top:hover i{color: '.$main_color.';}
		#footer_landing_container #back_to_top:hover i{color: '.$main_color.';}
		#back_to_top:hover i{color: '.$main_color.';}
		#footer_copyright #footer_menu ul li a:hover{color: '.$main_color.';}
		.dnd_section_dd header h3{color: #222222;border-left: solid 1px '.$main_color.';border-right: solid 1px '.$main_color.';}
		.dnd_section_dd header h3:before{border-bottom: 1px solid '.$main_color.';}
		.dnd_section_dd header h3:after{border-bottom: 1px solid '.$main_color.';}
		.dnd_team_member .dnd_team_member_name:hover{color: '.$main_color.';}
		.dnd_posts_shortcode.dnd_posts_shortcode-1 .dnd_latest_news_shortcode_content h5:hover a,.dnd_posts_shortcode.dnd_posts_shortcode-2 .dnd_latest_news_shortcode_content h5:hover a{color: '.$main_color.';}
		.dnd_search .submit i:hover{color: '.$main_color.';}
		.dnd_service_box_round_text_aside_middle a:hover h3{color: '.$main_color.'!important;}
		.service_box_process_full:after{ background: '.$main_color.';}
		.service_box_process_full:first-child:after{ background: '.$main_color.';}
		.dnd_dropcap_style2{background: '.$main_color.';color: #fff;}
		.dnd_service_box_unboxed_square:hover{border-bottom: 1px solid '.$main_color.';}
		.dnd_service_box_unboxed_square:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
		.dnd_service_box_unboxed_square a h3:hover{color: '.$main_color.';}
		.dnd_service_box_boxed_inside:hover .dnd_service_box_header{background: '.$main_color.'!important;}
		.dnd_service_box_boxed:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
		.dnd_service_box_boxed a h3:hover{color: '.$main_color.';}
		.dnd_service_box_round_text_aside a h3:hover{color: '.$main_color.';}
		.dnd_service_box_round_text_aside:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
		.dnd_service_box_round_text_aside_middle:hover a.dnd_icon_boxed{background: '.$main_color.'!important;}
		.dnd_blockquote_wide .quotation_mark{color:'.$main_color.'!important;}
		.dnd_blockquote_wide p small{color:'.$main_color.'!important;}
		.dnd-accordion .ui-accordion-header-active{background: '.$main_color.'!important;}
		.ui-accordion-header.ui-state-hover{background: '.$main_color.'!important;}
		.dnd_team_member:hover .dnd_overlayed .dnd_overlay{background: '.$main_color.'!important;}
		.portfolio_item:hover .overlayed .overlay{background:rgba('.ABdev_colors_css_hex2rgb($main_color).',0.9);}
		.dnd_blockquote_style1{border-left-color: '.$main_color.';}
		.dnd_blockquote small{color:'.$main_color.';}
		.dnd_blockquote_style2:before{color:'.$main_color.';}
		.dnd_blockquote_style2:after{color:'.$main_color.';}
		.dnd_blockquote_style3{border-left-color: '.$main_color.';}
		.dnd_blockquote_style4{background:'.$main_color.';}
		.dnd_blockquote_style4 small{color: #fff;}
		.dnd-callout_box_style_5 .dnd-icon-button i:hover{color:'.$main_color.';}
		.countdown{background:'.$main_color.';}
		.dnd-tabs .ui-tabs-nav li.ui-tabs-active a{color:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-top.dnd-tabs-boxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs-position-left.dnd-tabs-boxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-top.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-top.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background:'.$main_color.';}
		.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background:'.$main_color.';}
		.dnd-tabs-position-left.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-boxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-bottom .ui-tabs-nav li.ui-tabs-active a{color:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-bottom.dnd-tabs-unboxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs-position-right.dnd-tabs-boxed .ui-tabs-nav li:hover a{background:'.$main_color.';}
		.dnd-tabs-position-right.dnd-tabs-unboxed .ui-tabs-nav li:first-child:hover a{background:'.$main_color.';}
		.dnd-tabs.dnd-tabs-position-top.dnd-tabs-unboxed .ui-tabs-nav li:last-child:hover a{background:'.$main_color.';}
		.dnd-table.dnd-table-alternative th{background:'.$main_color.';}
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{background:'.$main_color.';}
		.woocommerce span.onsale, woocommerce-page span.onsale{background: '.$main_color.';}
		.woocommerce span.featured, .woocommerce-page span.featured{color:'.$main_color.';}
		.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{color:'.$main_color.';}
		.woocommerce .gridlist-toggle a.active, .woocommerce-page .gridlist-toggle a.active{color:'.$main_color.'!important;}
		.woocommerce .gridlist-toggle a:hover, .woocommerce-page .gridlist-toggle a:hover{color:'.$main_color.'!important;}
		.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current{color:'.$main_color.';}
		.dnd_progress_bar_default .dnd_meter .dnd_meter_percentage span{color:'.$main_color.';}
		.dnd_progress_bar_thick .dnd_meter .dnd_meter_percentage span{color:'.$main_color.';}
		.dnd_progress_bar_thin .dnd_meter .dnd_meter_percentage span{color:'.$main_color.';}
		#it-exchange-store .it-exchange-base-price{color:'.$main_color.';}
		#it-exchange-store .it-exchange-product-permalink:hover{background:'.$main_color.';}
		#it-exchange-store .it-exchange-product-title a:hover{color:'.$main_color.';}
		#it-exchange-product .it-exchange-product-price .it-exchange-base-price{color:'.$main_color.';}
		.it-exchange-super-widget .two-actions .cart-action.view-cart a:hover, .it-exchange-super-widget .two-actions .cart-action.checkout a:hover{border:1px solid '.$main_color.';}
		.it-exchange-super-widget .it-exchange-sw-product input.buy-now-button{background: '.$main_color.'; border:1px solid '.$main_color.';}
		.it-exchange-super-widget .it-exchange-sw-product input.buy-now-button:hover{background: #ddd;}
		.it-exchange-super-widget .it-exchange-sw-product input.add-to-cart-button{background: '.$main_color.'; border:1px solid '.$main_color.';}
		.it-exchange-super-widget .it-exchange-sw-product input.add-to-cart-button:hover{background: #ddd;}
		.it-exchange-super-widget .cart-action.add-coupon a.it-exchange-cancel-checkout.sw-cart-focus-coupon:hover, .it-exchange-super-widget .cart-action.update-quantity a.it-exchange-cancel-checkout.sw-cart-focus-quantity:hover {border:1px solid '.$main_color.';}
		.woocommerce .yith-wcwl-add-button a, .woocommerce-page .yith-wcwl-add-button a{background: '.$main_color.'; border:1px solid '.$main_color.';}
		.woocommerce .yith-wcwl-add-button a:hover, .woocommerce-page .yith-wcwl-add-button a:hover{color: '.$main_color.';}
		';
}

if(isset($vozx_options['secondary_color']) && $vozx_options['secondary_color'] != ''){ 
	$secondary_color = $vozx_options['secondary_color'];
	$custom_css.= '
		.dnd-table-striped table tr:nth-child(2n){background:'.$secondary_color.';}
		';
}

