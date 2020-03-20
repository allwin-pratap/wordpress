<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>
<a href="../../../../wordpress/wp-content/themes/twentytwenty/template-parts/content.php"></a>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <?php
            wp_body_open();
        ?>
        <header id="site-header" class=" header-footer-group" role="banner">
            <div class="header-sticky head-foot-container header-section">
                <div class="row header-top position-fixed">
                    <div class="col-12 col-md-3 header-titles">
                        <?php
                            twentytwenty_site_logo();
                        ?>
                    </div>
                    <div class="col-12 col-md-4">
                        <?php 
                            wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
                        ?>
                    </div>
                    <div class="col-12 col-md-5">
                        <ul class="menu-primary-right-icon text-right">
                            <li class="header-right-icon-list">
                                <a class="header-right-icon" href="#.php">
                                    <i class="fa fa-search " aria-hidden="true"></i>
                                </a>
                            </li>
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
                </div>
            </div>
        </header>
