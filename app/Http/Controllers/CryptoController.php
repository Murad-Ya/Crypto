<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        try {
            $model = Crypto::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'symbol' => $request->input('symbol')
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "massage" => $exception->getMessage()
            ] ,500 );
        }
    }

    public function update(int $id , Request $request)
    {
        try {
            Crypto::where('id' , '=' , $id)
                ->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description'),
                    'symbol' => $request->input('symbol')
                ]);
        } catch (\Exception $exception) {
            return response()->json([
               "massage" => $exception->getMessage()
            ] ,500 );
        }
    }
    public function destroy(int $id , Request $request)
    {
        $destroy = Crypto::destroy($id);
        return response()->json();
    }
}
