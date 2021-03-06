<?php
/*
	* @return dropdown categories on customizer setting
	*@description A class to create a dropdown for all categories in your wordpress site
*/
if ( class_exists( 'WP_Customize_Control' ) ) {

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
  
    class Corporate_portfolio_category_dropdown extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         *
	         */
            public function render_content() {
	            $dropdown = wp_dropdown_categories(
	                array(
	                    'name'              => '_customize-dropdown-categories-' . $this->id,
	                    'echo'              => 0,
	                    'show_option_none'  => esc_html__( '&mdash; Choose Category &mdash;', 'corporate-portfolio' ),
	                    'option_none_value' => '',
	                    'selected'          => $this->value(),
                )
	            );
	 
	            // add in the data link parameter.
	            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
	 
	            printf(
	                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
	                $this->label,
	                $this->description,
	                $dropdown
	            );
	        }
	    }
 }