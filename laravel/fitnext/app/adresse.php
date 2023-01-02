<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numadresse
 * @property string $ville
 * @property integer $codepostale
 * @property string $rue
 * @property string $numeroderue
 * @property Local[] $locals
 * @property Personne[] $personnes
 */
class adresse extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'adresse';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numadresse';

    /**
     * @var array
     */
    protected $fillable = ['ville', 'codepostale', 'rue', 'numeroderue'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locals()
    {
        return $this->hasMany('App\Models\Local', 'numadresse', 'numadresse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personnes()
    {
        return $this->hasMany('App\Models\Personne', 'numadresse', 'numadresse');
    }
}
