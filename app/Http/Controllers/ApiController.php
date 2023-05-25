<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function deposit() {
        // $request->validate([
        //     'order_id' => 'required',
        //     'amount' => 'required|numeric'
        // ]);

        return response()->json([
            "message" => "success",
            "data" => [
                "order_id" => "123",
                "amount" => "123",
                "status" => "success"
            ]
        ]);
    }
}
