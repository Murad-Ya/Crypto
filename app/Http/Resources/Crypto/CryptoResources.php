<?php

namespace App\Http\Resources\Crypto;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return CryptoResource::collection($this->resource);
    }
}
