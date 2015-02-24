jQuery(document).ready(function($) {
    
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

});