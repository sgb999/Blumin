<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'job_role'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**public function client(): HasOneOrMany
    {
        return $this->hasMany(ClientContacts::class);
    }*/
}
