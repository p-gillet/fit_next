<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numavs
 * @property integer $salaire
 * @property integer $tauxactivite
 * @property Coach $coach
 * @property Personne $personne
 */
class Employe extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'employe';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numavs';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['salaire', 'tauxactivite'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coach()
    {
        return $this->hasOne('App\Models\Coach', 'numavs', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Models\Personne', 'numavs', 'numavs');
    }
}
