<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursCollectif extends Model
{
    public $timestamps = false;

    /** 
     * Get the coaches for the course.
     */
    public function coaches() {
        return $this->belongsToMany('App\Models\Coach', 'coach_courscollectif', 'numcours', 'numcoach');
    }

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'courscollectif';

    /**
     * @var array
     */
    protected $fillable = [];

    /** primary key
     * 
     */
    protected $primaryKey = 'numcours';
}
