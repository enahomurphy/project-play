<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    /**
     * refercences the courses table
     *
     * @var string
     */
    protected  $table = "courses";


    /**
     * fillable columns
     *
     * @var array
     */
    protected  $fillable = [
        'title', 'description', 'class_id'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at', 'class_id'
    ];

}