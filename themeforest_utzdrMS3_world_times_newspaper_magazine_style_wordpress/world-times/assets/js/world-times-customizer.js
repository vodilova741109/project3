(function( $ ) {
    "use strict";
    console.log('loaded');
    wp.customize( 'category_row', function( value ) {
        value.bind( function( newval ) {
            alert(newval);
            console.log(newval);
        });
    });
    wp.customize( 'my_radio', function( value ) {
        value.bind( function( newval ) {
            alert(newval);
            console.log(newval);
        });
    });

})( jQuery );