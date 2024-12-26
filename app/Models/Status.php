<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'statusID';
    protected $fillable = [
        'entityType',
        'statusType',
    ];

    public function actor(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'statusID', 'statusID');
    }
    public function beneficiary(): BelongsToMany
    {
        return $this->belongsToMany(Beneficiary::class, 'statusID', 'statusID');
    }

    public function transportation(): BelongsToMany
    {
        return $this->belongsToMany(Transportation::class, 'statusID', 'statusID');
    }
}
