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
