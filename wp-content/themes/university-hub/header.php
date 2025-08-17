<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school_Hub
 */

?><?php
	/**
	 * Hook - school_hub_action_doctype.
	 *
	 * @hooked school_hub_doctype -  10
	 */
	do_action( 'school_hub_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - school_hub_action_head.
	 *
	 * @hooked school_hub_head -  10
	 */
	do_action( 'school_hub_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wp_body_open' ); ?>

	<?php
	/**
	 * Hook - school_hub_action_before.
	 *
	 * @hooked school_hub_page_start - 10
	 * @hooked school_hub_skip_to_content - 15
	 */
	do_action( 'school_hub_action_before' );
	?>

    <?php
	  /**
	   * Hook - school_hub_action_before_header.
	   *
	   * @hooked school_hub_header_start - 10
	   */
	  do_action( 'school_hub_action_before_header' );
	?>
		<?php
		/**
		 * Hook - school_hub_action_header.
		 *
		 * @hooked school_hub_site_branding - 10
		 */
		do_action( 'school_hub_action_header' );
		?>
    <?php
	  /**
	   * Hook - school_hub_action_after_header.
	   *
	   * @hooked school_hub_header_end - 10
	   */
	  do_action( 'school_hub_action_after_header' );
	?>

	<?php
	/**
	 * Hook - school_hub_action_before_content.
	 *
	 * @hooked school_hub_content_start - 10
	 */
	do_action( 'school_hub_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - school_hub_action_content.
	   */
	  do_action( 'school_hub_action_content' );
	?>
