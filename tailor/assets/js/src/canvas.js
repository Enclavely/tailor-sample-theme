
( function( ElementAPI, Views ) {

    'use strict';

	// Register the custom wrapper views
	app.on( 'before:start', function() {
		Views.CustomWrapper = require( './components/elements/wrappers/custom' );
	} );

	// Do something when the element renders
	ElementAPI.onRender( 'tailor_custom_wrapper', function( atts, model ) {
		console.log( 'Do something with or to the element when it renders' );
		console.log( atts );
		console.log( model );
		console.log( this.el ); // The element node
		console.log( this.$el );
    } );

} ) ( window.Tailor.Api.Element, Tailor.Views || {} );