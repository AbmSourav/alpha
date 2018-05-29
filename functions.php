<?php

/**
*======================================
*for css cash
*======================================
*/
if (site_url() == 'http://localhost/learnwp' ) {
    define( 'VERSION', time() );
}else {
    define( 'VERSION', wp_get_theme()->get('Version') );
}


/**
*======================================
*CSS and JS Enqueue
*======================================
*/
function alpha_assets(){
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' , array(), VERSION, 'all' );
    wp_enqueue_style( 'bootstrap-home', get_template_directory_uri() . '/css/blog-home.css' , array(), '1.0', 'all' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/Font-Awesome/web-fonts-with-css/css/fontawesome-all.min.css' , array(), '4.0', 'all' );
    wp_enqueue_style( 'featherlight-css', get_template_directory_uri() . '/assets/featherlight/src/featherlight.css' , array(), '1.7.13', 'all' );
    wp_enqueue_style( 'dashicons' );
	wp_register_style( 'alpha-css', get_stylesheet_uri() , array(), VERSION, 'all' );

        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'bootstrap-home' );
        wp_enqueue_style( 'fontawesome' );
		wp_enqueue_style( 'alpha-css' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js' , array('jquery'), VERSION, true );
    wp_enqueue_script( 'featherlight-js', get_template_directory_uri() . '/assets/featherlight/src/featherlight.js' , array('jquery'), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'alpha_assets' ); 


/**
*======================================
*text Domain, Theme support
*======================================
*/
function alpha_bootstrapping(){
    load_theme_textdomain( 'alpha' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array( 'image', 'quote', 'audio', 'video', 'link' ) );
    register_nav_menu( "mainmenu", __( "Main Menu", "alpha" ) );
    register_nav_menu( "footermenu", __( "Footer Menu", "alpha" ) );
}
add_action( 'after_setup_theme', 'alpha_bootstrapping' );


/**
*======================================
*register sidebar
*======================================
*/
function alpha_sidebar(){
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'alpha' ),
        'id'            =>  'sidebar-1',
        'description'   => __( 'Right sidebar', 'alpha' ),
        'before_widget' => '<div id="%1$s", class="card my-4 widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5 class="card-header widget-title">',
        'after_title'   => '</h5><div class="card-body">',
    ) );
}
add_action( 'widgets_init', 'alpha_sidebar' );


/**
*======================================
*protected post function
*======================================
*/
function alpha_the_excerpt( $excerpt ){
    if ( !post_password_required() ) {
        return $excerpt;
    }else {
        echo get_the_password_form();
    }
}
add_filter( "the_excerpt", "alpha_the_excerpt" );

/**
*======================================
*'protected' title change function
*======================================
*/
function alpha_protected_title_change(){
    return "%s";
}
add_action( 'protected_title_format', 'alpha_protected_title_change' );


/**
*======================================
*nav li class access function
*======================================
*/
function alpha_menu_item_class( $classes, $item ){
    $classes[] = 'list-inline-item';
    return $classes; 
}
add_action( 'nav_menu_css_class', 'alpha_menu_item_class', 10, 2 );


/**
*======================================
*add image in page head
*======================================
*/
function alpha_portfolio_page_template_banner(){
    if(is_page()) {
        $alpha_feat_image = get_the_post_thumbnail_url(null,"large");
    ?>
        <style>
            .page-header{
                background-image: url(<?php echo $alpha_feat_image;?>)
            }
        </style>
<?php
    }
}
add_action( "wp_head","alpha_portfolio_page_template_banner",11 );