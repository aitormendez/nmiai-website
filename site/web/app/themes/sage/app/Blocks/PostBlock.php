<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\StartEnd;

class PostBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Post block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Show a post.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'nmiai';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 0H0V12H24V0Z" fill="black"/><path d="M1.5 17C2.15311 17 2.70873 16.5826 2.91465 16H9.08535C9.29127 16.5826 9.84689 17 10.5 17C11.3284 17 12 16.3284 12 15.5C12 14.6716 11.3284 14 10.5 14C9.84689 14 9.29127 14.4174 9.08535 15H2.91465C2.70873 14.4174 2.15311 14 1.5 14C0.671573 14 0 14.6716 0 15.5C0 16.3284 0.671573 17 1.5 17Z" fill="black"/><path d="M0 19H18V21H0V19Z" fill="black"/><path d="M13 22H0V24H13V22Z" fill="black"/></svg>';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        // [
        //     'name' => 'light',
        //     'label' => 'Light',
        //     'isDefault' => true,
        // ],
        // [
        //     'name' => 'dark',
        //     'label' => 'Dark',
        // ]
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [

    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'post_block' => $this->postBlock(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('post_block');

        $builder
            ->addPostObject('post_block_post', [
                'label'         => __('Project', 'sage'),
                'instructions'  => '',
                'required'      => 1,
                'post_type'     => ['project'],
                'taxonomy'      => [],
                'allow_null'    => 0,
                'multiple'      => 0,
                'return_format' => 'object',
                'ui'            => 1,
            ])
            ->addImage('post_block_image', [
                'label' => __('Image', 'sage'),
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ])
            ->addFields($this->get(StartEnd::class))
            ;

        return $builder->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function postBlock()
    {
        $post_raw = get_field('post_block_post');
        $img = get_field('post_block_image');
        $intro = get_field('single_project_intro', $post_raw->ID);
        $terms = get_the_terms($post_raw->ID, 'post_tag');

        $post = [
            'post_terms'          => get_the_terms($post_raw->ID, 'post_tag'),
            'img' => $img,
            'post_title'          => $post_raw->post_title,
            'post_excerpt'        => wpautop($post_raw->post_excerpt),
            'start_text'          => get_field('generic_block_start_text'),
            'end_text'            => get_field('generic_block_end_text'),
            'permalink'           => get_permalink($post_raw->ID),
        ];

        if ($intro) {
            $post['intro'] = $intro;
        }

        if ($terms) {
            $terms_string = '';

            foreach ($terms as $key => $term) {
                $terms_string .= $term->name;

                if ($key !== array_key_last($terms)) {
                    $terms_string .= ' / ';
                }
            }

            $post['terms'] = $terms_string;
        }

        if ($img) {
            $post['post_thumbnail_data'] = [
                'src'    => $img['url'],
                'srcset' => wp_get_attachment_image_srcset($img['ID']),
                'alt'    => $img['alt'],
            ];
        }

        return $post;
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
