<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package school_Hub
 */

if ( ! function_exists( 'school_hub_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'school-hub' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'school-hub' ),
			'three-columns' => esc_html__( 'Three Columns', 'school-hub' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'school-hub' ),
		);
		$output = apply_filters( 'school_hub_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Default (Older / Newer Post)', 'school-hub' ),
			'numeric' => esc_html__( 'Numeric', 'school-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'school_hub_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'school-hub' ),
			'simple'   => esc_html__( 'Simple', 'school-hub' ),
			'advanced' => esc_html__( 'Advanced', 'school-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'school_hub_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'school-hub' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'school-hub' ),
		);
		$output = apply_filters( 'school_hub_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function school_hub_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'school-hub' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'school-hub' );
		$choices['medium']    = esc_html__( 'Medium', 'school-hub' );
		$choices['large']     = esc_html__( 'Large', 'school-hub' );
		$choices['full']      = esc_html__( 'Full (original)', 'school-hub' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;


if ( ! function_exists( 'school_hub_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'alignment', 'school-hub' ),
			'left'   => _x( 'Left', 'alignment', 'school-hub' ),
			'center' => _x( 'Center', 'alignment', 'school-hub' ),
			'right'  => _x( 'Right', 'alignment', 'school-hub' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'school_hub_get_featured_slider_transition_effects' ) ) :

	/**
	 * Returns the featured slider transition effects.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_featured_slider_transition_effects() {

		$choices = array(
			'fade'       => _x( 'fade', 'transition effect', 'school-hub' ),
			'fadeout'    => _x( 'fadeout', 'transition effect', 'school-hub' ),
			'none'       => _x( 'none', 'transition effect', 'school-hub' ),
			'scrollHorz' => _x( 'scrollHorz', 'transition effect', 'school-hub' ),
		);
		$output = apply_filters( 'school_hub_filter_featured_slider_transition_effects', $choices );

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_featured_slider_content_options' ) ) :

	/**
	 * Returns the featured slider content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_featured_slider_content_options() {

		$choices = array(
			'home-page' => esc_html__( 'Static Front Page Only', 'school-hub' ),
			'disabled'  => esc_html__( 'Disabled', 'school-hub' ),
		);
		$output = apply_filters( 'school_hub_filter_featured_slider_content_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_featured_slider_type' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_featured_slider_type() {

		$choices = array(
			'featured-page' => __( 'Featured Pages', 'school-hub' ),
		);

		$output = apply_filters( 'school_hub_filter_featured_slider_type', $choices );

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int $min Min.
	 * @param int $max Max.
	 * @param string $prefix Prefix.
	 * @param string $suffix Suffix.
	 *
	 * @return array Options array.
	 */
	function school_hub_get_numbers_dropdown_options( $min = 1, $max = 4, $prefix = '', $suffix = '' ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$string = $prefix . $i . $suffix;
				$output[ $i ] = $string;
			}
		}

		return $output;

	}

endif;

if ( ! function_exists( 'school_hub_get_home_sections_options' ) ) :

	/**
	 * Returns home sections options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function school_hub_get_home_sections_options() {

		$choices = array(
			'news-and-events' => array(
				'label'    => __( 'News and Events', 'school-hub' ),
				'template' => 'template-parts/home/news-and-events',
				),
			'call-to-action' => array(
				'label'    => __( 'Call To Action', 'school-hub' ),
				'template' => 'template-parts/home/call-to-action',
				),
			'latest-news' => array(
				'label'    => __( 'Latest News', 'school-hub' ),
				'template' => 'template-parts/home/latest-news',
				),
			);
		$output = apply_filters( 'school_hub_filter_home_sections_options', $choices );
		return $output;

	}

endif;

