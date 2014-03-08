<?php get_header(); ?>

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
            </section>
            <?php else : ?>
                <p>Mmmm...parece que no hay posts con esta query</p>
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
            </section>
            <?php else : ?>
                <p>Mmmm...parece que no hay posts con esta query</p>
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php /* get_footer(); */ ?>
