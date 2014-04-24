<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
    </label>
    <?php if(is_tax( 'lang', 'es' ) || (has_term('es', 'lang') && is_single())  ) : ?>
        <input class="search-field" placeholder="<?php echo __('¿Qué estás buscando?', 'kaleidos') ?>" value="" name="s" title="<?php echo __('¿Qué estás buscando?', 'kaleidos') ?>" />
    <?php elseif(is_tax( 'lang', 'en' ) || (has_term('en', 'lang') && is_single())) : ?>
        <input class="search-field" placeholder="<?php echo __('What are you looking for?', 'kaleidos') ?>" value="" name="s" title="<?php echo __('What are you looking for?', 'kaleidos') ?>" />
    <?php else : ?>
        <input class="search-field" placeholder="<?php echo __('¿Qué estás buscando?', 'kaleidos') ?>" value="" name="s" title="<?php echo __('¿Qué estás buscando?', 'kaleidos') ?>" />
    <?php endif; ?>
    <a href="#" class="button-submit icon icon-search"></a>
    <input type="submit" class="search-submit" value="Search" />
</form>
