( function( $ ) {

    //SearchBox
    $('.button-submit').on('click', function() {
        $(this).siblings('.search-submit').click();
    });

} )( jQuery );
