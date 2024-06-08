<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(['anuncio', 'user'])->get();
        $users = User::all();
        return view('pago.index', compact('pagos', 'users'));
    }

    public function showPaymentForm(Request $request)
    {
        $totalAmount = $request->query('total_amount');
        return view('pago.form', compact('totalAmount'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentMethod = $request->input('payment_method');
        $amount = $request->input('total_amount') * 100; // Convertir a centavos

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                'payment_method' => $paymentMethod,
                'confirmation_method' => 'manual',
                'confirm' => true,
                //'return_url' => route('pago.success'),
                'return_url' => route('pago.success', ['total_amount' => $request->input('total_amount')]), // Pasar el monto total como parámetro
            ]);
            return redirect()->route('pago.success', ['total_amount' => $request->input('total_amount')]);
            //return redirect()->route('pago.success')->with('total_amount', $request->input('total_amount'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Hubo un error con el pago: ' . $e->getMessage()]);
        }
    }

    public function paymentSuccess(Request $request)
    {
        dd($request->all());
        // Verifica que el request contiene el parámetro total_amount
        $user = Auth::user();
        $amount = $request->query('total_amount') * 100; // Multiplicar por 100 para obtener el valor en centavos
        
        // Asegúrate de que el usuario tiene un método de pago predeterminado
        if ($user->hasDefaultPaymentMethod()) {
            $user->charge($amount, $user->defaultPaymentMethod()->id);
        } else {
            return back()->withErrors(['message' => 'No se pudo completar el pago porque no se encontró un método de pago predeterminado.']);
        }
    
        // Guardar el pago en la base de datos
        Pago::create([
            'fecha_pago' => now(),
            'monto' => $amount / 100, // Dividir el monto por 100 para obtener el valor en dólares
            'anuncio_id' => 1, // Reemplaza con el ID del anuncio correcto
            'user_id' => $user->id,
            'stripe_payment_id' => $request->query('payment_intent'), // Asegúrate de que estás obteniendo el ID correcto del intento de pago
        ]);
    
        // Redirigir al usuario a la página de éxito
        return view('pago.success', ['total_amount' => $amount / 100]); 
    }
}
