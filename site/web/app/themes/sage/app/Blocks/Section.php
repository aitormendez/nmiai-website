<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\StartEnd;

class Section extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Section';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Section with free content';

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
    public $icon = '<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 3C2.15311 3 2.70873 2.5826 2.91465 2H21.0854C21.2913 2.5826 21.8469 3 22.5 3C23.3284 3 24 2.32843 24 1.5C24 0.671574 23.3284 0 22.5 0C21.8469 0 21.2913 0.417404 21.0854 1H2.91465C2.70873 0.417404 2.15311 0 1.5 0C0.671573 0 0 0.671574 0 1.5C0 2.32843 0.671573 3 1.5 3Z" fill="black"/><rect y="5" width="4" height="2" fill="black"/><rect x="17" y="5" width="7" height="2" fill="black"/><path d="M14 8H9V15H5L11.5 22L18 15H14V8Z" fill="black"/></svg>';

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
        'align' => true,
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
    public $styles = [
        [
            'name' => 'default',
            'label' => 'Default',
            'isDefault' => true,
        ],
        [
            'name' => 'dynamic',
            'label' => 'Dynamic',
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
            'section' => $this->section(),
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
        $section = new FieldsBuilder('section');

        $section
            ->addFields($this->get(StartEnd::class));

        return $section->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function section()
    {
        $sect = [
            'start_text' => get_field('generic_block_start_text'),
            'end_text'   => get_field('generic_block_end_text'),
        ];

        return $sect;
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
