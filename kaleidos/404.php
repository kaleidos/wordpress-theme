<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Kaleidos
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php _e( '404', 'kaleidos' ); ?>
                    </h1>
                    <h3>
                        <?php echo __('Ups, the page you are looking for doesn&#39;t exist', 'kaleidos') ?>
                    </h3>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p>
                        <?php echo __( 'There&#39;s nothing around. What you want to do?', 'kaleidos' ); ?>
                    </p>
                    <ul>
                        <li>
                            <a href="" title="<?php __('Go back to homepage', 'kaleidos') ?>">
                                <?php echo __('Go back to homepage', 'kaleidos') ?>
                            </a>
                        </li>
                        <li>
                            <?php echo __('Use the searchform at the top', 'kaleidos'); ?>
                        </li>
                        <li>
                            <?php echo __('Keep reading our top commented posts:', 'kaleidos'); ?>
                        </li>
                    </ul>
                    <?php
                        $the_query = new WP_Query(
                            array(
                                'orderby' => 'comment_count',
                                'posts_per_page' => '2'
                            )
                         );

                        if ( $the_query->have_posts() ) {
                            echo '<div class="related-posts clearfix">';
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
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
