<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friends extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'userrequest_id',
        'userreceiver_id',
        'accepted',
    ];

    public function userrequest(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userreceiver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
