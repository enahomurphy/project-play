<?php

namespace App\Helper\Transformer;


class CourseTransformer extends Transfomer
{


    /**
     * transform single course
     *
     * @param array $course
     * @return array
     */
    public function transform(array $course)
    {
        return [
            'title' => $course['title'],
            'class' => $course['class'],
            'description' => $course['description']
        ];
    }
}