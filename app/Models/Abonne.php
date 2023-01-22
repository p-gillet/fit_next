<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numavs
 * @property string $dateinscription
 * @property string $datefincontrat
 * @property Programmeindividuel[] $programmeindividuels
 * @property Personne $personne
 * @property Materielfitness[] $materielfitnesses
 * @property AbonneCourscollectif[] $abonneCourscollectifs
 */
class Abonne extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'abonne';

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
    protected $fillable = ['dateinscription', 'datefincontrat'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programmeindividuels()
    {
        return $this->hasMany('App\Models\Programmeindividuel', 'numabonne', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Models\Personne', 'numavs', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materielfitnesses()
    {
        return $this->hasMany('App\Models\Materielfitness', 'numabonne', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonneCourscollectifs()
    {
        return $this->hasMany('App\Models\AbonneCourscollectif', 'numabonne', 'numavs');
    }
}
