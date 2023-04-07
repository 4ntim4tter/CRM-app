<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'client_name',
        'description',
        'user_name',
        'status',
        'client_id',
        'deadline'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
