<?php
/**
 * Created by PhpStorm.
 * User: intel
 * Date: 9/20/2016
 * Time: 12:01 AM
 */

namespace App\Helper\Transformer;


class TopicTransformer extends Transfomer
{

    /**
     *  method to be implemented
     *
     * @param array $item
     * @return mixed
     */
    public function transform(array $item)
    {
        return  array(
            'title' => $item['title'],
            'description' => $item['description'],
            'subject_id' => $item['subject_id']
        );
    }
}