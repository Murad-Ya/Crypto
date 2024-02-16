<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResources extends JsonResource
{
    public function toArray(Request $request)
    {
        return TransactionResource::collection($this->resource);
    }
}
