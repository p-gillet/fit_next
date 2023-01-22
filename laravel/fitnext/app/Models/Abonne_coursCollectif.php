<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonne_coursCollectif extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'abonne_courscollectif';

    /**
     * @var array
     */
    protected $fillable = [];

    public $timestamps = false;
}
