<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'address',
      'post_code',
      'contact_number'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
