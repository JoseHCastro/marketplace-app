<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Pago;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Models\UsuarioMembresia;

class StripeApiController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function handlePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer',
            'currency' => 'required|string',
            'user_id' => 'required|integer',
            'membresia_id' => 'integer',
            'payment_method_id' => 'required|string',
        ]);

        try {
            $amount = $request->input('amount');
            $currency = $request->input('currency');
            $userId = $request->input('user_id');
            $membresiaId = $request->input('membresia_id');
            $paymentMethodId = $request->input('payment_method_id');

            // Crear un PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => 'https://your-frontend-url.com/payment-complete',
            ]);

            // Guardar el pago en la base de datos
            Pago::create([
                'fecha_pago' => now(),
                'monto' => $amount / 100,
                'anuncio_id' => null,
                'membresia_id' => $membresiaId,
                'user_id' => $userId,
            ]);

            $fechaInicio = Carbon::now();
            $fechaFinal = $fechaInicio->copy()->addDays(30);

            UsuarioMembresia::create([
                'usuario_id' => $userId,
                'membresia_id' => $membresiaId,
                'fecha_inicio' => $fechaInicio,
                'fecha_final' => $fechaFinal,
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
                'paymentIntentStatus' => $paymentIntent->status,
                'requires_action' => $paymentIntent->status == 'requires_action',
                'redirect_url' => $paymentIntent->next_action->redirect_to_url->url ?? null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
