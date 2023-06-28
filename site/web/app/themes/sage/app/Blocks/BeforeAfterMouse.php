<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BeforeAfterMouse extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Before After Mouse';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Two images reacting to mouse position';

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
    public $icon = '<svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 0H10V2H0V19H10V21H11V19H24V2H11V0ZM11 18V9.83165L13.0232 16.0413L14.5831 13.2906L17.2601 16.2627L18.7462 14.9242L16.0692 11.9521L18.9675 10.6874L11 7.13523V3H23V18H11Z" fill="black"/></svg>';

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
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
        'spacing' => [
            'padding' => true,
        ],
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
            'beforeafter' => $this->beforeAfterMouse(),
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
        $beforeafter = new FieldsBuilder('before_after_mouse');

        $beforeafter
            ->addImage('beforeaftermouse_image_before', [
                'label' => __('Image before', 'sage'),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ])
            ->addImage('beforeaftermouse_image_after', [
                'label' => __('Image after', 'sage'),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ]);

        return $beforeafter->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function beforeAfterMouse()
    {
        $image_before = get_field('beforeaftermouse_image_before');
        $image_before['srcset'] = wp_get_attachment_image_srcset($image_before['id'], 'full');
        $image_before['sizes'] = wp_calculate_image_sizes('full', null, null, $image_before['id']);
        $image_after = get_field('beforeaftermouse_image_after');
        $image_after['srcset'] = wp_get_attachment_image_srcset($image_after['id'], 'full');
        $image_after['sizes'] = wp_calculate_image_sizes('full', null, null, $image_after['id']);

        $befaft = [
            'image_before' => $image_before,
            'image_after'  => $image_after,
        ];

        return $befaft;
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
