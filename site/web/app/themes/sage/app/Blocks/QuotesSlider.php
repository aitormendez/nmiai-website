<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ListItems;

class QuotesSlider extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Quotes Slider';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Slider for quotes';

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
    public $icon = '<svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V5H0V0Z" fill="#010101"/><path d="M3 0H5V5H3V0Z" fill="#010101"/><path d="M23 3H7V5H23V3Z" fill="#010101"/><path d="M7 9H21V11H7V9Z" fill="#010101"/><path d="M18 6H7V8H18V6Z" fill="#010101"/><path d="M23 16.5L18.5 19.5311V13.4689L23 16.5Z" fill="#010101"/><path d="M6.5 13.4689L2 16.5L6.5 19.5311V13.4689Z" fill="#010101"/></svg>';

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
            'quotes' => $this->getQuotes(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $example = new FieldsBuilder('quotes_slider');

        $example
            ->addRepeater('quotes_slider_quotes', [
                'label' => __('Quotes', 'sage'),
                'required' => 1,
                'min' => 1,
                'layout' => 'row',
                'button_label' => __('Add quote', 'sage'),
            ])
            ->addTextarea('quotes_slider_quote', [
                'label' => __('Quote', 'sage'),
                'default_value' => '',
                'rows' => '5',
                'maxlength' => '200',
            ])
            ->addText('quotes_slider_start_text', [
                'label' => __('Name', 'sage'),
                'default_value' => '',
                'maxlength' => '200',
            ])
            ->addText('quotes_slider_subtitle', [
                'label' => __('Subtitle', 'sage'),
                'default_value' => '',
                'maxlength' => '200',
            ])
            ->addText('quotes_slider_end_text', [
                'label' => __('End text', 'sage'),
                'default_value' => 'Us',
                'placeholder' => 'Write quote here',
                'maxlength' => '200',
            ])
            ->endRepeater()
            ;

        return $example->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function getQuotes()
    {
        return get_field('quotes_slider_quotes');
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
