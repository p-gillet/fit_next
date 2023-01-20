<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $numavs
 * @property string $certification
 * @property Employe $employe
 * @property Courscollectif[] $courscollectifs
 * @property Programmeindividuel[] $programmeindividuels
 */
class Coach extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'coach';

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
    protected $fillable = ['certification'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employe()
    {
        return $this->belongsTo('App\Models\Employe', 'numavs', 'numavs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courscollectifs()
    {
        return $this->belongsToMany('App\Models\Courscollectif', null, 'numcoach', 'numcours');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programmeindividuels()
    {
        return $this->hasMany('App\Models\Programmeindividuel', 'numcoach', 'numavs');
    }
}
