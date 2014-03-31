<?php
/**
 * @package Kaleidos
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
    </header><!-- .entry-header -->

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
        $the_query = new WP_Query(
            array(
                'category' => $category[0]->cat_name,
                'orderby' => 'rand',
                'posts_per_page' => '2'
            )
         );

        if ( $the_query->have_posts() ) {
            echo '<div class="related-posts clearfix">';
            echo '<h3>'. _('Posts relacionados') . '</h3>';
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
