<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kaleidos
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                        if ( is_category() ) :
                            single_cat_title();

                        elseif ( is_tag() ) :
                            single_tag_title();

                        elseif ( is_author() ) :
                            printf( __( 'Author: %s', 'kaleidos' ), '<span class="vcard">' . get_the_author() . '</span>' );

                        elseif ( is_day() ) :
                            printf( __( 'Day: %s', 'kaleidos' ), '<span>' . get_the_date() . '</span>' );

                        elseif ( is_month() ) :
                            printf( __( 'Month: %s', 'kaleidos' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'kaleidos' ) ) . '</span>' );

                        elseif ( is_year() ) :
                           printf( __( 'Year: %s', 'kaleidos' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'kaleidos' ) ) . '</span>' );

                        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                            _e( 'Asides', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                            _e( 'Galleries', 'kaleidos');

                        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                            _e( 'Images', 'kaleidos');

                        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                            _e( 'Videos', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                            _e( 'Quotes', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                            _e( 'Links', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                            _e( 'Statuses', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                            _e( 'Audios', 'kaleidos' );

                        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                            _e( 'Chats', 'kaleidos' );

                        endif;
                    ?>
                </h1>
                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) && !is_tax() ) :
                        printf( '<p class="taxonomy-description">%s</p>', $term_description );
                    endif;
                ?>
                </header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'inc/home', 'post' );
				?>

			<?php endwhile; ?>

			<?php kaleidos_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); ?>
