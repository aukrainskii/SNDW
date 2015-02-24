jQuery(document).ready(function($) {
    "use strict";

    $('body.preloader').jpreLoader({
        showSplash : false,
        loaderVPos : '50%',
    }).css('visibility','visible');


    $(".scroll").click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var hash = href.split('#');
        var url_hash = '#' + hash[1];
        if ($(url_hash).length > 0) {
            var offset = ($(window).width()<968) ? 20 : 100;
            $('html, body').animate({
                scrollTop: $(url_hash).offset().top-offset
            }, 1000);
        } 
        else{
            location.href = href;
        }
        if($(window).width()<968){
            var $menu_responsive = $('#ABdev_main_header nav');
            $menu_responsive.animate({width:'toggle'},350);
        }
    });


    $('#back_to_top').click(function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 900);
        return false;
    });

    //Woocommerce tweaks

   $("a.woocommerce-review-link").click(function(e){
       e.preventDefault();
       $(".woocommerce-tabs>ul.tabs>li.reviews_tab>a").click();
       $('html, body').animate({scrollTop: $(".woocommerce-tabs").offset().top-100}, 1000);
   });

    $(window).load(function(){
    
        var $product_image = $('.woocommerce ul.products li.product > a img');
        var $product_button = $('.woocommerce ul.products li.product a.button');

        $product_button.each(function() {
            var $image_height = $product_image.outerHeight()/2;
            $(this).css({'margin-left': - $(this).outerWidth()/2 + 'px', 'top' : $image_height + 'px'});
        });
    });

    //Menu Cart hover

    var menu_cart = $('#shop_links'), subelement = menu_cart.find('.cart_dropdown_widget').css({display:'none', opacity: 0});

    if(subelement.find('h2').length>0){
        menu_cart.hover(
            function(){ subelement.css({display:'block'}).stop().animate({opacity:1}); },
            function(){ subelement.stop().animate({opacity:0}, function(){ subelement.css({display:'none'}); }); }
        );
    }

    //List/Grid toggle 

    $( document ).ready(function() {
        $('.woocommerce .gridlist-toggle a#grid').empty().append('<i class="ci_icon-th"></i>');
        $('.woocommerce .gridlist-toggle a#list').empty().append('<i class="ci_icon-th-list"></i>');
    });

    //Exchange tweaks

    $(window).load(function(){
    
        var $product_image_ex = $('#it-exchange-store .featured-image-wrapper img');
        var $product_button_ex = $('#it-exchange-store .it-exchange-product-permalink');
        var $image_height_ex = $product_image_ex.outerHeight()/2;

        $product_button_ex.css({'margin-left': - $product_button_ex.outerWidth()/2 + 'px', 'top' : $image_height_ex + 'px'});
    });


    $('.home.page .dnd_section_DD').waypoint(function(direction) {
        var section_id = $(this).attr('id');
        if(section_id!==undefined){
            $('.current-menu-item, .current-menu-ancestor').removeClass('current-menu-item').removeClass('current-menu-ancestor');
            if(direction==='down'){
                var $menu_item = $('#main_menu a[href=#'+section_id+']').parent();
                if($menu_item.length>0){
                    $menu_item.addClass('current-menu-item');
                }
                else{
                    $('#main_menu .current_page_item').addClass('current-menu-item');
                }
            }
            else if(direction==='up'){
                var previous_section_id = $(this).prevAll('[id]:first').attr('id');
                var $menu_item = $('#main_menu a[href=#'+previous_section_id+']').parent();
                if($menu_item.length>0){
                    $menu_item.addClass('current-menu-item');
                }
                else{
                    $('#main_menu .current_page_item').addClass('current-menu-item');
                }
            }
        }
    },{
      offset: 100
    });

    var $main_slider = $('#ABdev_main_slider');
    $main_slider.height('auto');
    var $main_header = $('#ABdev_main_header');
    var $header_spacer = $('#ABdev_header_spacer');
    var $sticky_main_header = $('.sticky_main_header');
    var $switch_main_header = $('.switch_main_header');

    $('#ABdev_main_slider.ABdev_parallax_slider').height($(window).height());

    var header_height = $main_header.outerHeight();

    $header_spacer.height(header_height);
    // $header_spacer.height(header_height).hide();
    var admin_toolbar_height = parseInt($('html').css('marginTop'), 10);

    var $topBar = $('#top_bar');
    var topBar_height = $topBar.outerHeight();
    

    var $main_logo = $('#main_logo');
    var $inverted_logo = $('#inverted_logo');


    function header_switch(){

        var $header_spacer_transparent = $('#ABdev_header_spacer_transparent');

         if($(document).scrollTop() < $main_slider.height() && $(window).width()>979){
             if($(document).scrollTop() < $switch_main_header.height()){
                $header_spacer_transparent.remove();
                $switch_main_header.addClass('transparent').removeClass('default').fadeIn();
                $main_logo.hide();
                $inverted_logo.show();
             }
             else{
                 $switch_main_header.fadeOut();
             }
         }
         else{
             $switch_main_header.removeClass('transparent').addClass('default').slideDown();
             var default_height = $switch_main_header.outerHeight();
             $main_logo.show();
             $inverted_logo.hide();
             $header_spacer_transparent.height(default_height);
         }
    }

    function sticky_header(){
                $(document).scroll(function(){
                    header_switch();
                    var scrollTop = parseInt($(document).scrollTop() ,10);
                    if(scrollTop>19 && $(window).width()>979){
                        $sticky_main_header.addClass('sticky_header_low');
                    }
                    else{
                        $sticky_main_header.removeClass('sticky_header_low');
                    }
                });
            }
        

        sticky_header();
        header_switch();

    /* centered menu */

    function menu_scroll(){

        var $header_spacer_center = $('#ABdev_header_spacer_center');
        var $main_header_centered = $('#ABdev_main_header.header_layout_centered');

        if($(window).width()>767 && $main_slider.length > 0){
            $(document).scroll(function(){
                var scrollTop = parseInt($(document).scrollTop() ,10);
                $header_spacer_center.remove();
                if(scrollTop > 20){
                    $main_header_centered.addClass('smaller fixed');
                }
                else{
                    $main_header_centered.removeClass('smaller fixed');
                }
            });
        } else{
            $main_header_centered.addClass('smaller fixed');
            $header_spacer_center.height(91);
        }   
    }    
    menu_scroll();

    /* Logo in the middle nav */

    var $menu_centered_logo = $('#ABdev_main_header.header_layout_centered #main_menu > li');
    var $centered_logo = $('#ABdev_main_header.header_layout_centered #logo').detach();
    var position = parseInt(($menu_centered_logo.length-1)/2);
    $menu_centered_logo.eq(position).after($centered_logo);
    $centered_logo.wrap('<li class="main_menu_item_logo"></li>').show().parent().prev().addClass('menu_item_before_centered_logo');

    // Search toggle
    $('.search-icon').on('click', function(e) {
        e.preventDefault();
        var $that = $(this);
        var $wrapper = $('.search-box-wrapper');

        $that.toggleClass('active');
        $wrapper.slideToggle('300');

        if ($that.hasClass('active')) {
            $wrapper.find('input').focus();
        }
    });

    /*Megamenu tweak*/

    var search_container = $('.search-toggle').outerWidth(true);

    $('#ABdev_main_header.header_layout_4').find('.sf-mega').css('margin-right', '-' + search_container + 'px');
    $('#ABdev_main_header.transparent').find('.sf-mega').css('margin-right', '-' + search_container + 'px');
    $('#ABdev_main_header.header_layout_2').find('.sf-mega').css('margin-right', '-' + search_container + 'px');



    $('.accordion-group').on('show', function() {
        $(this).find('i').removeClass('icon-plus').addClass('icon-minus');
    });
    $('.accordion-group').on('hide', function() {
        $(this).find('i').removeClass('icon-minus').addClass('icon-plus');
    });


    var $sf = $('#main_menu');
    if($('#ABdev_menu_toggle').css('display') === 'none') {
        // enable superfish when the page first loads if we're on desktop
        $sf.superfish({
            delay:          300,
            animation:      {opacity:'show',height:'show'},
            animationOut:   {height:'hide'},
            speed:          'fast',
            speedOut:       'fast',            
            cssArrows:      false, 
            disableHI:      true /* load hoverIntent.js in header to use this option */,
            onBeforeShow:   function(){
                var ww = $(window).width();
                if(this.parent().offset() !== undefined){
                    var locUL = this.parent().offset().left + this.width();
                    var locsubUL = this.parent().offset().left + this.parent().width() + this.width();
                    var par = this.parent();
                    if(par.parent().is('#main_menu') && (locUL > ww)){
                        this.css('marginLeft', "-"+(locUL-ww+20)+"px");
                    }
                    else if (!par.parent().is('#main_menu') && (locsubUL > ww)){
                        this.css('left', "-"+(this.width())+"px"); 
                    }
                }
            }
        });
    }


    $('.dnd-tabs-timeline').each(function(){
        var $this = $(this);
        var $tabs = $this.find('.dnd-tabs-ul > li');
        var tabsCount = $tabs.length;
        $tabs.addClass('tab_par_'+tabsCount);
    });


    $(".fancybox").fancybox({
        'transitionIn'      : 'elastic',
        'transitionOut'     : 'elastic',
        'titlePosition'     : 'over',
        'cyclic'            : true,
        'overlayShow'       : true,
        'titleFormat'       : function(title, currentArray, currentIndex) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });

    var $menu_responsive = $('#ABdev_main_header nav');
    $('#ABdev_menu_toggle').click(function(){
        $menu_responsive.animate({width:'toggle'},350);
    });
    

    $(".submit").click(function () {
        $(this).closest("form").submit();
    });


    $('input, textarea').placeholder();

    
    var $content = $("#timeline_posts");
    var $loader = $("#timeline_loading");
    var itemSelector = ('.timeline_post');
    function Timeline_Classes(){ 
        $content.find(itemSelector).each(function(){
           var posLeft = $(this).css("left");
           if(posLeft == "0px"){
               $(this).removeClass('timeline_post_right').addClass('timeline_post_left');          
           }
           else{
               $(this).removeClass('timeline_post_left').addClass('timeline_post_right');
           } 
        });
    }
    $content.imagesLoaded( function() {
        $content.masonry({
          columnWidth: ".timeline_post_first",
          gutter: 100,
          itemSelector: itemSelector,
        });
        Timeline_Classes();
        $loader.bind('inview', function(event, isInView) {
          if (isInView) {
            pageNumber++;
            load_posts();
          }
        });
    });

    var pageNumber = 1;
    var cat = $loader.data('category');

    function load_posts(){
        var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&action=abdev_get_timeline_posts';
        $.ajax({
            type: "POST",
            dataType   : "html",
            url: abdev_timeline_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    var $newElements = $data.css({ opacity: 0 });
                    $content.append( $newElements );
                    $content.imagesLoaded(function(){
                        $loader.removeClass('timeline_loading_loader');
                        $content.masonry( 'appended', $newElements, false );
                        $newElements.animate({ opacity: 1 });
                        Timeline_Classes();
                    }); 
                } else {
                    $loader.removeClass('timeline_loading_loader').html(abdev_timeline_posts.noposts);
                }
            },
            beforeSend : function(){
                    $loader.addClass('timeline_loading_loader').html('');
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            },
            complete : function(){
                Timeline_Classes();
            }
        });
        return false;
    }


    



