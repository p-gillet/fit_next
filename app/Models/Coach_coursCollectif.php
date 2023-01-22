<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach_coursCollectif extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'coach_courscollectif';

    /**
     * @var array
     */
    protected $fillable = [];

    /** primary key
     * 
     */
    protected $primaryKey = ['numcours', 'numcoach'];
}
