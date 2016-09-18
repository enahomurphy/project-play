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

    
    /**
     * creats a many to one relationship with subject model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }


    /**
     * creats a one to many relation ship with question model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question()
    {
        return $this->hasMany('App\Question');
    }
}