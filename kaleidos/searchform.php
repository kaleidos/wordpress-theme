<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
    </label>
    <input list="cats" class="search-field" placeholder="<?php echo _('¿Qué estás buscando?') ?>" value="" name="s" title="Search for:" />
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
