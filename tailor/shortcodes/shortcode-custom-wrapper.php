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
	    $inner_html = '';
	    
	    if ( ! empty( $atts['title'] ) ) {
		    $inner_html .= '<h2>' . esc_attr( $atts['title'] ) . '</h2>';
	    }

	    if ( ! empty( $atts['description'] ) ) {
		    $inner_html .= '<p>' . esc_attr( $atts['description'] ) . '</p>';
	    }
	    
	    $inner_html .= '<div class="tailor-custom-wrapper__content">' . do_shortcode( $content ) .'</div>';

	    $outer_html = '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>%s</div>';

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    $html = apply_filters( 'tailor_shortcode_custom_wrapper_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );

	    return $html;
    }

    add_shortcode( 'tailor_custom_wrapper', 'tailor_shortcode_custom_wrapper_element' );
}