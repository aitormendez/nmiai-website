<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class People extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'People';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Person image with data';

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
    public $icon = '<svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 2.5C6 3.88071 4.88072 5 3.5 5C2.11929 5 1 3.88071 1 2.5C1 1.11929 2.11929 0 3.5 0C4.88072 0 6 1.11929 6 2.5Z" fill="black"/><path d="M1.22436 18.1673C1.80701 17.5784 2.75674 17.5733 3.34565 18.156C5.4856 20.2732 8.59993 23.2352 13.6125 22.8369C15.6756 22.673 17.1861 22.1013 18.1615 21.5922C18.6506 21.3369 19.0069 21.0963 19.2313 20.9289C19.3435 20.8452 19.4224 20.78 19.4682 20.7407C19.4789 20.7315 19.4879 20.7237 19.4949 20.7174C19.5029 20.7104 19.5085 20.7053 19.5118 20.7022L19.5141 20.7001C20.1087 20.1312 21.0519 20.1474 21.6265 20.7386C22.2013 21.3299 22.1906 22.2736 21.6045 22.8518L21.5702 22.8831C21.5245 22.925 21.4503 22.9929 21.4227 23.0166C21.3277 23.0982 21.1953 23.2066 21.0252 23.3334C20.6853 23.587 20.194 23.9153 19.5497 24.2517C18.2582 24.9258 16.3589 25.6282 13.8501 25.8275C7.36794 26.3425 3.37562 22.4058 1.23571 20.2886C0.646796 19.706 0.641718 18.7562 1.22436 18.1673Z" fill="black"/><path d="M21.5964 22.8597C21.6091 22.8478 21.6105 22.8463 21.6045 22.8518L21.5964 22.8597Z" fill="black"/><path d="M19.5 5C20.8807 5 22 3.88071 22 2.5C22 1.11929 20.8807 0 19.5 0C18.1193 0 17 1.11929 17 2.5C17 3.88071 18.1193 5 19.5 5Z" fill="black"/></svg>';

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
        // ],
        // [
        //     'name' => 'dynamic',
        //     'label' => 'Dynamic',
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
            'person' => $this->person(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $people = new FieldsBuilder('people');

        $people
            ->addText('people_video_zone', [
                'label' => __('Bunny.net video zone', 'sage'),
                'default_value' => 'vz-3b6a9b31-e3a',
                'required' => 1,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ])
            ->addText('people_video_id', [
                'label' => __('Video ID', 'sage'),
                'default_value' => '6ea813d4-bd21-439f-8d1a-02f0645a51fa',
            ])
            ->addText('people_video_poster', [
                'label' => __('Video poster', 'sage'),
                'default_value' => 'https://vz-3b6a9b31-e3a.b-cdn.net/6ea813d4-bd21-439f-8d1a-02f0645a51fa/thumbnail_9e3e7e72.jpg',
                'required' => 1,
            ])
            ->addText('people_name', [
                'label' => __('Person name', 'sage'),
                'required' => 1,
            ])
            ->addText('people_title', [
                'label' => __('Person title', 'sage'),
                'required' => 1,
            ])
            ->addTextarea('people_text', [
                'label' => __('Person text', 'sage'),
                'required' => 1,
            ])
            ->addText('people_email', [
                'label' => __('Person email', 'sage'),
                'required' => 1,
            ]);

        return $people->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function person()
    {
        $person = [
            'people_name' => get_field('people_name'),
            'people_video_zone' => get_field('people_video_zone'),
            'people_video_id' => get_field('people_video_id'),
            'people_video_poster' => get_field('people_video_poster'),
            'people_text' => get_field('people_text'),
            'people_email' => get_field('people_email'),
            'people_title' => get_field('people_title'),
        ];

        return $person;
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
