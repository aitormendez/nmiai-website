<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class headerJson extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('json_header');

        $builder
            ->setLocation('post_type', '==', 'page');

        $builder
            ->addFile('json_header_json', [
                'label' => __('Json Lottie animation', 'sage'),
                'instructions' => '',
                'required' => 0,
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
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
        ;


        return $builder->build();
    }
}
