<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $table = 'state';
    protected $primaryKey = 'stateID';
    protected $fillable = [
        'statename'
    ];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class, 'stateID', 'stateID');
    }
}
