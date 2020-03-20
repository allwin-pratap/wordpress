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
        <?php do_action( 'woocommerce_before_cart' ); ?>
        <?php
        $searchColor = filter_input(INPUT_GET, 'color');
        $sortingBy = filter_input(INPUT_GET, 'sorting');
        $argsProducts = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
        );
        if ($searchColor) {
            $argsProducts['tax_query'] = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'pa_color',
                    'field'    => 'slug',
                    'terms'    =>  $searchColor,
                )
            );
        }
        
                
        $queryProducts = new WP_Query( $argsProducts );
       
        ?>
        
        <div class="popular-products">
            <h4 class="text-center">Shop</h4>
            <div class="text-right">
                <?php do_action( 'woocommerce_before_shop_loop' ); ?>
<!--                <form method="get" action="">
                    <select class="sorting-select" name="sorting">
                        <option>Sorting...</option>
                        <option value="ASC">sort by: low to high</option>
                        <option value="DESC">sort by: high to low</option>
                    </select>
                    <button type="submit" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>-->
            </div>
 
            <div class="row">
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
                        <?php while($queryProducts->have_posts() ){
                            $queryProducts->the_post();
                            $product = wc_get_product( $queryProducts->post->ID );
                        ?>
                        <div class="col-12 col-sm-6 col-md-4 mb-5">
                            <a class="product-image" href="<?php echo get_permalink() ?>">
                                <img class="d-block img-cover" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $queryProducts->post->post_title ?>">
                            </a>
                            <p class="text-center product-title"><?php echo $queryProducts->post->post_title ?></p>
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script> 
    jQuery(document).ready(function(){
        jQuery(".list-link li span").click(function(event){
            var selectedColor = jQuery(this).attr('data-val');
            jQuery('#colorId').val(selectedColor);
        });
    });
    
</script>
<?php
get_footer();