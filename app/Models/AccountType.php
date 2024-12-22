<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountType extends Model
{
    protected $table = 'accountType';
    protected $primaryKey = 'accountID';

    protected $fillable = [
        'accountType'
    ];

    public function actor(): HasMany
    {
        return $this->hasMany(Actor::class, 'accountID', 'accountID');
    }
}
