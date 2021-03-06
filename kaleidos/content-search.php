<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header class="entry-header">
        <div class="entry-date">
            <span class="day"><?php the_time('d'); ?></span>
            <span class="month"><?php the_time('M'); ?></span>
            <span class="year"><?php the_time('Y'); ?></span>
        </div>
        <div class="entry-author-image">
            <a href="<?php echo get_the_author_meta( 'user_url' ) ?>"
               title="<?php echo get_the_author_meta( 'name' ) ?>" target="_blank">
                <span class="icon icon-link"></span>
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
            </a>
        </div>
        <ul class="entry-author">
            <li class="entry-author-data">
                <span class="entry-author-author">
                    <a href="<?php echo get_the_author_meta( 'user_url' ) ?>"
                    title="<?php echo get_the_author_meta( 'name' ) ?>" target="_blank">
                        <?php the_author(); ?>
                    </a>
                </span>
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
    </header><!-- .entry-header -->

    <div class="entry-content" style="border-bottom: 1px solid <?php the_author_meta('user_color'); ?>">
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <div class="entry-meta">
            <?php the_category(', ') ?>
        </div>
        <?php the_excerpt() ?>
    </div>
</article>
