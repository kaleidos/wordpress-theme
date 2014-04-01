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
    <?php /*
    <div class="top-color" style="background: linear-gradient(to right,
            <?php
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
            ?>);
      "></div>
      */ ?>
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
            <div class="language-selector">
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
                <span class="icon icon-world"></span>
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

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="wrapper">
                    <?php get_search_form(); ?>
                </div>
            </nav><!-- #site-navigation -->

       </header><!-- #masthead -->

<div id="content" class="site-content">
