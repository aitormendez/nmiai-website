<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'tagline' => $this->tagline(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }


    /**
     * Returns the post title.
     *
     * @return string
     */
    public function tagline()
    {
        if (is_post_type_archive('project')) {
            return __('Work', 'sage');
        }

        if (is_singular('project')) {
            return __('Project', 'sage') . '/' . get_the_title();
        }

        if (is_page()) {
            return get_the_title();
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_bloginfo('description');
    }
}
