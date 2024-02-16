<?php

namespace App\Http\Controllers;

use App\Http\Resources\Transaction\TransactionResource;
use App\Http\Resources\Transaction\TransactionResources;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index()
    {
        $model = Transaction::get();
        return response()->json(
          new TransactionResources($model)
        );
    }

    public function store(Request $request)
    {
        $uuid = Str::uuid();
        $request->merge([
           'uuid' => $uuid
        ]);
        Transaction::create($request->all());
        return response()->json([
            'message' => 'Транзакция создана.'
        ]);
    }
}
