<?php

add_action( 'wp_enqueue_scripts', 'custom_load_bootstrap' );
/**
 * Enqueue Bootstrap.
 */
function custom_load_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' );

    wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js',array( 'jquery' ), CHILD_THEME_VERSION, true );
}


add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
/*
 * Enqeue the Style.css and Responsive.css
 */
function my_theme_enqueue_styles() {

    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
}

add_action( 'init', 'register_my_menus' );
/*
 * Custom header navigation
 */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Headers Menu' ),
      'extra-menu' => __( 'Footers Menu' )
    )
  );
}

/*
 * footer widgets
 */
add_action( 'after_setup_theme', 'register_multiple_widget_areas' );

function register_multiple_widget_areas()
{
    register_sidebar(
        array(
        'name'          => 'Shop',
        'id'            => 'shop',
        'description'   => 'describe the function of the box.'
        )
    );
    register_sidebar(
        array(
        'name'          => 'Help',
        'id'            => 'help-widget',
        'description'   => 'Goes at the top of the page.'
        )
    );
}

/*
 * Slider custom
 */

function create_custom_slide_posttype() {
 
    register_post_type( 'slides',
    // CPT Options
        array(
            'labels' => array(
                'name'               => __( 'slide' ),
                'singular_name'      => __( 'slides' ),
                'add_new'            => __( 'Add New slide' ),
                'add_new_item'       => __( 'Add New slide' ),
                'edit'               => __( 'Edit slide' ),
                'edit_item'          => __( 'Edit slide' ),
                'new_item'           => __( 'New slide' ),
                'view'               => __( 'View slide' ),
                'view_item'          => __( 'View slide' ),
                'search_items'       => __( 'Search slide' ),
                'not_found'          => __( 'No slide found' ),
                'not_found_in_trash' => __( 'No slide found in Trash' ),
                'parent'             => __( 'Parent slide' ),
            ),
            'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'menu_icon'           => 'dashicons-art',
            'rewrite'             => array('slug' => 'slides'),
            'has_archive'         => false
 
        )
    );
    register_taxonomy(
        'slides_cat',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'slides',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Slides Categories', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'themes',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_slide_posttype', 25 );

/*
 * Slider custom for testimonial
 */
function create_custom_testimonial_slide_posttype() {
 
    register_post_type( 'testimonialSlides',
    // CPT Options
        array(
            'labels' => array(
                'name'               => __( 'testimonialSlide' ),
                'singular_name'      => __( 'testimonialSlides' ),
                'add_new'            => __( 'Add New testimonialSlide' ),
                'add_new_item'       => __( 'Add New testimonialSlide' ),
                'edit'               => __( 'Edit testimonialSlide' ),
                'edit_item'          => __( 'Edit testimonialSlide' ),
                'new_item'           => __( 'New testimonialSlide' ),
                'view'               => __( 'View testimonialSlide' ),
                'view_item'          => __( 'View testimonialSlide' ),
                'search_items'       => __( 'Search testimonialSlide' ),
                'not_found'          => __( 'No testimonialSlide found' ),
                'not_found_in_trash' => __( 'No testimonialSlide found in Trash' ),
                'parent'             => __( 'Parent testimonialSlide' ),
            ),
            'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
            'public'              => true,
            'show_ui'             => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'menu_icon'           => 'dashicons-art',
            'rewrite'             => array('slug' => 'slides'),
            'has_archive'         => false
 
        )
    );
    register_taxonomy(
        'testimonials_cat',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'testimonials',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Testimonials Categories', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'themes',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_testimonial_slide_posttype', 25 );
//
//function register_custom_taxonomies() {
//    register_taxonomy(
//        'product_cat',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
//        'product',             // post type name
//        array(
//            'hierarchical' => true,
//            'label' => 'Products Categories', // display name
//            'query_var' => true,
//            'rewrite' => array(
//                'slug' => 'themes',    // This controls the base slug that will display before each term
//                'with_front' => false  // Don't display the category base before
//            )
//        )
//    );
//}     
//        
//add_action( 'init', 'register_custom_taxonomies', 30 );





