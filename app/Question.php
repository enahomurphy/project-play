<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * refercences the questions table
     *
     * @var string
     */
    protected  $table = "questions";


    /**
     * fillable columns
     *
     * @var array
     */
    protected  $fillable = [
        'title', 'hint', 'answer', 'details', 'info', 'pic', 'topic_id'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at', 'topic_id'
    ];

}