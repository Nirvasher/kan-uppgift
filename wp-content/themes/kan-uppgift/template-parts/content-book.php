<?php
/**
 * Template part for displaying books
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kan-Uppgift
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				kan_uppgift_posted_on();
				kan_uppgift_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

    <?php if (is_singular()) {
        kan_uppgift_post_thumbnail();
    } else {
        the_post_thumbnail('book-thumbnail');
    } ?>

	<div class="entry-content">
		<?php
        if (is_singular()) {
            the_content();
        } else {
            // echo wp_trim_words( get_the_content(), 75, '...' );
            $content = get_the_content();
            $content = strip_tags($content);

            if (strlen($content) > 70) {
                echo substr($content, 0, 75).'...';
            } else {
                echo get_the_content();
            }
            
            // $theContent = get_the_content();
            // echo substr($theContent, 0, 75);
        }

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kan-uppgift' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kan_uppgift_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
