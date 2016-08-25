<?php

if ( ! function_exists( 'tailor_shortcode_custom_wrapper_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom wrapper element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_custom_wrapper_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'title'             =>  '',
		    'description'       =>  '',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-wrapper {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $html = '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>';

	    if ( ! empty( $atts['title'] ) ) {
		    $html .= '<h2>' . esc_attr( $atts['title'] ) . '</h2>';
	    }

	    if ( ! empty( $atts['description'] ) ) {
		    $html .= '<p>' . esc_attr( $atts['description'] ) . '</p>';
	    }

	    $html .= '<div class="tailor-custom-wrapper__content">' . do_shortcode( $content ) .'</div>';

	    return $html . '</div>';
    }

    add_shortcode( 'tailor_custom_wrapper', 'tailor_shortcode_custom_wrapper_element' );
}