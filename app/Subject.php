<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    /**
     * refercences the questions table
     *
     * @var string
     */
    protected  $table = "subjects";


    /**
     * fillable columns
     *
     * @var array
     */
    protected  $fillable = [
        'name', 'description', 'course_id'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at', 'course_id'
    ];
}