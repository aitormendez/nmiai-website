<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class AccordionContainer extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordion container';

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
    public $icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23 1H1V23H23V1ZM0 0V24H24V0H0Z" fill="black"/><path d="M7 5V2H5V5H2V7H5V10H7V7H10V5H7Z" fill="black"/></svg>';

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
        'mode' => 'false',
        'multiple' => true,
        'jsx' => true,
        'spacing' => [
            'padding' => true,
        ],
        'tipography' => false,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        [
            'name' => 'light',
            'label' => 'Light',
            'isDefault' => true,
        ],
        [
            'name' => 'dark',
            'label' => 'Dark',
        ],
        [
            'name' => 'dynamic',
            'label' => 'Dynamic',
        ],
        [
            'name' => 'column',
            'label' => 'Column',
        ]
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
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
