<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursCollectif extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'coursCollectif';

    /**
     * @var array
     */
    protected $fillable = [];
}
