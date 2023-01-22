<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMateriel extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'typeMateriel';

    /**
     * @var array
     */
    protected $fillable = [];
}
