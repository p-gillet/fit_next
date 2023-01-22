<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeIndividuel extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'programmeIndividuel';

    /**
     * @var array
     */
    protected $fillable = [];
}
