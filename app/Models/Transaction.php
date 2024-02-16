<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'uuid',
        'price',
        'crypto_id',
        'is_active',
    ];


    public function transaction()
    {
        return $this->hasOne(Crypto::class , 'crypto_id', 'id');
    }
}
