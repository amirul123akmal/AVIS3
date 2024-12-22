<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Actor extends Model
{
    use HasFactory;

    protected $table = 'actor';

    protected $fillable = [
        'actorID',
        'fullname',
        'ic',
        'phoneNumber',
        'addressID',
        'accountID',
    ];

    public function login(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actorID', 'loginID');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'addressID', 'addressID');
    }
}
