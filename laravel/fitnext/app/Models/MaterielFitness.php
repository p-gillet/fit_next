<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterielFitness extends Model
{

    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'materielFitness';

    /**
     * @var array
     */
    protected $fillable = [];
}
