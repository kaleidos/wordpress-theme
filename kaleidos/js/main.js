( function( $ ) {
    console.log('loaded');
    //SearchBox
    $('.button-submit').on('click', function() {
        $(this).siblings('.search-submit').click();
    });

} )( jQuery );
