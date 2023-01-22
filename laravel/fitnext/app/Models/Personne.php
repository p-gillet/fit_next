<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numavs
 * @property integer $numadresse
 * @property string $nom
 * @property string $prenom
 * @property string $sexe
 * @property string $numtelephone
 * @property string $photo
 * @property string $datenaissance
 * @property Employe $employe
 * @property Adresse $adresse
 * @property Abonne $abonne
 */
class Personne extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personne';

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
    protected $fillable = ['numadresse', 'nom', 'prenom', 'sexe', 'numtelephone', 'photo', 'datenaissance'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employe()
    {
        return $this->hasOne('App\Models\Employe', 'numavs', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adresse()
    {
        return $this->belongsTo('App\Models\Adresse', 'numadresse', 'numadresse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function abonne()
    {
        return $this->hasOne('App\Models\Abonne', 'numavs', 'numavs');
    }
}
