<?php
/**
 * The main template file
 *
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
<header class="head-foot-container">
    <div class="row header-bottom">
        <div class="col-12 col-md-3 header-form">
            <?php 
                get_search_form(); 
            ?>
        </div>
        <div class="col-12 col-md-6">
            <div class="miini-logo">
                <?php
                    twentytwenty_site_logo();
                ?>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <ul class="menu-primary-bottom-right-icon menu-primary-right-icon text-right">
                <li class="header-right-icon-list">
                    <a href="#.php">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="header-right-icon-list">
                    <a href="#.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="header-right-icon-list">
                    <?php if( WC()->cart->get_cart_contents_count() >= 0){ ?>
                        <span class="cart-count">
                            <a class="cart-icons" href="<?php echo wc_get_cart_url(); ?>" title="<?php echo 'View my cart' ; ?>">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php echo 'View my cart' ; ?>">
                                <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                            </a>
                        </span>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <div class="col-12">
            <?php 
                wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
            ?>
        </div>
    </div>
</header>
<main>
    <div class="main-container">
        <div class="slides">
            <?php
                $argsSlides = array(
                    'post_type' => 'slides',
                    'posts_per_page' => -1,
                );
                $querySlides = new WP_Query( $argsSlides );
                $count = $querySlides->found_posts;
            ?>        
            <div id="carouselExampleIndicators" class="carousel slide carousel-margin" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php for($num = 1; $num < $count; $num++){ ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $num; ?>"></li>
                    <?php } ?>
                </ul>

                <div class="carousel-inner">
                    <?php 
                    $numberForSlides = 0;
                    while($querySlides->have_posts() ){
                        $querySlides->the_post();
                        $slideActive = $numberForSlides == 0 ? ' active ' : '';
                    ?>
                    <div class="carousel-item <?php echo $slideActive ?>">
                        <img class="d-block img-cover" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $querySlides->post->post_title ?>">
                        <div class="carousel-caption">
                            <div class="no-container">
                                <div class="caro-cont-width">
                                    <h5 class="">
                                        <a class="" href="<?php echo get_permalink() ?>"><?php echo $querySlides->post->post_title ?></a>
                                    </h5>
                                    <div class="d-none d-md-block carousel-content">
                                        <p class="carousel-content-color "><?php echo $querySlides->post->post_content ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $numberForSlides += 1;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php
        $argsProducts = array(
            'post_type' => 'product',
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'posts_per_page' => 8,
        );
        $queryProducts = new WP_Query( $argsProducts );
        ?>
        <div class="popular-products">
            <h4 class="text-center">popular products</h4>
            <div class="row">
                <?php while($queryProducts->have_posts() ){
                    $queryProducts->the_post();
                    $product = wc_get_product( $queryProducts->post->ID );
                ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo get_permalink() ?>">
                        <img class="d-block img-cover" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $queryProducts->post->post_title ?>">
                    </a>
                    <p class="text-center product-title"><?php echo $queryProducts->post->post_title ?></p>
                    <p class="text-center product-price">$<?php echo $product->get_regular_price(); ?></p>
                    
                </div>
                <?php } ?>
            </div>
            <div class="text-center">
                <a class="product-link" href="http://localhost/miini/shop/">All Products</a>
            </div>
        </div>
        <div class="testimonial-slides">
            <?php
            $argsTestimonialSlides = array(
                'post_type' => 'testimonialSlides',
                'posts_per_page' => -1,
            );
            $queryTestimonialSlides = new WP_Query( $argsTestimonialSlides );
            $testimonialSlideCount = $queryTestimonialSlides->found_posts;
        ?>  
        <h4 class="text-center">testimonial</h4>
        <div id="carouselExampleIndicators" class="carousel slide carousel-margin" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for($num = 1; $num < $testimonialSlideCount; $num++){ ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $num; ?>"></li>
                <?php } ?>
            </ol>

            <div class="carousel-inner">
                <?php 
                $numberForTestimonialSlides = 0;
                while($queryTestimonialSlides->have_posts() ){
                    $queryTestimonialSlides->the_post();
                    $slideActive = $numberForTestimonialSlides == 0 ? ' active ' : '';
                ?>
                <div class="carousel-item <?php echo $slideActive ?>">
                    <img class="d-block img-cover" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $queryTestimonialSlides->post->post_title ?>">
                    <div class="carousel-captions">
                        <div class="d-none d-md-block carousel-content">
                            <p class="carousel-content-color"><?php echo $queryTestimonialSlides->post->post_content ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                $numberForTestimonialSlides += 1;
                } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="latest-news-bg">
        <div class="main-container">
            <?php
            $argsNewsBlog = array(
                'post_type' => 'post',
                'posts_per_page' => 3
            );
            $queryNewsBlog = new WP_Query( $argsNewsBlog );
            ?>
            <div class="latest-news">
                <h4 class="text-center">latest news</h4>
                <div class="row">

                    <?php while($queryNewsBlog->have_posts() ){
                        $queryNewsBlog->the_post();
                    ?>
                    <div class="col-12 col-md-4 text-center">
                        <a href="<?php echo get_permalink() ?>">
                            <img class="d-block img-cover" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo $queryNewsBlog->post->post_title ?>">
                        </a>
                        <a href="<?php echo get_permalink() ?>">
                            <h6 class="page-title text-lowercase"><?php echo $queryNewsBlog->post->post_title ?></h6>
                        </a>
                        <p class="news-content"><?php echo $queryNewsBlog->post->post_content ?></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="text-center">
                    <a class="product-link news-link" href="http://localhost/miini/blog/">All Blog Posts</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();