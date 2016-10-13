<?php

if ( ! function_exists( 'tailor_shortcode_custom_content_element' ) ) {

    /**
     * Defines the shortcode rendering function for the custom content element.
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_custom_content_element( $atts, $content = null, $tag ) {

	    $atts = shortcode_atts( array(
		    'id'                =>  '',
		    'class'             =>  '',
		    'setting_1'         =>  '',
		    'setting_2'         =>  '',
	    ), $atts, $tag );

	    $id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
	    $class = trim( esc_attr( "tailor-element tailor-custom-content {$atts['class']}" ) );
	    
	    // Do something with the element settings
	    $inner_html = '<p><b>This is a sample content element.</b></p>';

	    if ( ! empty( $atts['setting_1'] ) ) {
		    $inner_html .= '<p>Setting 1: ' . esc_attr( $atts['setting_1'] ) . '</p>';
	    }
	    if ( ! empty( $atts['setting_2'] ) ) {
		    $inner_html .= '<p>Setting 2: ' . esc_attr( $atts['setting_2'] ) . '</p>';
	    }

	    $outer_html = '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>%s</div>';

	    /**
	     * Filter the HTML for the element.
	     *
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param array $atts
	     */
	    $html = apply_filters( 'tailor_shortcode_custom_content_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );

	    return $html;
    }

    add_shortcode( 'tailor_custom_content', 'tailor_shortcode_custom_content_element' );
}