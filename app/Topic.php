<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    /**
     * refercences the questions table
     *
     * @var string
     */
    protected  $table = "topics";


    /**
     * fillable columns
     *
     * @var array
     */
    protected  $fillable = [
        'title', 'description', 'subject_id'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at', 'subject_id'
    ];

}