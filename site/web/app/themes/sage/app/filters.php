<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


// https://wpml.org/es/forums/topic/no-puedo-registrar-el-sitio-2/

add_action('shutdown', function () {
    if (function_exists('icl_enable_capabilities')) {
        icl_enable_capabilities();
    }
});
