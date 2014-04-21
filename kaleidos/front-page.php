<?php get_header(); ?>
<?php get_template_part( 'inc/language', 'selector' ); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main site-home clearfix" role="main">

            <?php
            $query = new WP_Query( array( 'lang' => 'es' ) );

            // The Loop
            if ( $query->have_posts() ) : ?>
            <section class="language spanish left">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                ?>

                <?php get_template_part( 'inc/home', 'post' ); ?>

                <?php
                }
                //Reset post Data
                wp_reset_postdata();
                ?>

                <div class="term-page">
                    <span class="icon icon-world"></span>
                    <span>
                         <?php echo __('See all posts in ', 'kaleidos'); ?>
                    </span>
                    <?php
                         $terms = get_terms( 'lang', array(
                             'slug' => 'es'
                         ) );
                        foreach ( $terms as $term ) {
                            $term = sanitize_term( $term, 'lang' );
                            $term_link = get_term_link( $term, 'lang' );
                            echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                        }
                    ?>
                </div>

            </section>
            <?php else : ?>
                <p>
                    <?php __('Mmmm...seems that there are no results for this query', 'kaleidos') ?>
                </p>
            <?php endif; ?>

            <?php
            $query = new WP_Query( array( 'lang' => 'en' ) );

            // The Loop
            if ( $query->have_posts() ) : ?>
            <section class="language english right">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                ?>

                <?php get_template_part( 'inc/home', 'post' ); ?>

                <?php
                }
                //Reset post Data
                wp_reset_postdata();
                ?>
                <div class="term-page">
                    <span class="icon icon-world"></span>
                    <span>
                         <?php echo __('See all posts in ', 'kaleidos'); ?>
                    </span>
                    <?php
                         $terms = get_terms( 'lang', array(
                             'slug' => 'en'
                         ) );
                        foreach ( $terms as $term ) {
                            $term = sanitize_term( $term, 'lang' );
                            $term_link = get_term_link( $term, 'lang' );
                            echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                        }
                    ?>
                 </div>

            </section>
            <?php else : ?>
                <p>
                    <?php __('Mmmm...seems that there are no results for this query', 'kaleidos') ?>
                </p>
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php  get_footer(); ?>
