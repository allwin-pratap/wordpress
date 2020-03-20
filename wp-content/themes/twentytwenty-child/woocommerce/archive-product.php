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
global $post;
?>
<main>
    <div class="main-container">
        <br><br><br>
        <h4 class="text-center"><?php single_cat_title(''); ?></h4>
        <?php do_action( 'woocommerce_before_cart' ); ?>
        <?php
        $argsProducts = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
        );
        $queryProducts = new WP_Query( $argsProducts );
        ?>
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
        <div class="row">
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
                <h5>color filters</h5>
                <?php 
                $getColor = get_terms(
                array(
                    'taxonomy' => 'pa_color',
                    'parent' => 0,
                    'hide_empty' => false,
                        'order'=>'ASC',
                                'orderby'=>'name',
                    )
                );
            
                ?>
                <form method="get" action="">
                    <ul class="list-link">
                        <?php foreach($getColor as $category) { ?>
                        <li class="color-list">
                            <span class="color color-<?php echo $category->name ?>" data-val="<?php echo $category->name ?>"></span>
                        </li>
                        <?php } ?>
                        <input type="hidden" id="colorId" name="color" value="">
                    </ul>
                    <button type="submit" id="btn-find" class="btn-search">Search</button>
                </form>
                </div>
            <div class="col-md-9">
                
                    <div class="row">
                        <?php 
                            while (have_posts()) {
                            the_post();
                            $product = wc_get_product( $post->ID );
                            
                        ?>
                        <div class="col-12 col-sm-6 col-md-4 mb-5">
                            <?php
                            get_template_part( 'template-parts/content', get_post_type() );
                            ?>
                            <a href="<?php echo get_permalink() ?>">
                                <p class="text-center product-title archive-product"><?php echo $product->name; ?></p>
                            </a>
                            <p class="text-center product-price">$<?php echo $product->get_regular_price(); ?></p>
                            <?php
                                echo apply_filters(
                                    'woocommerce_loop_add_to_cart_link',
                                    sprintf(
                                        '<div class="text-center position-absolute add-cart-link"><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></div>',
                                        esc_url( $product->add_to_cart_url() ),
                                        esc_attr( $product->get_id() ),
                                        esc_attr( $product->get_sku() ),
                                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                                        esc_attr( $product->product_type ),
                                        esc_html( $product->add_to_cart_text() )
                                    ),
                                $product
                                );
                            ?>
                        </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
            </div>
</main>

<?php
get_footer();