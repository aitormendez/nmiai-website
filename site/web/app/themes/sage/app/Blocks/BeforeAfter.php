<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\StartEnd;

class BeforeAfter extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Before After';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Two images with slider';

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
    public $icon = '<svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.9146 18H24V19H20.9146C20.7087 19.5826 20.1531 20 19.5 20C18.8469 20 18.2913 19.5826 18.0854 19H0V18H18.0854C18.2913 17.4174 18.8469 17 19.5 17C20.1531 17 20.7087 17.4174 20.9146 18Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M19.8287 0.559686L18.9946 1.99999H24V13H12.6248L11.6036 14.7633L10.7383 14.2622L11.4692 13H0V1.99999H17.8391L18.9633 0.0585632L19.8287 0.559686ZM23 12H13.2038L18.4156 3H23V12Z" fill="black"/></svg>';

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
    public $mode = 'preview';

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
        'spacing' => [
            'padding' => true,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

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
            'beforeafter' => $this->beforeAfter(),
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
        $beforeafter = new FieldsBuilder('before_after');

        $beforeafter
            ->addTrueFalse('beforeafter_ui_color', [
                'label' => __('UI color', 'sage'),
                'required' => 0,
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Dark',
                'ui_off_text' => 'Light',
            ])
            ->addFields($this->get(StartEnd::class))
            ->addImage('beforeafter_image_before', [
                'label' => __('Image defore', 'sage'),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ])
            ->addImage('beforeafter_image_after', [
                'label' => __('Image after', 'sage'),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ])
            ;

        return $beforeafter->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function beforeAfter()
    {
        $image_before = get_field('beforeafter_image_before');
        $image_before['srcset'] = wp_get_attachment_image_srcset($image_before['id'], 'full');
        $image_before['sizes'] = wp_calculate_image_sizes('full', null, null, $image_before['id']);
        $image_after = get_field('beforeafter_image_after');
        $image_after['srcset'] = wp_get_attachment_image_srcset($image_after['id'], 'full');
        $image_after['sizes'] = wp_calculate_image_sizes('full', null, null, $image_after['id']);

        $befaft = [
            'ui_color'     => get_field('beforeafter_ui_color') ? 'dark' : 'light',
            'start_text'   => get_field('generic_block_start_text'),
            'end_text'     => get_field('generic_block_end_text'),
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
        if (property_exists($this->block, 'style') ) {
            if (array_key_exists('padding', $this->block->style['spacing'])) {
                $padding = $this->block->style['spacing']['padding'];
                array_walk($padding, function(&$val) {
                    if (str_starts_with($val, 'var:preset|spacing|') ) {
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
