<?php
/**
 * @package Kaleidos
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php the_title(); ?>
            <?php if ( ! is_admin() ) { ?>
                <?php edit_post_link( __( 'Edit', 'kaleidos' ), '<span class="edit-link">', '</span>' ); ?>
            <?php } ?>
        </h1>
    </header><!-- .entry-header -->

    <ul class="entry-meta">
        <li>
            <?php the_category(', ') ?>
        </li>
    </ul>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'kaleidos' ),
                'after'  => '</div>',
                ) );
                ?>
    </div><!-- .entry-content -->



    <?php
        $category = get_the_category();
        $terms = get_the_terms( $post->ID, 'lang' );
        $postid = get_the_ID();
        $the_query = new WP_Query(
            array(
                'cat' => $category[0]->term_id,
                //'lang' => $terms[3]->slug,
                'orderby' => 'rand',
                'posts_per_page' => '2',
                'post__not_in' => array( $postid )
            )
         );

        if ( $the_query->have_posts() ) {
            echo '<div class="related-posts clearfix">';
            if (has_term('es', 'lang')) :
                echo '<h3>'. __('También te recomendamos', 'kaleidos') . '</h3>';
            elseif (has_term('en', 'lang')) :
                echo '<h3>'. __('We also recommend you', 'kaleidos') . '</h3>';
            else :
                echo '<h3>'. __('También te recomendamos', 'kaleidos') . '</h3>';
            endif;
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                ?>
                <div class="single-related-post">
                    <h2>
                        <a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                </div>
                <?php
            }
            echo '</div>';
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    ?>

</article><!-- #post-## -->

<?php get_sidebar(); ?>
