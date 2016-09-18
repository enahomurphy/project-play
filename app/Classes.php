<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{

    /**
     * refercences the questions table
     *
     * @var string
     */
    protected  $table = "classes";


    /**
     * fillable columns
     *
     * @var array
     */
    protected  $fillable = [
        'name'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at'
    ];
}