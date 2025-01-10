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
    protected $primaryKey = 'actorID';

    protected $fillable = [
        'actorID',
        'fullname',
        'ic',
        'phoneNumber',
        'addressID',
        'accountID',
        'statusID'
    ];
    protected $attributes = [
        'statusID' => '1'
    ];

    public function accountType(): HasOne
    {
        return $this->hasOne(AccountType::class, 'accountID', 'accountID');
    }

    public function login(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actorID', 'loginID');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'addressID', 'addressID');
    }

    public function beneficiary(): HasOne
    {
        return $this->hasOne(Beneficiary::class, 'actorID', 'actorID');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'statusID', 'statusID');
    }
}
