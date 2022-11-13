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
                ->addTrueFalse('has_header_unique_emoji', [
                    'label' => __('Header Unique Emoji', 'sage'),
                    'instructions' => __('If active, the emoji will always be the same. It will not change for each user session.', 'sage'),
                    'message' => '',
                    'default_value' => 0,
                    'ui_on_text' => 'On',
                    'ui_off_text' => 'Off',
                ])
                ->addText('header_unique_emoji')
                    ->conditional('has_header_unique_emoji', '==', 1)
                ->addRepeater('header_emojis', [
                    'label' => __('Header Emoji List', 'sage'),
                    'instructions' => __('An emoji from the list will appear randomly in the header in each user session.', 'sage'),
                    'required' => 0,
                    'conditional_logic' => [
                        [
                            'field' => 'has_header_unique_emoji',
                            'operator' => '==',
                            'value' => '0',
                        ],
                    ],
                    'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                    ],
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => 'Add emoji',
                ])
                    ->addText('header_emoji')
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
                ]);
            ;

        return $options->build();
    }
}
