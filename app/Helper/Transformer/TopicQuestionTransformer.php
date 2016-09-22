<?php
/**
 * Created by PhpStorm.
 * User: intel
 * Date: 9/20/2016
 * Time: 10:08 AM
 */

namespace App\Helper\Transformer;


class TopicQuestionTransformer extends Transfomer
{

    /**
     *  method to be implemented
     *
     * @param array $item
     * @return mixed
     */
    public function transform(array $item)
    {
        return [
            "id" => $item['id'],
            'title' => $item['title'],
            'hint' => $item['hint'],
            'anwser' => $item['anwser'],
            'details' => $item['details'],
            'info' => $item['info'],
            'pic' => $item['pic'],
            'topic_id' => $item['topic_id']
        ];

    }
}