<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package school_Hub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $archive_layout = school_hub_get_option( 'archive_layout' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		$archive_image           = school_hub_get_option( 'archive_image' );
		$archive_image_alignment = school_hub_get_option( 'archive_image_alignment' );
		?>
		<?php if ( 'disable' !== $archive_image ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'align'. esc_attr( $archive_image_alignment ) ) ); ?></a>
		<?php endif; ?>
	<?php endif; ?>
	<div class="entry-content-wrapper">
		<?php school_hub_entry_meta_date(); ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<footer class="entry-footer">
			<?php school_hub_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<div class="entry-content">

			<?php if ( 'full' === $archive_layout ) : ?>
				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'school-hub' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-hub' ),
						'after'  => '</div>',
					) );
				?>
		    <?php else : ?>
				<?php the_excerpt(); ?>
		    <?php endif; ?>

		</div><!-- .entry-content -->

	</div><!-- .entry-content-wrapper -->


</article><!-- #post-## -->
