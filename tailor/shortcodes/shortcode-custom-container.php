<?php

if ( ! function_exists( 'tailor_shortcode_custom_container_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom container element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_custom_container_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-container {$atts['class']}" ) );
	    
	    $html = '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>' . do_shortcode( $content ) .'</div>';
	    return $html;
    }

    add_shortcode( 'tailor_custom_container', 'tailor_shortcode_custom_container_element' );
}