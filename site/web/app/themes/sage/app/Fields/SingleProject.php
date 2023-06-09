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
                    'json' => __('JSON animation', 'sage'),
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
            ->addFile('single_project_json', [
                'label' => __('Json Lottie animation', 'sage'),
                'instructions' => '',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'single_project_type',
                            'operator' => '==',
                            'value' => 'json',
                        ]
                    ]
                ],
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'json',
            ])
            ->addTrueFalse('single_project_json_autoplay', [
                'label' => __('Autoplay', 'sage'),
                'conditional_logic' => [
                    [
                        [
                            'field' => 'single_project_type',
                            'operator' => '==',
                            'value' => 'json',
                        ]
                    ]
                ],
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => __('On'),
                'ui_off_text' => __('Off'),
            ])
            ->addTrueFalse('single_project_json_loop', [
                'label' => __('Loop', 'sage'),
                'conditional_logic' => [
                    [
                        [
                            'field' => 'single_project_type',
                            'operator' => '==',
                            'value' => 'json',
                        ]
                    ]
                ],
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => __('On', 'sage'),
                'ui_off_text' => __('Off', 'sage'),
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
            ->addTab(__('Intro text', 'sage'))
            ->addTextarea('single_project_intro', [
                'label' => __('Intro text', 'sage'),
                'instructions' => __('It is shown in the + dropdown button in the post block and in the projects of the main projects page.', 'sage'),
                'maxlength' => '',
                'rows' => '',
                'new_lines' => 'wpautop', // Possible values are 'wpautop', 'br', or ''.
            ]);

        return $builder->build();
    }
}
