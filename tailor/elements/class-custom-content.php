<?php

/**
 * Tailor custom content element class.
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_Content_Element' ) ) {

    /**
     * Tailor custom content element class.
     */
    class Tailor_Custom_Content_Element extends Tailor_Element {

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
		    $this->add_setting( 'setting_1', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
			    'default'               =>  'The default value for setting 1',
		    ) );
		    $this->add_control( 'setting_1', array(
			    'label'                 =>  __( 'Setting 1', 'tailor-portfolio' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'setting_2', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'setting_2', array(
			    'label'                 =>  __( 'Setting 2', 'tailor-portfolio' ),
			    'type'                  =>  'text',
			    'section'               =>  'general',
			    'priority'              =>  $priority += 10,
		    ) );
		    
		    // This allows you to also add one of many standard control types..
		    $general_control_types = array( 'style' );

		    // This allows you to alter values for standard controls and settings..
		    $general_control_arguments = array(
			    'style'                 =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    ''                      =>  __( 'None' ),
						    'style-1'               =>  __( 'Style 1' ),
						    'style-2'               =>  __( 'Style 2' ),
						    'style-3'               =>  __( 'Style 3' ),
					    ),
				    ),
			    ),
		    );
		    
		    // Note the starting priority is passed to the function
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

		    // Generate CSS rules for standard settings
		    $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

		    // Create your own
		    if ( 'style-1' == $atts['style'] ) {
			    $color = 'red';
		    }
		    else if ( 'style-2' == $atts['style'] ) {
			    $color = 'blue';
		    }
		    else if ( 'style-3' == $atts['style'] ) {
			    $color = 'green';
		    }
		    
		    if ( ! empty( $color ) ) {
			    $css_rules[] = array(
				    'selectors'         =>  array( '' ),
				    'declarations'      =>  array(
					    'background-color'  =>  $color,
				    ),
			    );
		    }
		    
		    return $css_rules;
	    }
    }
}