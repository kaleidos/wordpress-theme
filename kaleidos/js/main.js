( function( $ ) {
    console.log('loaded');

    //SearchBox
    $('.button-submit').on('click', function() {
        $(this).siblings('.search-submit').click();
    });

    $(window).scroll(function() {
        /* Parallax */
        var $window = $(window);
        var $bgobj = $('.site-branding-bg');
        var wPos = $window.scrollTop();
        var yPos = -($window.scrollTop() / $bgobj.data('speed'));
        var coords = 'center '+ (yPos + 25) + 'px';
        $bgobj.css({ backgroundPosition: coords });

        /* Search fixed */
        var headerHeight = $('.site-header').height() + 41;
        if (wPos > headerHeight) {
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
    /*
    var get_tweet = function() {
        console.log('Tweet!');
        $.getJSON("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=kaleidosnet&count=1", function(data) {
            $(".twitter").html(data[0].text);
        });
    };
    get_tweet();
    */

} )( jQuery );
