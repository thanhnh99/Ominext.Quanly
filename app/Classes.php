<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'class';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'courseId'];

    

    public function course()
    {
        return $this->belongTo('App\Course','courseId');
    }
    public function lesson()
    {
        return $this->hasMany('App\Lesson','lessonId');
    }
}
