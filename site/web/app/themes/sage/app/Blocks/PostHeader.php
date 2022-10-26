<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class PostHeader extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Post Header';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Shows header description and featured image of a post';

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
    public $icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M24 0H0V12H24V0Z" fill="black"/><path d="M1.5 17C2.15311 17 2.70873 16.5826 2.91465 16H9.08535C9.29127 16.5826 9.84689 17 10.5 17C11.3284 17 12 16.3284 12 15.5C12 14.6716 11.3284 14 10.5 14C9.84689 14 9.29127 14.4174 9.08535 15H2.91465C2.70873 14.4174 2.15311 14 1.5 14C0.671573 14 0 14.6716 0 15.5C0 16.3284 0.671573 17 1.5 17Z" fill="black"/><path d="M0 19H18V21H0V19Z" fill="black"/><path d="M13 22H0V24H13V22Z" fill="black"/></svg>';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['post', 'project'];

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
    public $builder = [
        // 'items' => [
        //     ['item' => 'Item one'],
        //     ['item' => 'Item two'],
        //     ['item' => 'Item three'],
        // ],
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'post_object' => $this->postHeader(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('post_header');

        $builder
        //     ->addPostObject('acf_block_post_header_post', [
        //     'label' => 'Post Object Field',
        //     'instructions' => '',
        //     'required' => 1,
        //     'post_type' => [],
        //     'taxonomy' => [],
        //     'allow_null' => 0,
        //     'multiple' => 0,
        //     'return_format' => 'object',
        //     'ui' => 1,
        // ])
        ->addText('acf_block_post_header_post')
    ;

        return $builder->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function postHeader()
    {
        return get_field('acf_block_post_header_post');
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
