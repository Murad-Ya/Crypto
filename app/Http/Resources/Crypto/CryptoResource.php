<?php

namespace App\Http\Resources\Crypto;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
          "name" => $this->name,
          "price" => $this->price,
          "description" => $this->description,
          "symbol" => $this->symbol
        ];
    }
}
