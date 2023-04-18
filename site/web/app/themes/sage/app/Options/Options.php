<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Options extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('options');

        $options
            ->addTab(__('Header emoji', 'sage'), ['placement' => 'left'])
                ->addRadio('header_type', [
                    'label' => 'Header type',
                    'instructions' => '',
                    'required' => 0,
                    'choices' => [
                        'fixed' => 'Fixed',
                        'random_list' => 'Random list (per user session)',
                        'slot_machine' => 'Slot machine',
                    ],
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'save_other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'vertical',
                    'return_format' => 'value',
                ])
                ->addTrueFalse('unique_emoji_or_image', [
                    'label' => __('Unique emoji or image', 'sage'),
                    'message' => '',
                    'default_value' => 2,
                    'ui_on_text' => 'Emoji',
                    'ui_off_text' => 'Image',
                ])
                    ->conditional('header_type', '==', 'fixed')
                ->addText('header_unique_emoji')
                    ->conditional('header_type', '==', 'fixed')
                    ->conditional('unique_emoji_or_image', '==', 1)
                ->addImage('header_unique_image', [
                    'instructions' => __('Max 100px x 100px', 'sage'),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '100',
                    'max_height' => '100',
                    'max_size' => '',
                    'mime_types' => '',
                ])
                    ->conditional('unique_emoji_or_image', '==', 0)
                ->addRepeater('header_emojis', [
                    'label' => __('Header Emoji List', 'sage'),
                    'instructions' => __('An emoji from the list will appear randomly in the header in each user session.', 'sage'),
                    'required' => 0,
                    'conditional_logic' => [
                        [
                            'field' => 'header_type',
                            'operator' => '==',
                            'value' => 'random_list',
                        ],
                    ],
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'Add emoji',
                ])
                    ->addTrueFalse('emoji_or_image', [
                        'label' => __('Emoji or image', 'sage'),
                        'message' => '',
                        'default_value' => 2,
                        'ui_on_text' => 'Emoji',
                        'ui_off_text' => 'Image',
                    ])
                    ->addText('header_emoji')
                        ->conditional('emoji_or_image', '==', 1)
                    ->addImage('header_image', [
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '100',
                        'max_height' => '100',
                        'max_size' => '',
                        'mime_types' => '',
                    ])
                        ->conditional('emoji_or_image', '==', 0)
                ->endRepeater()
                ->addRepeater('header_emojis_slot_machine', [
                    'label' => __('Header Emoji List for the slot machine', 'sage'),
                    'instructions' => __('This list of icons will be displayed on the slot machine', 'sage'),
                    'required' => 0,
                    'conditional_logic' => [
                        [
                            'field' => 'header_type',
                            'operator' => '==',
                            'value' => 'slot_machine',
                        ],
                    ],
                    'min' => 0,
                    'max' => 20,
                    'layout' => 'table',
                    'button_label' => 'Add emoji',
                ])
                    ->addTrueFalse('emoji_or_image_slot_machine', [
                        'label' => __('Emoji or image', 'sage'),
                        'message' => '',
                        'default_value' => 2,
                        'ui_on_text' => 'Emoji',
                        'ui_off_text' => 'Image',
                    ])
                    ->addText('header_emoji_slot_machine')
                        ->conditional('emoji_or_image_slot_machine', '==', 1)
                    ->addImage('header_image_slot_machine', [
                        'instructions' => __('Max 100px x 100px', 'sage'),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '100',
                        'max_height' => '100',
                        'max_size' => '',
                        'mime_types' => '',
                    ])
                        ->conditional('emoji_or_image_slot_machine', '==', 0)
                ->endRepeater()
            ->addTab(__('Footer', 'sage'), ['placement' => 'left'])
                ->addText('footer_left_text', [
                    'label' => __('Left text', 'sage'),
                    'required' => 1,
                    'default_value' => '©2022 No Man Is An Island',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ])
                ->addText('footer_right_text', [
                    'label' => __('Right text', 'sage'),
                    'required' => 1,
                    'default_value' => 'Impressum & Datenschutz',
                ])
                ->addRepeater('footer_links', [
                    'label' => __('Footer links', 'sage'),
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'Add link',
                    ])
                    ->addLink('footer_link', [
                        'label' => 'Link',
                        'return_format' => 'array',
                    ])
                ->endRepeater()
            ;

        return $options->build();
    }
}
