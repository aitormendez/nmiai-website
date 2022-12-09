<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);

        register_sidebar([
        'name' => __('Projects archive insert', 'sage'),
        'id' => 'sidebar-project-archive'
    ] + $config);
});

/**
 * Enqueue styles.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('typekit', 'https://use.typekit.net/xei5jjq.css', false);
}, 100);

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('typekit', 'https://use.typekit.net/xei5jjq.css', false);
}, 100);

/**
 * Allow json in media files.
 *
 * @return void
 */

add_filter('upload_mimes', function($mimes) {
    $mimes['json'] = 'text/plain';
    return $mimes;
});


/**
* For second loop in project archive
* Finalmente se eliminó el segundo loop
*/
// add_action('pre_get_posts', function ($query) {
//     if ( ! is_admin() && is_post_type_archive('project') && $query->is_main_query() ) {
//         $query->set( 'offset', 4 );
//         $query->set( 'posts_per_page', 4 );
//         return;
//     }
// });


/**
* Allow SVG
*/
add_filter('upload_mimes', 	function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


/**
* Allow HTML in post titles: [span class="outlined light"]
*/
add_filter( 'the_title', function($var) {
    $var = (str_replace( '[', '<', $var ));
    $var = (str_replace( ']', '>', $var ));
    return $var ;
} );
