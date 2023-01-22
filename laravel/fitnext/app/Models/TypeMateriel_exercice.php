<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMateriel_exercice extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'typeMateriel_exercice';

    /**
     * @var array
     */
    protected $fillable = [];
}
