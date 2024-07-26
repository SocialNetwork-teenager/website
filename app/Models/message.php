<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class message extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'usersender',
        'type',
        'url',
        'content',
        'userreceiver',
    ];

    public function usersender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usersender');
    }

    public function userreceiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userreceiver');
    }
}