/*  isotope portfolio  */
    var sortBy = 'original-order';
    var columnWidth = '.portfolio_item';

    $('.ABdev_latest_portfolio').each(function(){
        var $current_portfolio = $(this);
        if( $current_portfolio.find('.portfolio_item').hasClass('portfolio_masonry_fullwidth')){
            sortBy = 'random';
            columnWidth = '.portfolio_item.small';
        }
        $current_portfolio.imagesLoaded( function() {
            $current_portfolio.isotope({
                layoutMode: 'masonry',
                masonry: {
                  columnWidth: columnWidth
                },
                itemSelector : '.portfolio_item',
                sortBy: sortBy
            });
        });
    });

    $('.portfolio_filter_button').click(function(){
        var $portfolio_filter_clicked_button = $(this);
        if ( $portfolio_filter_clicked_button.hasClass('selected') ) {
            return false;
        }
        var $portfolio_filter = $portfolio_filter_clicked_button.parents('.portfolio_filter');
        $portfolio_filter.find('.selected').removeClass('selected');
        $portfolio_filter_clicked_button.addClass('selected');
        var options = {},
            key = $portfolio_filter.attr('data-option-key'),
            value = $portfolio_filter_clicked_button.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            changeLayoutMode( $portfolio_filter_clicked_button, options );
        } else {
            $portfolio_filter.next('.ABdev_latest_portfolio').isotope( options );
        }
        return false;
    });

    
    $(window).load(function() {
        
        
    /* carouFredSel */

    $('.ABp_latest_portfolio').each(function (){
        var $prev = $(this).find('.portfolio_prev');
        var $next = $(this).find('.portfolio_next');
        $(this).find('ul').carouFredSel({
            prev: $prev,
            next: $next,
            auto: false,
            width: '100%',
            scroll: 1,
        });
        
    });

    $('.dnd-carousel').each(function (){
        var $prev = $(this).find('.carousel_prev');
        var $next = $(this).find('.carousel_next');

        var $autoPlay = $(this).data("autoplay") == '0' ? false : true;
        var $items = $(this).data("items");
        var $effect = $(this).data("effect");
        var $easing = $(this).data("easing");
        var $duration = $(this).data("duration");

        $(this).find('ul').carouFredSel({
            prev: $prev,
            next: $next,
            width: '100%',
            play: true,
            auto: $autoPlay,
            scroll: {
                items: $items,
                fx: $effect,
                easing: $easing,
                duration: $duration,
            }
        });
    });

    });


    $(window).resize(function() {

        Timeline_Classes();

        // sticky_header();
        
        $('.ABdev_latest_portfolio').isotope('layout');

        if($('#ABdev_menu_toggle').css('display') === 'none' && !$sf.hasClass('sf-js-enabled')) {
            // you only want SuperFish to be re-enabled once ($sf.hasClass)
            $menu_responsive.show();
            $sf.superfish({
                delay:          300,
                animation:      {opacity:'show',height:'show'},
                animationOut:   {height:'hide'},
                speed:          'fast',
                speedOut:       'fast',            
                cssArrows:      false, 
                disableHI:      true /* load hoverIntent.js in header to use this option */,
                onBeforeShow:   function(){
                    this.css('marginLeft', "0px");
                    var ww = $(window).width();
                    var locUL = this.parent().offset().left + this.width();
                    var locsubUL = this.parent().offset().left + this.parent().width() + this.width();
                    var par = this.parent();
                    if(par.parent().is('#main_menu') && (locUL > ww)){
                        this.css('marginLeft', "-"+(locUL-ww+20)+"px");
                    }
                    else if (!par.parent().is('#main_menu') && (locsubUL > ww)){
                        this.css('left', "-"+(this.width())+"px"); 
                    }
                }
            });
        } else if($('#ABdev_menu_toggle').css('display') != 'none' && $sf.hasClass('sf-js-enabled')) {
            // smaller screen, disable SuperFish
            $sf.superfish('destroy');
            $menu_responsive.hide();
            $menu_responsive.find('.sf-mega').css('marginLeft','0');
        }

    });




});


