( function( $ ) {
    console.log('loaded');

    //SearchBox
    $('.button-submit').on('click', function() {
        $(this).siblings('.search-submit').click();
    });

    $(window).scroll(function() {
        /* Parallax */
        var $window = $(window);
        var documentHeight = $(document).height();
        var windowHeight = $window.height();
        var scrollTop = $window.scrollTop();

        if ($(window).width() > 1000){
            $window.on("scroll", function() {
                scrollTop = $(window).scrollTop();
                var scrollToOne = (scrollTop) / (documentHeight - windowHeight); //gives us the scroll percent range from 0 to 1
                var scrollPercent = Math.round(scrollToOne*100) +30;
                var $bgobj = $('.site-branding-bg');
                var coords = 'center '+ (scrollPercent) + '%';

                console.log(coords);
                $bgobj.css({ backgroundPosition: coords });
            });
        }


        /* Search fixed */
        var headerHeight = $('.site-header').height() + 41;
        if (scrollTop > headerHeight) {
            $('.main-navigation').css({
                'position' : 'fixed',
                'top' : '0',
                'opacity' : 0.9,
                'z-index' : 99
            });
        } else {
            $('.main-navigation').removeAttr('style');
        }
    });

} )( jQuery );
