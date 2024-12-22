<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $primaryKey = 'addressID';

    protected $fillable = [
        'road',
        'postcode',
        'stateID',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'stateID', 'stateID');
    }

    public function actor(): HasOne
    {
        return $this->hasOne(Actor::class, 'addressID', 'addressID');
    }
}
