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
        'title', 'hint', 'answer', 'details', 'info', 'pic'
    ];


    /**
     * columns not retuurned
     *
     * @var array
     */
    protected  $hidden = [
        'created_at', 'updated_at'
    ];


    /**
     * creates a many to one relationship with course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * creates a one to many relationship with topics
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topic()
    {
        return $this->hasMany('App\Topic');
    }


}