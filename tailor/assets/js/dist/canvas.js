(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

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
},{"./components/elements/wrappers/custom":2}],2:[function(require,module,exports){

var WrapperView = Tailor.Views.Wrapper,
    CustomWrapper;

CustomWrapper = WrapperView.extend( {
    
    // The child view container is where the children elements go
    childViewContainer : '.tailor-custom-wrapper__content'
} );

module.exports = CustomWrapper;
},{}]},{},[1]);
