<?php
/**
 * Created by PhpStorm.
 * User: intel
 * Date: 9/19/2016
 * Time: 10:53 AM
 */

namespace App\Helper\Transformer;


class QuestionTransformer extends Transfomer
{


    /**
     * @param array $item
     * @return array
     */
    public function transform(array $item)
    {
        return [
            'title' => $item['title'],
            'hint' => $item['hint'],
            'answer' => $item['answer'],
            'details' => $item['details'],
            'info' => $item['info'],
            'pic' => $item['pic']
        ];
    }



}