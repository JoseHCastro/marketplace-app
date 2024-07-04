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
    public function index(Request $request)
    {
        $user = auth()->user(); // Obtiene el usuario autenticado
        $userId = $request->input('user');
        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');
        $query = Pago::with(['anuncio', 'user', 'membresia']);

    // Verifica si el usuario es un administrador
        if ($user->hasRole('administrador')) {
        if ($userId) {
            $query->where('user_id', $userId);
        }
        } else {
        // Si el usuario no es administrador, solo muestra sus propios pagos
            $query->where('user_id', $user->id);
        }

        if ($fechaDesde) {
            $query->whereDate('fecha_pago', '>=', $fechaDesde);
        }

        if ($fechaHasta) {
            $query->whereDate('fecha_pago', '<=', $fechaHasta);
        }

        $pagos = $query->get();
        $users = User::all();

        return view('pago.index', compact('pagos', 'users'));
    }



    public function showPaymentForm(Request $request)
    {

        $id_anuncio = $request->id_anuncio;
        $membresia_id = $request->membresia_id;
        $totalAmount = $request->total_amount;
        return view('pago.form', compact('totalAmount','id_anuncio','membresia_id'));
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

            // Verifica que el request contiene el parámetro total_amount
            $user = Auth::user();
            $usuario = User::find($user->id);
           // $amount = $amount * 100; // Multiplicar por 100 para obtener el valor en centavos


          //  if ($user->hasDefaultPaymentMethod()) {
            //    $user->charge($amount, $user->defaultPaymentMethod()->id);
            //} else {
           //     return back()->withErrors(['message' => 'No se pudo completar el pago porque no se encontró un método de pago predeterminado.']);
           // }
            $datos = [
                'fecha_pago' => now(),
                'monto' => $amount / 100,
                'anuncio_id' => $request->id_anuncio,
                'user_id' => $user->id,
                'membresia_id' => $request->membresia_id,
                'stripe_payment_id' => $paymentIntent->id,
            ];
            if ($request->membresia_id != null){
                $usuario->membresia_id=$request->membresia_id;
                $usuario->save();
            }


            Pago::create($datos);


            return view('pago.success', ['total_amount' => $amount / 100]);

            //return redirect()->route('pago.success', ['total_amount' => $request->input('total_amount')]);
            //return redirect()->route('pago.success')->with('total_amount', $request->input('total_amount'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Hubo un error con el pago: ' . $e->getMessage()]);
        }
    }

    public function paymentSuccess(Request $request)
    {
        dd($request);
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
        //AQUI
        // Redirigir al usuario a la página de éxito
        return view('pago.success', ['total_amount' => $amount / 100]);
    }

}
