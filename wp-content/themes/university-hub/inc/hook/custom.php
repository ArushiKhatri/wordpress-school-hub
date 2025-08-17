<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package school_Hub
 */

if ( ! function_exists( 'school_hub_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function school_hub_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'school-hub' ); ?></a><?php
	}
endif;

add_action( 'school_hub_action_before', 'school_hub_skip_to_content', 15 );


if ( ! function_exists( 'school_hub_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function school_hub_site_branding() {

		?>
	    <div class="site-branding">

			<?php school_hub_the_custom_logo(); ?>

			<?php $show_title = school_hub_get_option( 'show_title' ); ?>
			<?php $show_tagline = school_hub_get_option( 'show_tagline' ); ?>
			<?php if ( true === $show_title || true === $show_tagline ) :  ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) :  ?>
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( true === $show_tagline ) :  ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>
	    </div><!-- .site-branding -->
	    <?php
			$contact_number    = school_hub_get_option( 'contact_number' );
			$contact_email     = school_hub_get_option( 'contact_email' );
			$contact_address_1 = school_hub_get_option( 'contact_address_1' );
			$contact_address_2 = school_hub_get_option( 'contact_address_2' );
		?>
		<div id="quick-contact">
			<?php if ( ! empty( $contact_number ) || ! empty( $contact_email ) || ! empty( $contact_address_1 )  || ! empty( $contact_address_2 )) : ?>
				<ul>
					<?php if ( ! empty( $contact_number ) || ! empty( $contact_email ) ) : ?>
						<li class="quick-call-info">
							<a class="quick-call" href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $contact_number ) ); ?>"><?php echo esc_attr( $contact_number ); ?></a>
							<a  class="quick-email" href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_attr( antispambot( $contact_email ) ); ?></a>
						</li>
					<?php endif; ?>
					<?php if ( ! empty( $contact_address_1 ) || ! empty( $contact_address_2 ) ) : ?>
						<li class="quick-address-info">
						<span class="main-address"><?php echo esc_html( $contact_address_1 ); ?></span>
						<span class="sub-address"><?php echo esc_html( $contact_address_2 ); ?></span>
						</li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
		</div><!-- #quick-contact -->

	    <div id="main-nav">
	    	<div class="menu-wrapper">
	    		<button id="menu-toggle" class="menu-toggle" aria-controls="main-menu" aria-expanded="false">
					<i class="fa fa-bars"></i>
          			<i class="fa fa-close"></i>
		    		<span class="menu-label"><?php esc_html_e( 'Menu', 'school-hub' ); ?></span>
		    	</button>

				<div class="menu-inside-wrapper">
					 <nav id="site-navigation" class="main-navigation" role="navigation">
						<?php
						wp_nav_menu(
							array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'fallback_cb'    => 'school_hub_primary_navigation_fallback',
							)
						);
						?>
					</nav><!-- #site-navigation -->

					<?php $search_in_header = school_hub_get_option( 'search_in_header' ); ?>
			        <?php if ( true === $search_in_header ) : ?>
				        <div class="header-search-box">
				        	<?php get_search_form(); ?>
				        </div>
		        	<?php endif; ?>

				</div>
			</div>
	    </div> <!-- #main-nav -->
	    <?php
	}

endif;

add_action( 'school_hub_action_header', 'school_hub_site_branding' );

if ( ! function_exists( 'school_hub_header_top_content' ) ) :

	/**
	 * Header Top.
	 *
	 * @since 1.0.0
	 */
	function school_hub_header_top_content() {
		$show_ticker = school_hub_get_option( 'show_ticker' );
		?>
		<div id="tophead">
			<div class="container">
				<?php if ( true === $show_ticker ) : ?>
					<div class="top-news">
						<span class="top-news-title">
						<?php $ticker_title = school_hub_get_option( 'ticker_title' );  ?>
						<?php echo ( ! empty( $ticker_title ) ) ? esc_html( $ticker_title ) : '&nbsp;'; ?>
						</span>
						<?php echo school_hub_get_news_ticker_content(); ?>
					</div> <!-- #top-news -->
				<?php endif; ?>

				<?php if ( true === school_hub_get_option( 'show_social_in_header' )  ) : ?>
					<div id="header-social">
						<?php the_widget( 'school_Hub_Social_Widget' ); ?>
					</div><!-- #header-social -->
				<?php endif; ?>

				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<div id="top-nav">
						<div class="menu-wrapper">
							<button id="top-menu-toggle" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
			          			<i class="fa fa-close"></i>
					    		<span class="menu-label"><?php esc_html_e( 'Top Menu', 'school-hub' ); ?></span>
					    	</button>

							<div class="menu-inside-wrapper">
								<nav id="site-top-navigation" class="top-navigation" role="navigation">
									<?php
									wp_nav_menu(
										array(
										'theme_location' => 'top',
										'menu_id'        => 'top-menu',
										'depth'           => 3,
										'fallback_cb'     => false,
									) );
									?>
								</nav><!-- #site-navigation -->
							</div><!-- .menu-inside-wrapper -->

						</div><!-- .menu-wrapper -->
					</div> <!-- #top-nav -->
				<?php endif; ?>
			</div> <!-- .container -->
		</div><!--  #tophead -->
		<?php
	}

