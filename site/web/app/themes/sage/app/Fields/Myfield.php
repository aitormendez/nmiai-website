<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Myfield extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $example = new FieldsBuilder('myfield');

        $example
            ->setLocation('post_type', '==', 'post');

        $example
            ->addRepeater('cosas')
                ->addText('cosa')
            ->endRepeater();

        return $example->build();
    }
}
