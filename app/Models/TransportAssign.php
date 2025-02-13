<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TransportAssign extends Model
{
    protected $table = 'transportassign';
    protected $primaryKey = 'transAssignID';
    protected $fillable = [
        'reqID',
        'transID',
    ];

    public function requestTransport(): BelongsTo
    {
        return $this->belongsTo(RequestTransport::class, 'reqID', 'reqID');
    }
    public function transportation(): BelongsTo
    {
        return $this->belongsTo(Transportation::class, 'transID', 'transID');
    }
}
