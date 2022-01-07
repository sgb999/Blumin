<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'address',
      'post_code',
      'contact_number'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
