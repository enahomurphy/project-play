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


    /**
     * creates a many to one relationship with course model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function course()
    {
        return $this->belongsTo('App\Course');
    }


    /**
     * creates a one to many relationship with topics model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topic()
    {
        return $this->hasMany('App\Topic');
    }

}