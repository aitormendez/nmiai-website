<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Page extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('page');

        $builder
            ->setLocation('post_type', '==', 'page');

        $builder
            ->addTab(__('JSON title', 'sage'), ['placement' => 'top'])
            ->addFile('json_header_json', [
                'label' => __('Json Lottie animation', 'sage'),
                'instructions' => '',
                'required' => 0,
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'json',
            ])
            ->addTrueFalse('json_header_autoplay', [
                'label' => __('Autoplay', 'sage'),
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => __('On'),
                'ui_off_text' => __('Off'),
            ])
            ->addTrueFalse('json_header_loop', [
                'label' => __('Loop', 'sage'),
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => __('On', 'sage'),
                'ui_off_text' => __('Off', 'sage'),
            ])
            ->addTrueFalse('json_header_mobile', [
                'label' => __('Show in mobile'),
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => __('On', 'sage'),
                'ui_off_text' => __('Off', 'sage'),
            ])
            ->addTab(__('HTML styled title', 'sage'), ['placement' => 'top'])
            ->addWysiwyg('page_title', [
                'label' => 'Title',
                'instructions' => 'use this to show a title different than URL. It can be styled with HTML tags',
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 1,
            ]);

        return $builder->build();
    }
}
