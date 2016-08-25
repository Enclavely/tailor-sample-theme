<?php

/**
 * Tailor custom wrapper element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_Wrapper_Element' ) ) {

    /**
     * Tailor custom wrapper element class.
     */
    class Tailor_Custom_Wrapper_Element extends Tailor_Element {

	    /**
	     * Registers element settings, sections and controls.
	     *
	     * @access protected
	     */
	    protected function register_controls() {
		    
		    $this->add_section( 'general', array(
			    'title'                 =>  __( 'General', 'tailor-portfolio' ),
			    'priority'              =>  10,
		    ) );

		    $this->add_section( 'colors', array(
			    'title'                 =>  __( 'Colors', 'tailor-portfolio' ),
			    'priority'              =>  30,
		    ) );

		    $this->add_section( 'attributes', array(
			    'title'                 =>  __( 'Attributes', 'tailor-portfolio' ),
			    'priority'              =>  40,
		    ) );

		    $priority = 0;

		    // Add as many custom settings as you like..
		    $this->add_setting( 'title', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'Default title',
		    ) );
		    $this->add_control( 'title', array(
			    'label'                 =>  __( 'Title', 'tailor-portfolio' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'description', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'description', array(
			    'label'                 =>  __( 'Description', 'tailor-portfolio' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    
		    // See the custom content element for an example of how to use/modify standard control types
		    $general_control_types = array();
		    $general_control_arguments = array();
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

		    // Standard color settings..
		    $priority = 0;
		    $color_control_types = array(
			    'color',
			    'link_color',
			    'heading_color',
			    'background_color',
			    'border_color',
		    );
		    $color_control_arguments = array();
		    tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

		    // Standard attribute settings..
		    $priority = 0;
		    $attribute_control_types = array(
			    'class',
			    'padding',
			    'margin',
			    'border_style',
			    'border_width',
			    'border_radius',
			    'shadow',
			    'background_image',
			    'background_repeat',
			    'background_position',
			    'background_size',
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	    /**
	     * Returns custom CSS rules for the element.
	     *
	     * @param $atts
	     * @return array
	     */
	    public function generate_css( $atts ) {
		    $css_rules = array();
		    $excluded_control_types = array();

		    // Just generate the default setting CSS
		    $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );
		    return $css_rules;
	    }
    }
}