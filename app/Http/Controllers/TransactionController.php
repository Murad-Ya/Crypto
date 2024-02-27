<?php

namespace App\Http\Controllers;

use App\Http\Resources\Transaction\TransactionResource;
use App\Http\Resources\Transaction\TransactionResources;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $request->merge([
           'uuid' => Str::uuid()
        ]);
        DB::transaction(function () use ($request) {
            $id = Transaction::create($request->all());
            DB::table('wallet')
                ->where('user_id' , $request->input('user_id'))
                ->decrement('balance', $request->input('price'));
        });
        Transaction::create($request->all());
        return response()->json([
            'message' => 'Транзакция создана.'
        ]);
    }
}
