<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCryptoRequest;
use App\Http\Resources\Crypto\CryptoResources;
use App\Models\Crypto;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function index()
    {
       $model = Crypto::get();
           return response()->json([
               new CryptoResources($model)
           ]);
    }

    public function store(StoreCryptoRequest $request)
    {
        try {
            Crypto::create($request->only([
                'name', 'price', 'description', 'symbol'
            ]));
            return response()->json([
               'message' => 'Валюта добавлена'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ] ,500 );
        }
    }

    public function update(int $id , Request $request)
    {
        try {
            Crypto::find($id)
                ->update($request->only([
                    'name', 'price', 'description', 'symbol'
                ]));
            return response()->json([
               'message' => "Модель $id обновлена"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
               "message" => $exception->getMessage()
            ] ,500 );
        }
    }
    public function destroy(int $id , Request $request)
    {
        Crypto::destroy($id);
        return response()->json();
    }
}
