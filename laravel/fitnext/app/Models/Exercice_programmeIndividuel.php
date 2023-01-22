<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercice_programmeIndividuel extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'exercice_programmeIndividuel';

    /**
     * @var array
     */
    protected $fillable = [];
}
