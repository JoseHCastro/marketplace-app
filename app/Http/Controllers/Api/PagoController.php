<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Pago;


class PagoController extends Controller{


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'monto' => 'required|numeric',
            'paypal_payment_id' => 'required|string',
            'membresia_id' => 'required|exists:membresias,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $pago = new Pago();
        $pago->fecha_pago = now();
        $pago->monto = $request->monto;
        $pago->user_id = $request->user_id;
        $pago->paypal_payment_id = $request->paypal_payment_id;
        $pago->membresia_id = $request->membresia_id;
        
        $pago->stripe_payment_id = $request->stripe_payment_id ?? null;
        $pago->save();

        return response()->json(['message' => 'Pago registrado con éxito', 'pago' => $pago], 201);
    }

}

