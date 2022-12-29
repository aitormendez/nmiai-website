<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class SingleProject extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $builder = new FieldsBuilder('single_project');

        $builder
            ->setLocation('post_type', '==', 'project');

        $builder
            ->addTab(__('Project Header Hero', 'sage'), ['placement' => 'top'])
                ->addSelect('single_project_type', [
                    'label' => __('Select content type', 'sage'),
                    'choices' => [
                        'image' => __('Image', 'sage'),
                        'video' => __('Video', 'sage'),
                    ],
                    'default_value' => ['image'],
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ])
                ->addImage('single_project_image', [
                    'label' => __('Image', 'sage'),
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'single_project_type',
                                'operator' => '==',
                                'value' => 'image',
                            ]
                        ]
                    ],
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ])
                ->addText('single_project_video_zone', [
                    'label' => __('Bunny.net video zone', 'sage'),
                    'default_value' => 'vz-3b6a9b31-e3a',
                    'placeholder' => 'vz-3b6a9b31-e3a',
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'single_project_type',
                                'operator' => '==',
                                'value' => 'video',
                            ]
                        ]
                    ],
                ])
                ->addText('single_project_video_id', [
                    'label' => __('Video ID', 'sage'),
                    'default_value' => '4b094017-2e10-478a-a709-06d0c186855d',
                    'placeholder' => '4b094017-2e10-478a-a709-06d0c186855d',
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'single_project_type',
                                'operator' => '==',
                                'value' => 'video',
                            ]
                        ]
                    ],
                ])
                ->addText('single_project_video_poster', [
                    'label' => __('Video poster', 'sage'),
                    'default_value' => 'https://vz-3b6a9b31-e3a.b-cdn.net/6ea813d4-bd21-439f-8d1a-02f0645a51fa/thumbnail_9e3e7e72.jpg',
                    'placeholder' => 'https://vz-3b6a9b31-e3a.b-cdn.net/6ea813d4-bd21-439f-8d1a-02f0645a51fa/thumbnail_9e3e7e72.jpg',
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'single_project_type',
                                'operator' => '==',
                                'value' => 'video',
                            ]
                        ]
                    ],
                ])

        ;

        return $builder->build();
    }
}
