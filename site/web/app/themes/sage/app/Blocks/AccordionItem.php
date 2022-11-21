<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class AccordionItem extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordion item';

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
    public $icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 5V2H5V5H2V7H5V10H7V7H10V5H7Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M3 21V12H21V21H3ZM4 13H20V20H4V13Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V24H24V0H0ZM23 1H1V23H23V1Z" fill="black"/></svg>';

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
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'accordion_item' => $this->accordionItem(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $section = new FieldsBuilder('accordion_item');

        $section
            ->addText('accordion_item_label');

        return $section->build();
    }

    /**
     * Return the accordion item label.
     *
     * @return array
     */
    public function accordionItem()
    {
        return get_field('accordion_item_label') ?: 'label';
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
