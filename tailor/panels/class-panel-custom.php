<?php


if ( ! class_exists( 'Tailor_Custom_Panel' ) ) {

	/**
	 * Tailor Custom Panel class.
	 */
	class Tailor_Custom_Panel extends Tailor_Panel {

		/**
		 * Type of item to display.
		 *
		 * @var string
		 */
		public $type = 'library';

		/**
		 * Prints the Underscore template for the items section of the panel.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function items_template() {

			$search_text =  __( 'Search elements..', 'tailor' ); ?>

			<% if ( items.length ) { %>
			<div class="search-form">
				<span class="screen-reader-text"><?php esc_html( $search_text ); ?></span>
				<input class="search" type="search" role="search" placeholder="<?php esc_attr_e( $search_text ); ?>">
			</div>
			<% } %>

			<?php
			$list_class_name = 'list list--secondary';

			if ( false == tailor_get_setting( 'show_element_descriptions', false ) ) {
				$list_class_name .= ' is-simplified';
			} ?>

			<ul class="<?php echo $list_class_name; ?>" id="items"></ul>

			<?php
		}

		/**
		 * Prints the Underscore template for individual panel items.
		 *
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function item_template() { ?>

			<% if ( active ) { %>
			<li class="list__item draggable element element--<%= tag.replace( 'tailor_', '' ) %>" draggable="true" tabindex="0">
			<% } else { %>
			<?php $visibility = tailor_get_setting( 'show_inactive_elements', false ) ? 'is-inactive' : 'is-hidden'; ?>

			<li class="list__item draggable element element--<%= tag.replace( 'tailor_', '' ) %><?php echo " {$visibility}"; ?>">

			<% } %>

				<div class="element__wrap">
					<h3 class="list__label">
						<%= label %>
						<% if ( badge ) { %><span class="element__badge"><%= badge %></span><% } %>
					</h3>

					<div class="element__description"><%= description %></div>
				</div>
			</li>

			<?php
		}

		/**
		 * Prints the Underscore template for the panel empty state.
		 *
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function empty_template() { ?>

			<p><?php _e( 'There are no elements to display.', 'tailor' ); ?></p>

			<?php
		}
	}
}