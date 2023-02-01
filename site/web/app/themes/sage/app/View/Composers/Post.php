<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
            'tags' => $this->tags(),
            'hero' => $this->hero(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_post_type_archive('project')) {
            return __('<span class="outlined light">When project and Client connect</span> Bad-Ass work is Born', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    /**
     * Returns the post tags.
     *
     * @return string
     */
    public function tags() {
        global $post;

        $tags_raw = wp_get_post_tags($post->ID);

        $tags = '';

        foreach ($tags_raw as $key => $tag) {
            if ($key === array_key_first($tags_raw)) {
                $tags .= $tag->name;
            } else {
                $tags .= ' / ' . $tag->name;
            }
        }

        return $tags ? $tags : false ;
    }

    /**
     * Returns page header hero.
     *
     * @return string
     */
    public function hero() {
        $hero = [
            'type' => get_field('single_project_type')
        ];

        if ($hero['type'] === 'video') {
            $hero['video_id'] = get_field('single_project_video_id');
            $hero['video_zone'] = get_field('single_project_video_zone');
            $hero['video_poster'] = get_field('single_project_video_poster');
        }

        if ($hero['type'] === 'image') {
            $img = get_field('single_project_image');
            if ($img) {
                $hero['image'] = wp_get_attachment_image($img['id'], 'full');
            }
        }

        return $hero;
    }
}
