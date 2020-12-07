<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    public function user() : BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pokemonTeam() : HasMany
    {
        return $this->hasMany('App\Models\PokemonTeam');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer'
    ];
}
