<?php
/**
	ReduxFramework Sample Config File
	For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
**/

if ( !class_exists( "ReduxFramework" ) ) {
	return;
} 


if ( !class_exists( "VozX_Redux_Framework_config" ) ) {
	class VozX_Redux_Framework_config {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct( ) {
			$this->theme = wp_get_theme();
			$this->setArguments();
			$this->setSections();
			if ( !isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}
			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
		}


		/**
			All the possible arguments for Redux.
			For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 **/
		public function setArguments() {
			$theme = wp_get_theme(); // For use with some settings. Not necessary.
			$this->args = array(
	            // TYPICAL -> Change these values as you need/desire
				'opt_name'          	=> 'vozx_options', // This is where your data is stored in the database and also becomes your global variable name.
				'display_name'			=> $theme->get('Name'), // Name that appears at the top of your panel
				'display_version'		=> $theme->get('Version'), // Version that appears at the top of your panel
				'menu_type'          	=> 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'     	=> true, // Show the sections below the admin menu item or not
				'menu_title'			=> __( 'VozX Options', 'ABdev_vozx' ),
	            'page'		 	 		=> __( 'VozX Options', 'ABdev_vozx' ),
	            'google_api_key'   	 	=> '', // Must be defined to add google fonts to the typography module
	            'global_variable'    	=> '', // Set a different name for your global variable other than the opt_name
	            'dev_mode'           	=> false, // Show the time the page took to load, etc
	            'customizer'         	=> true, // Enable basic customizer support
	            // OPTIONAL -> Give you extra features
	            'page_priority'      	=> null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	            'page_parent'        	=> 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	            'page_permissions'   	=> 'manage_options', // Permissions needed to access the options panel.
	            'menu_icon'          	=> '', // Specify a custom URL to an icon
	            'last_tab'           	=> '', // Force your panel to always open to a specific tab (by id)
	            'page_icon'          	=> 'icon-themes', // Icon displayed in the admin panel next to your menu_title
	            'page_slug'          	=> '_options', // Page slug used to denote the panel
	            'save_defaults'      	=> true, // On load save the defaults to DB before user clicks save or not
	            'default_show'       	=> false, // If true, shows the default value next to each field that is not the default value.
	            'default_mark'       	=> '', // What to print by the field's title if the value shown is default. Suggested: *
	            // CAREFUL -> These options are for advanced use only
	            'transient_time' 	 	=> 60 * MINUTE_IN_SECONDS,
	            'output'            	=> true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	            'output_tab'            => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	            //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
	            'footer_credit'      	=> ' ', // Disable the footer credit of Redux. Please leave if you can help it.
	            // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	            'database'           	=> '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	            'show_import_export' 	=> true, // REMOVE
	            'system_info'        	=> false, // REMOVE
	            'allow_tracking'        => false, // REMOVE
	            'help_tabs'          	=> array(),
	            'help_sidebar'       	=> '', // __( '', $this->args['domain'] );            
				);
			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
			$this->args['share_icons'][] = array(
			    'url' => 'http://themeforest.net/user/ab-themes',
			    'title' => 'Visit us on TeamForest', 
			    'icon' => 'el-icon-leaf'
			    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
			);		
			$this->args['share_icons'][] = array(
			    'url' => 'http://twitter.com/ab_themes_com',
			    'title' => 'Follow us on Twitter', 
			    'icon' => 'el-icon-twitter'
			);
		}


		/**
			Sections and fields declaration
		 **/
		public function setSections() {

			$this->sections[] = array(
				'title' => __('General', 'ABdev_vozx'),
				'icon' => 'el-icon-cogs',
				'fields' => array(
					array(
						'id'          => 'disable_responsiveness',
						'title'       => __('Disable Responsiveness', 'ABdev_vozx'),
						'desc'        => '',
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'favicon',
						'title'       => __('Favicon', 'ABdev_vozx'),
						'desc'        => '',
						'type'        => 'media',
					),
					array(
						'id'          => 'boxed_body',
						'title'       => __('Boxed Body', 'ABdev_vozx'),
						'desc'        => '',
						'type'        => 'checkbox',
					),
					array(
					    'id' => 'body_background',
					    'type' => 'background',
					    'default' => array(),
					    'output' => array('body'),
						'title'       => __('Body Background', 'ABdev_vozx'),
						'desc'        => __('This option works only with Boxed Body option enabled', 'ABdev_vozx'),
					),
					array(
						'id'          => 'hide_comments',
						'title'       => __('Hide Comments', 'ABdev_vozx'),
						'desc'        => __('Check this to hide WordPress commenting system', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'hide_author_bio',
						'title'       => __('Hide Author Bio', 'ABdev_vozx'),
						'desc'        => __('Check this to hide author biography under post content', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'enable_preloader',
						'title'       => __('Use Preloader', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'custom_css',
						'title'       => __('Custom CSS', 'ABdev_vozx'),
						'desc'        => __('Here you can place additional CSS or CSS to override theme\'s styles', 'ABdev_vozx'),
						'type'        => 'textarea',
						'validate' => 'css',
						'type' => 'ace_editor',
						'mode' => 'css',
			            'theme' => 'monokai',
					),
					array(
						'id'          => 'analytics_code',
						'title'       => __('Analytics Code', 'ABdev_vozx'),
						'desc'        => __('Here you can paste Google Analytics (or similar, html valid) code to be printed out on every page just before closing body tag', 'ABdev_vozx'),
						'type'        => 'textarea',
						'type' => 'ace_editor',
						'mode' => 'javascript',
			            'theme' => 'monokai',
					),
					array(
						'id'		  => '404_page',
						'title'		  => __('Choose 404 Page', 'ABdev_vozx'),
						'desc'		  => __('Default 404 page', 'ABdev_vozx'),
						'type'		  => 'select',
						'data'		  => 'pages',
					),
				)
			);

			$this->sections[] = array(
				'title' => __('Header', 'ABdev_vozx'),
				'icon' => 'el-icon-credit-card',
				'fields' => array(
					array(
						'id'=>'header_layout',
						'type' => 'select',
						'title' => __('Header Layout', 'ABdev_vozx'), 
						'options' => array(
							'default' => __('Default Header', 'ABdev_vozx'),
							'transparent' => __('Transparent Header', 'ABdev_vozx'),
							'centered' => __('Centered Header', 'ABdev_vozx'),
							'1' => __('Header Layout 1', 'ABdev_vozx'),
							'2' => __('Header Layout 2', 'ABdev_vozx'),
							'3' => __('Header Layout 3', 'ABdev_vozx'),
							'4' => __('Header Layout 4', 'ABdev_vozx'),
						),
						'default' => 'default'
					),
					array(
						'id'          => 'header_logo',
						'title'       => __('Header Logo', 'ABdev_vozx'),
						'desc'        => __('Upload header logo', 'ABdev_vozx'),
						'type'        => 'media',
					),
					array(
						'id'          => 'inverted_header_logo',
						'title'       => __('Inverted Header Logo', 'ABdev_vozx'),
						'desc'        => __('Upload inverted header logo, to use over slider', 'ABdev_vozx'),
						'type'        => 'media',
					),
					array(
						'id'          => 'header_logo_coming_soon',
						'title'       => __('Header Logo - Coming Soon', 'ABdev_vozx'),
						'desc'        => __('Upload header logo for Coming soon page', 'ABdev_vozx'),
						'type'        => 'media',
					),																																																												
					array(
						'id'          => 'show_top_bar',
						'title'       => __('Show Top Bar', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'show_login_top_bar',
						'title'       => __('Show Login/Logout', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'header_with_sticky',
						'title'       => __('Hide TopBar on Scroll', 'ABdev_vozx'),
						'desc'        => '',
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'header_with_switch',
						'title'       => __('Switch Menu on Transparent Header', 'ABdev_vozx'),
						'desc'        => 'This option work only with a Transparent Header. Transparent menu will dissapear on scroll, and then appear solid after Revolution slider.',
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'hide_title_breadcrumbs_bar',
						'title'       => __('Hide Title/Breadcrumbs Bar', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'hide_title_from_bar',
						'title'       => __('Hide Title From Bar', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'hide_breadcrumbs_from_bar',
						'title'       => __('Hide Breadcrumbs From Bar', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'headline_title',
						'title'       => __('Headline Title', 'ABdev_vozx'),
						'desc'		  => __('Put the optional title in the breadcrumbs title bar', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
					    'id' => 'headline_breadcrumbs_bar_background',
					    'type' => 'background',
					    'default' => array(
					    	'background-color' => '#e4664d',
					    	),
					    'output' => array('#headline_breadcrumbs_bar'),
					    'title' => __('Title Bar Background', 'ABdev_vozx'),
					),
					array(
					    'id' => 'title_breadcrumbs_bar_background',
					    'type' => 'background',
					    'default' => array(
					    	'background-color' => '#e4664d',
					    	),
					    'output' => array('#title_breadcrumbs_bar'),
					    'title' => __('Breadcrumbs Bar Background', 'ABdev_vozx'),
					),
					array(
					    'id' => 'coming_soon_header_background',
					    'type' => 'background',
					    'default' => array(
					    	'background-color' => '#e4664d',
					    	),
					    'output' => array('#coming_soon_header'),
					    'title' => __('Coming Soon Header Background', 'ABdev_vozx'),
					)
				)
			);	

			$this->sections[] = array(
				'title' => esc_attr__('Header Social Icons', 'ABdev_vozx'),
				'icon' => 'el-icon-group',
				'subsection' => true,
				'fields' => array(
					array(
						'id'          => 'header_address',
						'title'       => esc_attr__('Address Info', 'ABdev_vozx'),
						'desc'        => esc_attr__('Enter address for quick contact', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_phone',
						'title'       => esc_attr__('Phone Info', 'ABdev_vozx'),
						'desc'        => esc_attr__('Enter phone number for quick contact', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_email',
						'title'       => esc_attr__('Email Info', 'ABdev_vozx'),
						'desc'        => esc_attr__('Enter email address for quick contact', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_linkedin_url',
						'title'       => esc_attr__('Linkedin Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_facebook_url',
						'title'       => esc_attr__('Facebook Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_skype_url',
						'title'       => esc_attr__('Skype Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_googleplus_url',
						'title'       => esc_attr__('Google+ Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_twitter_url',
						'title'       => esc_attr__('Twitter Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_youtube_url',
						'title'       => esc_attr__('Youtube Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_pinterest_url',
						'title'       => esc_attr__('Pinterest Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_github_url',
						'title'       => esc_attr__('Github Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_feed_url',
						'title'       => esc_attr__('Feed Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_behance_url',
						'title'       => esc_attr__('Behance Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_blogger_url',
						'title'       => esc_attr__('Blogger Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_delicious_url',
						'title'       => esc_attr__('Delicious Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_designContest_url',
						'title'       => esc_attr__('DesignContest Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_deviantART_url',
						'title'       => esc_attr__('DeviantART Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_digg_url',
						'title'       => esc_attr__('Digg Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_dribbble_url',
						'title'       => esc_attr__('Dribbble Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_dropbox_url',
						'title'       => esc_attr__('Dropbox Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_email_url',
						'title'       => esc_attr__('Email Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_flickr_url',
						'title'       => esc_attr__('Flickr Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_forrst_url',
						'title'       => esc_attr__('Forrst Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_instagram_url',
						'title'       => esc_attr__('Instagram Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_last.fm_url',
						'title'       => esc_attr__('Last.fm Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_myspace_url',
						'title'       => esc_attr__('Myspace Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_picasa_url',
						'title'       => esc_attr__('Picasa Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_stumbleUpon_url',
						'title'       => esc_attr__('StumbleUpon Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_vimeo_url',
						'title'       => esc_attr__('Vimeo Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'header_zerply_url',
						'title'       => esc_attr__('Zerply Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'		  =>'header_social_target',
						'type' 	 	  => 'select',
						'title' 	  => esc_attr__('Links Target', 'ABdev_vozx'), 
						'options' => array('_self' => '_self','_blank' => '_blank'),
						'default' 	  => '_blank'
					),
				)
			);


			$this->sections[] = array(
				'title' => __('Icons', 'ABdev_vozx'),
				'icon' => 'el-icon-picture',
				'fields' => array(
					array(
						'id'          => 'disable_icon_font',
						'title'       => __('Disable Theme Icon Font', 'ABdev_vozx'),
						'desc'       => __("If you don't use theme's icons (e.g. you have Font Awesome or WHHG enabled in Drag and Drop settings) you can disable theme's icon set.", 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
					array(
						'id'          => 'icon_font_info',
						'title'       => __("Complete theme's icons names list", 'ABdev_vozx'),
						'desc'       => __('<br>Icon list with all icons and their names can be found <a href="'.esc_url(get_template_directory_uri()).'/css/icons/demo.html" target="_blank">here</a>.', 'ABdev_vozx'),
						'type'        => 'info',
						'style'        => 'info',
					),
				)
			);

			$this->sections[] = array(
				'title' => __('Woocommerce', 'ABdev_vozx'),
				'icon' => 'el-icon-shopping-cart',
				'fields' => array(
					array(
						'id'	=> 'shop_title',
						'title'       => __('Shop Title', 'ABdev_vozx'),
						'desc'		  => __('Put the Title of the shop page here. Convenient if you are using the catalog option.', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
					    'id'       => 'column_number',
					    'type'     => 'image_select',
					    'title'    => __('Products per row', 'ABdev_vozx'),
						'subtitle' => __('Select how many products to show. Choose between 3, 4 or 5 products per row.', 'ABdev_vozx'),
					    'options'  => array(
					        '3'      => array(
					            'alt'   => '3 Column', 
								'img' 	=> IMAGES.'/3col.png'
					        ),
					        '4'      => array(
					            'alt'   => '4 Column', 
					            'img'   => IMAGES.'/4col.png'
					        ),
					        '5'      => array(
					            'alt'   => '5 Column', 
					            'img'  	=> IMAGES.'/5col.png'
					        )
					    ),
					    'default' => '3'
					),
					array(
					    'id'       => 'woocommerce_layout',
					    'type'     => 'image_select',
					    'title'    => __('Shop Layout', 'ABdev_vozx'),
						'subtitle' => __('Choose the product archive layout.', 'ABdev_vozx'),
					    'options'  => array(
					        'left_sidebar'      => array(
					            'alt'   => 'Left Sidebar', 
								'img' 	=> IMAGES.'/left_sidebar.png'
					        ),
					        'right_sidebar'      => array(
					            'alt'   => 'Right Sidebar', 
					            'img'   => IMAGES.'/right_sidebar.png'
					        ),
					        'no_sidebar'      => array(
					            'alt'   => 'No Sidebar', 
					            'img'  	=> IMAGES.'/no_sidebar.png'
					        )
					    ),
					    'default' => 'right_sidebar'
					),
					array(
					    'id'        => 'shop_sidebar',
					    'type'      => 'select',
					    'data'      => 'sidebars',
					    'title'     => __('Shop Sidebar', 'ABdev_vozx'),
					    'desc'      => __('Choose the sidebar you wish to appear on shop pages.', 'ABdev_vozx'),
					),
					array(
						'id'          => 'woocommerce_catalog',
						'title'       => __('Catalog Mode', 'ABdev_vozx'),
						'desc'        => __('Check this to hide Buy and Add to Cart buttons. To be used as catalog.', 'ABdev_vozx'),
						'type'        => 'select',
						'options' => array(
							'disabled' => __('Disabled', 'ABdev_vozx'),
							'with_prices' => __('With prices', 'ABdev_vozx'),
							'without_prices' => __('Without prices', 'ABdev_vozx'),
						),
						'default' => 'disabled'
					),
					array(
						'id'          => 'consider_new',
						'title'       => __('No. of Days Product is New', 'ABdev_vozx'),
						'desc'        => __('Number of days product is considered new. It will have "New" badge.', 'ABdev_vozx'),
						'type'        => 'text',
						'default'     => '5',
					),
				)
			);

			$this->sections[] = array(
				'title' => __('Exchange', 'ABdev_vozx'),
				'icon' => 'el-icon-shopping-cart',
				'fields' => array(
					array(
					    'id'       => 'exchange_column_number',
					    'type'     => 'image_select',
					    'title'    => __('Products per row', 'ABdev_vozx'),
						'subtitle' => __('Select how many products to show. Choose between 2, 3, 4 or 5 products per row.', 'ABdev_vozx'),
					    'options'  => array(
					    	'2'      => array(
					            'alt'   => '2 Column', 
								'img' 	=> IMAGES.'/2col.png'
					        ),
					        '3'      => array(
					            'alt'   => '3 Column', 
								'img' 	=> IMAGES.'/3col.png'
					        ),
					        '4'      => array(
					            'alt'   => '4 Column', 
					            'img'   => IMAGES.'/4col.png'
					        ),
					        '5'      => array(
					            'alt'   => '5 Column', 
					            'img'  	=> IMAGES.'/5col.png'
					        )
					    ),
					    'default' => '3'
					),
					array(
						'id'          => 'exchange_catalog',
						'title'       => __('Catalog Mode', 'ABdev_vozx'),
						'type'        => 'select',
						'options' => array(
							'disabled' => __('Disabled', 'ABdev_vozx'),
							'with_prices' => __('With prices', 'ABdev_vozx'),
							'without_prices' => __('Without prices', 'ABdev_vozx'),
						),
						'default' => 'disabled'
					),
					array(
						'id'          => 'exchange_categories_show',
						'title'       => __('Show categories on products', 'ABdev_vozx'),
						'desc'        => __('Check this if you want to show categories on product page.', 'ABdev_vozx'),
						'type'        => 'checkbox',
					),
				)
			);


			$this->sections[] = array(
				'title' => __('Sidebars', 'ABdev_vozx'),
				'icon' => 'el-icon-lines',
				'fields' => array(
					array(
						'id'          => 'sidebars',
						'title'       => 'Sidebars',
						'desc'        => __('Add as many custom sidebars as you need', 'ABdev_vozx'),
						'type' => 'multi_text',
					),
				)
			);


			$this->sections[] = array(
				'title' => __('Colors', 'ABdev_vozx'),
				'icon' => 'el-icon-brush',
				'fields' => array(
					array(
						'id'          => 'main_color',
						'title'       => __('Main Color', 'ABdev_vozx'),
						'default' => '#e4664d',
						'type' => 'color',
						'validate' => 'color'
					),
					array(
						'id'          => 'secondary_color',
						'title'       => __('Secondary Color', 'ABdev_vozx'),
						'default' => '#e2401f',
						'type' => 'color',
						'validate' => 'color'
					),
				)
			);
			

			$this->sections[] = array(
				'title' => __('Portfolio', 'ABdev_vozx'),
				'icon' => 'el-icon-book',
				'fields' => array(
					array(
						'id'          => 'content_after_portfolio',
						'title'       => __('Additional Content After Portfolio Pages', 'ABdev_vozx'),
						'desc'        => __('Enter content to be shown at the bottom of Portfolio page, before footer.', 'ABdev_vozx'),
						'type'        => 'editor',
					),
					array(
						'id'		  => 'list_link',
						'title'		  => __('Pagination List Page', 'ABdev_vozx'),
						'desc'		  => __('Default page for List page in portfolio pagination', 'ABdev_vozx'),
						'type'		  => 'select',
						'data'		  => 'pages',
					),
				)
			);

			$this->sections[] = array(
				'title' => __('Footer', 'ABdev_vozx'),
				'icon' => 'el-icon-credit-card',
				'fields' => array(
					array(
						'id'          => 'footer_logo',
						'title'       => __('Footer Logo', 'ABdev_vozx'),
						'desc'        => __('Upload footer logo', 'ABdev_vozx'),
						'type'        => 'media',
					),
					array(
						'id'          => 'copyright',
						'title'       => __('Copyright Notice', 'ABdev_vozx'),
						'desc'        => __('Enter copyright notice to be shown in footer', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'linkedin_url',
						'title'       => __('Linkedin Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'facebook_url',
						'title'       => __('Facebook Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'skype_url',
						'title'       => __('Skype Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'googleplus_url',
						'title'       => __('Google+ Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id'          => 'twitter_url',
						'title'       => __('Twitter Profile', 'ABdev_vozx'),
						'type'        => 'text',
					),
					array(
						'id' => 'youtube_url',
						'title' => __('Youtube URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'pinterest_url',
						'title' => __('Pinterest URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'github_url',
						'title' => __('Github URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'feed_url',
						'title' => __('Feed URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'behance_url',
						'title' => __('Behance URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'blogger_blog_url',
						'title' => __('Blogger URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'delicious_url',
						'title' => __('Delicious URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'designcontest_url',
						'title' => __('DesignContest URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'deviantart_url',
						'title' => __('DeviantART URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'digg_url',
						'title' => __('Digg URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'dribbble_url',
						'title' => __('Dribbble URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'dropbox_url',
						'title' => __('Dropbox URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'flickr_url',
						'title' => __('Flickr URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'forrst_url',
						'title' => __('Forrst URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'instagram_url',
						'title' => __('Instagram URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'lastfm_url',
						'title' => __('Last.fm URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'myspace_url',
						'title' => __('Myspace URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'picasa_url',
						'title' => __('Picasa URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'stumbleupon_url',
						'title' => __('StumbleUpon URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'vimeo_url',
						'title' => __('Vimeo URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id' => 'zerply_url',
						'title' => __('Zerply URL', 'ABdev_vozx'),
						'type' => 'text'
					),
					array(
						'id'=>'footer_social_target',
						'type' => 'select',
						'title' => __('Links Target', 'ABdev_vozx'), 
						'options' => array('_self' => '_self','_blank' => '_blank'),
						'default' => '_blank'
					),

				)
			);

  
		}	


	}
	new VozX_Redux_Framework_config();
}

