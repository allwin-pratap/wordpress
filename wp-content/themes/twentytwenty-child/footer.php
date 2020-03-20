<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
        <footer id="site-footers">
            <div class="head-foot-container">
                <div class="row footer-top">
                    <div class="col-12 col-md-3">
                        <div class="">
                            <?php twentytwenty_site_logo(); ?>
                            <p class="footer-left-content">We are eager to help you to make your house more beautiful, more livable with an affordable price & good quality of furnitures.</p>
                            <ul class="ul-icon">
                                <li class="list-footer-icon">
                                    <a class="icon-link-footer" href="#.php">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-footer-icon">
                                    <a class="icon-link-footer" href="#.php">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-footer-icon">
                                    <a class="icon-link-footer" href="#.php">
                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="footer-title footer-title-shop text-capitalize">shop</h6>
                        <?php dynamic_sidebar( 'shop' ); ?>
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="footer-title footer-title-help text-capitalize">help</h6>
                        <?php dynamic_sidebar( 'help-widget' ); ?>
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="footer-title footer-title-newsletter text-capitalize">newsletter</h6>
                        <p class="footer-right-content">
                            I want emails from Minim with products information, promotions, advertisements 
                            <span class="green-color">here</span>. 
                            Read our <span class="green-color">Privacy Policy.</span>
                        </p>
                    </div>
                </div>
                
                <div class="row footer-bottom">
                    <div class="col-12 col-md-5 pl-0 copyrights">
                        <p class="copyrights">
                            &copy; 2019
                            <span class="green-color">minim</span> . All Rights Reserved.
                        </p>
                    </div>
                    
                    <div class="col-12 col-md-7 pr-0 footer-bot-right">
                        <ul class="footer-right-link text-right">
                            <li class="list-item"><a class="footer-hover" href="#.php">PRIVACY POLICY</a></li>
                            <li class="list-item"><a class="footer-hover" href="#.php">TERMS OF SERVICES</a></li>
                            <li class="list-item"><a class="footer-hover" href="#.php">AFFILIATION</a></li>
                            <li class="list-item"><a class="footer-hover" href="#.php">SPONSORS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
