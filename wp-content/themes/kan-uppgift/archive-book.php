<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kan-Uppgift
 */

get_header();
?>
    <form action="">
        <div class="form-row">
            <div class="form-group col-md-10">
                <input type="search" name="bookSearch" id="bookSearch" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">Sök</button>
            </div>
        </div>
        <div id="searchResult" style="display:none; background: #fff; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000"></div>
    </form>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