endif;

add_action( 'school_hub_action_before_header', 'school_hub_header_top_content', 5 );

if ( ! function_exists( 'school_hub_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function school_hub_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'school_hub_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Footer Menu.
		$footer_menu_content = wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footer-navigation',
			'depth'          => 1,
			'fallback_cb'    => false,
			'echo'           => false,
		) );

		// Copyright content.
		$copyright_text = school_hub_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'school_hub_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

		// Powered by content.
		$powered_by_text = sprintf( __( 'school Hub by %s', 'school-hub' ), '<a target="_blank" rel="designer" href="https://wenthemes.com/">' . __( 'WEN Themes', 'school-hub' ) . '</a>' );

		// Social in footer.
		$show_social_in_footer = school_hub_get_option( 'show_social_in_footer' );
		?>

		<div class="colophon-inner">

		    <?php if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) : ?>
			    <div class="colophon-column">
			    	<div class="footer-social">
			    		<?php the_widget( 'school_Hub_Social_Widget' ); ?>
			    	</div><!-- .footer-social -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $copyright_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $footer_menu_content ) ) : ?>
		    	<div class="colophon-column">
					<?php echo $footer_menu_content; ?>
		    	</div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
			    		<?php echo $powered_by_text; ?>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		</div><!-- .colophon-inner -->

	    <?php
	}

endif;

add_action( 'school_hub_action_footer', 'school_hub_footer_copyright', 10 );


if ( ! function_exists( 'school_hub_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function school_hub_add_sidebar() {

		global $post;

		$global_layout = school_hub_get_option( 'global_layout' );
		$global_layout = apply_filters( 'school_hub_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'school_hub_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}
		// Include Secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'school_hub_action_sidebar', 'school_hub_add_sidebar' );


if ( ! function_exists( 'school_hub_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function school_hub_custom_posts_navigation() {

		$pagination_type = school_hub_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'school_hub_action_posts_navigation', 'school_hub_custom_posts_navigation' );


if ( ! function_exists( 'school_hub_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function school_hub_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'school_hub_theme_settings', true );
			$school_hub_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $school_hub_theme_settings_single_image ) {
				$school_hub_theme_settings_single_image = school_hub_get_option( 'single_image' );
			}

			if ( 'disable' !== $school_hub_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $school_hub_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'school_hub_single_image', 'school_hub_add_image_in_single_display' );

if ( ! function_exists( 'school_hub_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function school_hub_add_breadcrumb() {

		// Bail if Breadcrumb disabled.
		$breadcrumb_type = school_hub_get_option( 'breadcrumb_type' );
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}

		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb"><div class="container">';
		switch ( $breadcrumb_type ) {
			case 'simple':
				school_hub_simple_breadcrumb();
			break;

			case 'advanced':
				if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
			break;

			default:
			break;
		}
		echo '</div><!-- .container --></div><!-- #breadcrumb -->';

	}

endif;

add_action( 'school_hub_action_before_content', 'school_hub_add_breadcrumb', 7 );

if ( ! function_exists( 'school_hub_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function school_hub_footer_goto_top() {

		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'school-hub' ) . '</span></i></a>';

	}

endif;

add_action( 'school_hub_action_after', 'school_hub_footer_goto_top', 20 );

if ( ! function_exists( 'school_hub_add_front_page_home_sections' ) ) :

	/**
	 * Add Front Page widget sections.
	 *
	 * @since 1.0.0
	 */
	function school_hub_add_front_page_home_sections() {

		$section_status = apply_filters( 'school_hub_filter_front_page_home_sections_status', false );

		if ( true !== $section_status ) {
			return;
		}

		$active_sections = school_hub_get_active_homepage_sections();

		if ( ! empty( $active_sections ) ) {
			echo '<div id="front-page-home-sections" class="widget-area">';
			foreach ( $active_sections as $section ) {
				get_template_part( $section['template'] );
			}
			echo '</div><!-- #front-page-home-sections -->';
		}

	}
endif;

add_action( 'school_hub_action_before_content', 'school_hub_add_front_page_home_sections', 6 );



if( ! function_exists( 'school_hub_check_front_homepage_section_status' ) ) :

	/**
	 * Check status of front homepage section.
	 *
	 * @since 1.0.0
	 */
	function school_hub_check_front_homepage_section_status( $input ) {

		$current_id = school_hub_get_index_page_id();

		if ( is_front_page() && get_queried_object_id() === $current_id && $current_id > 0 ) {
			$input = true;
		}

		return $input;

	}
endif;

add_filter( 'school_hub_filter_front_page_home_sections_status', 'school_hub_check_front_homepage_section_status' );

if ( ! function_exists( 'school_hub_check_home_page_content' ) ) :

	/**
	 * Check home page content status.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function school_hub_check_home_page_content( $status ) {

		if ( is_front_page() ) {
			$home_content_status = school_hub_get_option( 'home_content_status' );
			if ( false === $home_content_status ) {
				$status = false;
			}
		}
		return $status;

	}

endif;

add_action( 'school_hub_filter_home_page_content', 'school_hub_check_home_page_content' );
