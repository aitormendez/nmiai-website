<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class StartEnd extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $startEnd = new FieldsBuilder('start_end');

        $startEnd
            ->addText('generic_block_start_text', [
                'label' => __('Start text', 'sage'),
                'instructions' => '',
                'default_value' => '01',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ])
            ->addText('generic_block_end_text', [
                'label' => __('End text', 'sage'),
                'instructions' => '',
                'default_value' => 'Post title',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ]);

        return $startEnd;
    }
}
