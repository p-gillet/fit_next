<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numexercice
 * @property string $description
 * @property string $musclestravaille
 * @property Typemateriel[] $typemateriels
 * @property Programmeindividuel[] $programmeindividuels
 */
class Exercice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'exercice';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'numexercice';

    /**
     * @var array
     */
    protected $fillable = ['description', 'musclestravaille'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function typemateriels()
    {
        return $this->belongsToMany('App\Models\Typemateriel', 'typemateriel_exercice', 'numexercice', 'numtype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function programmeindividuels()
    {
        return $this->belongsToMany('App\Models\Programmeindividuel', null, 'numexercice', 'numprogramme');
    }
}
