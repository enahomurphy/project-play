<?php


namespace App\Helper\Transformer;


class SubjectTransformer extends Transfomer
{

    /**
     *  method to be implemented
     *
     * @param array $item
     * @return array
     */
    public function transform(array $item)
    {
        return [
            'name' => $item['name'],
            'description' => $item['description'],
            'course_id' => $item['course_id']
        ];
    }
}