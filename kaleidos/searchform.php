<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
    </label>
    <?php if(is_tax( 'lang', 'es' ) || (has_term('es', 'lang') && is_single())  ) : ?>
        <input list="cats" class="search-field" placeholder="<?php echo _e('¿Qué estás buscando?', 'kaleidos') ?>" value="" name="s" title="<?php echo _e('¿Qué estás buscando?', 'kaleidos') ?>" />
    <?php elseif(is_tax( 'lang', 'en' ) || (has_term('en', 'lang') && is_single())) : ?>
        <input list="cats" class="search-field" placeholder="<?php echo _e('What are you looking for?', 'kaleidos') ?>" value="" name="s" title="<?php echo _e('What are you looking for?', 'kaleidos') ?>" />
    <?php else : ?>
        <input list="cats" class="search-field" placeholder="<?php echo _e('¿Qué estás buscando?', 'kaleidos') ?>" value="" name="s" title="<?php echo _e('¿Qué estás buscando?', 'kaleidos') ?>" />
    <?php endif; ?>
    <datalist id="cats">
        <?php
            $cats = get_categories();
            foreach( $cats as $cat ) {
                echo '<option value="' . $cat->cat_name . '">';
            }
        ?>
    </datalist>
    <input type="button" class="button-submit" value="&rarr;" />
    <input type="submit" class="search-submit" value="Search" />
</form>
