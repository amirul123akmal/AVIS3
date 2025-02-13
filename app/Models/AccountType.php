<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountType extends Model
{
    protected $table = 'accounttype';
    protected $primaryKey = 'accountID';

    protected $fillable = [
        'accountType'
    ];

    public function actor(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'accountID', 'accountID');
    }
}
