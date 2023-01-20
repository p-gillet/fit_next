<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numlocal
 * @property integer $numadresse
 * @property Adresse $adresse
 * @property Materielfitness[] $materielfitnesses
 * @property Courscollectif[] $courscollectifs
 */
class Local extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'local';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numlocal';

    /**
     * @var array
     */
    protected $fillable = ['numadresse'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adresse()
    {
        return $this->belongsTo('App\Models\Adresse', 'numadresse', 'numadresse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materielfitnesses()
    {
        return $this->hasMany('App\Models\Materielfitness', 'numlocal', 'numlocal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courscollectifs()
    {
        return $this->hasMany('App\Models\Courscollectif', 'numlocal', 'numlocal');
    }
}
