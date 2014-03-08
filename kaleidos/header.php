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
             <div class="top-color" style="background: linear-gradient(to right, <?php
                     $editorUsers = get_users();
                     $numItems = count($editorUsers);
                     $i = 0;
                     foreach ($editorUsers as $key => $user) {
                         if(++$i != $numItems) {
                             echo $user->user_color . ', ';
                         } else {
                             echo $user->user_color;
                         }
                     }
                     ?>);"></div>

            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                       <img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="Kaleidos" width="130" height="42" />
                    </a>
                </h1>
                <h2 class="site-description">
                    <?php bloginfo( 'description' ); ?>
                </h2>
            </div>

            <?php /*
            <nav id="site-navigation" class="main-navigation" role="navigation">

                <h1 class="menu-toggle">
                    <?php _e( 'Menu', 'kaleidos' ); ?>
                </h1>
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

            </nav><!-- #site-navigation -->
            */ ?>

       </header><!-- #masthead -->

<div id="content" class="site-content">