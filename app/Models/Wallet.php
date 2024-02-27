<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
protected $table ='wallet';
protected $fillable = [
  'user_id',
  'balance'
];

public function user()
{
    return $this->hasOne(User::class, 'user_id', 'id');
}
}
