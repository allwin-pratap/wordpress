<?php
/**
 * The main template file
 * Template Name: Shop
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>
<main>
    <div class="main-container">
        <br><br><br>
        <h1>done</h1>
        <?php 
            $terms = get_terms(
                array(
                    'taxonomy' => 'product_cat',
                    'parent' => 0,
                    'hide_empty' => false,
                        'order'=>'ASC',
                                'orderby'=>'name',
                )
            );
            
            ?>
                <div class="col-md-3 filter-dropdown filter-scroll">
                <h5>categories</h5>
                <ul class="list-link">
                    <?php foreach($terms as $category) { ?>
                    <li class="footer-list">
                        <a href="<?php echo get_category_link($category->term_id) ?>" class="text-light">
                            <?php echo $category->name ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                </div>
            <?php

                if ( is_search() ) {
                        global $wp_query;

                        $archive_title = sprintf(
                                '%1$s %2$s',
                                '<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
                                '&ldquo;' . get_search_query() . '&rdquo;'
                        );

                        if ( $wp_query->found_posts ) {
                                $archive_subtitle = sprintf(
                                        /* translators: %s: Number of search results */
                                        _n(
                                                'We found %s result for your search.',
                                                'We found %s results for your search.',
                                                $wp_query->found_posts,
                                                'twentytwenty'
                                        ),
                                        number_format_i18n( $wp_query->found_posts )
                                );
                        } else {
                                $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
                        }
                }
                if ( have_posts() ) {

                        $i = 0;

                        while ( have_posts() ) {
                                $i++;
                                if ( $i > 1 ) {
                                }
                                the_post();

                                get_template_part( 'template-parts/content', get_post_type() );

                        }
                } 
                ?>
</main>

<?php
get_footer();