<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Kaleidos
 */
?>

<?php if ( is_singular() ) { ?>

<aside class="single-author">
    <div class="entry-author-top clearfix">
        <div class="entry-author-image">
            <a href="<?php echo get_the_author_meta( 'user_url' ) ?>" title="<?php echo get_the_author_meta( 'user_url' ) ?>" target="_blank">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
            </a>
        </div>
        <ul class="entry-author">
            <li class="entry-author-data">
                <a class="entry-author-author" href="<?php echo get_the_author_meta( 'user_url' ) ?>" title="<?php echo get_the_author_meta( 'user_url' ) ?>" target="_blank">
                    <?php the_author(); ?>
                </a>
            </li>
            <li>
                <span class="entry-author-color" style="background: <?php the_author_meta('user_color'); ?>">
                    <!-- User color -->
                </span>
                <span class="entry-author-position">
                    <?php the_author_meta('user_position'); ?>
                </span>
            </li>
        </ul>
    </div>
    <p class="description-author">
        <?php the_author_meta('description'); ?>
    </p>
    <?php /*
    <ul class="entry-meta">
        <li>
            <small>Posted: <?php the_time('d M Y') ?></small>
        </li>
        <li>
            <small>Category: <?php the_category(', ') ?></small>
        </li>
        <li>
            <small>Tags: <?php the_tags(); ?></small>
        </li>
        <?php if ( ! is_admin() ) { ?>
        <li>
            <small>
                <?php edit_post_link( __( 'Edit', 'kaleidos' ), '<span class="edit-link">', '</span>' ); ?>
            </small>
        <?php } ?>
    </ul>
    */ ?>

        <?php

            $the_query = new WP_Query(
                array(
                    'author' => get_the_author_meta('ID'),
                    'orderby' => 'comment_count',
                    'posts_per_page' => '5'
                )
            );

            if ( $the_query->have_posts() ) {
                ?>
                <section class="more-posts">
                    <h3>
                        <?php echo _('Top posts'); ?>
                    </h3>
                    <ul>
                <?php
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
            ?>
            <li>
                <article>
                    <a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </article>
             </li>
             <?php
                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();

         ?>
         </ul>
    </section>
</aside>

<?php } else { ?>

<div id="secondary" class="widget-area" role="complementary">
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

    <aside id="search" class="widget widget_search">
        <?php get_search_form(); ?>
    </aside>

    <aside id="archives" class="widget">
        <h1 class="widget-title"><?php _e( 'Archives', 'kaleidos' ); ?></h1>
        <ul>
            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
        </ul>
    </aside>

    <aside id="meta" class="widget">
        <h1 class="widget-title"><?php _e( 'Meta', 'kaleidos' ); ?></h1>
        <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <?php wp_meta(); ?>
        </ul>
    </aside>

    <?php endif; // end sidebar widget area ?>
    </div><!-- #secondary -->

<?php } ?>
