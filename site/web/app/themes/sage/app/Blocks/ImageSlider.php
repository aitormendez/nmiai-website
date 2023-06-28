<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ImageSlider extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'image-slider';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Slider for images';

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
    public $icon = '<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23 18.5L18 22V15L23 18.5Z" fill="#010101"/><path d="M6 15L1 18.5L6 22V15Z" fill="#010101"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V13H24V0H0Z" fill="black"/></svg>';

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
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
        'defaultStylePicker' => true,
        'spacing' => [
            'margin' => true,
            'padding' => true,
            'blockGap' => true,
        ]
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        [
            'name' => 'aspect-h',
            'label' => 'a/r horiz',
            'isDefault' => false,
        ]
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'gallery' => $this->getGallery(),
            'padding' => $this->paddingStyles(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('image_slider');

        $builder
            ->addGallery('image_slider_gallery', [
                'label' => 'Slider gallery',
                'instructions' => '',
                'return_format' => 'array',
                'min' => '',
                'max' => '',
                'insert' => 'append',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ]);

        return $builder->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function getGallery()
    {
        $gallery_raw = get_field('image_slider_gallery');

        if ($gallery_raw) {
            $gallery = array_map(function ($img) {
                return wp_get_attachment_image($img['id'], 'full', false, ['class' => 'w-full']);
            }, $gallery_raw);
        }

        return $gallery ?? null;
    }

    /**
     * Return padding styles.
     *
     * @return string
     */
    public function paddingStyles()
    {
        if (property_exists($this->block, 'style')) {
            if (array_key_exists('padding', $this->block->style['spacing'])) {
                $padding = $this->block->style['spacing']['padding'];
                array_walk($padding, function (&$val) {
                    if (str_starts_with($val, 'var:preset|spacing|')) {
                        $val = 'var(--wp--preset--spacing--' . substr($val, -2) . ')';
                    };
                });

                $padding_string = '';

                if (array_key_exists('top', $padding)) {
                    $padding_string .= 'padding-top:' . $padding['top'] . ';';
                }

                if (array_key_exists('right', $padding)) {
                    $padding_string .= 'padding-right:' . $padding['right'] . ';';
                }

                if (array_key_exists('bottom', $padding)) {
                    $padding_string .= 'padding-bottom:' . $padding['bottom'] . ';';
                }

                if (array_key_exists('left', $padding)) {
                    $padding_string .= 'padding-left:' . $padding['left'] . ';';
                }

                str_replace(`;;`, ';', $padding_string);
            }
        } else {
            $padding_string = '';
        }

        return $padding_string;
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
