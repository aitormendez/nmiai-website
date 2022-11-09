<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content',
    ];

    /**
     * Data to be passed to view before rendering
     *
     * @return array
     */
    public function with()
    {


        return [
            'featured_img' => function() {
                $post_id = get_the_ID();
                $thumb_id = get_post_thumbnail_id($post_id);
                $thumb = get_post($thumb_id, 'full');

$output = [];

                if ($thumb_id) {
                    $output['img']['img'] = $thumb;
                    $output['img']['alt'] = get_post_meta($thumb_id, '_wp_attachment_image_alt', true );
                    $output['img']['mime'] = $thumb->post_mime_type;
                    $output['img']['url'] = wp_get_attachment_url($thumb_id);
                    $output['img']['srcset'] = wp_get_attachment_image_srcset($thumb_id, 'full');

                }

                return $output;
            },
        ];
    }
}
