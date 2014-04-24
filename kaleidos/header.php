<!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site">

    <header id="masthead" class="site-header" role="banner">
        <?php if ( !is_singular() ) { ?>
            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="Kaleidos" width="183" height="auto" />
                    </a>
                </h1>
                <h2 class="site-description">
                    <?php bloginfo( 'description' ); ?>
                </h2>
            </div>
            <div class="site-branding-bg" data-speed="0.5"></div>
        <?php } else { ?>
            <div class="site-branding single-site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="Kaleidos" width="183" height="auto" />
                    </a>
                </h1>
                <h2 class="site-description">
                    <?php bloginfo( 'description' ); ?>
                </h2>
            </div>
        <?php } ?>

           <div class="top-animation-wrapper">
                  <?php
                       $editorUsers = get_users();
                       $numItems = count($editorUsers);
                       $i = 0;
                       while ($i < 20) {
                           $i++;
                           echo '<div class="square username' . $i . '"></div>';
                       }
                   ?>
            </div>

            <a href="http://kaleidos.net" class="kaleidos-site hide-on-mobile" rel="nofollow" target="_blank" >
                <?php echo __('Visit', 'kaleidos') ?> kaleidos.net
            </a>

    </header><!-- #masthead -->
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <div class="wrapper">
            <?php get_search_form(); ?>
        </div>
    </nav><!-- #site-navigation -->

    <div id="content" class="site-content">
