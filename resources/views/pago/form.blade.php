@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Pagar')

@section('content_header')
    <h1 class="m-0 text-dark">Detalles</h1>
@stop

@section('css')
    <style>
        .text-danger {
            color: #dc3545;
        }
        #card-element {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
        }
    </style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">Pago</div>
                <div class="card-body">
                    <form action="{{ route('pago.process') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cardholder-name">Nombre del dueño de la tarjeta</label>
                            <input type="text" name="cardholder_name" id="cardholder-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="card-element">Detalles de la tarjeta </label>
                            <div id="card-element" class="form-control">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert" class="text-danger"></div>
                        </div>
                        <input type="hidden" name="total_amount" value="{{ $totalAmount }} ">
                        <input type="hidden" name="id_anuncio" value="{{ $id_anuncio }} ">
                        <input type="hidden" name="membresia_id" value="{{ $membresia_id }} ">
                        <button type="submit" class="btn btn-primary mt-3">Pagar Bs. {{ $totalAmount }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ config('services.stripe.key') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', { style: style, hidePostalCode: true });
    card.mount('#card-element');
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createPaymentMethod({
            type: 'card',
            card: card,
            billing_details: {
                name: document.getElementById('cardholder-name').value,
                email: document.getElementById('email').value,
            },
        }).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.paymentMethod.id);
            }
        });
    });

    function stripeTokenHandler(paymentMethodId) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', paymentMethodId);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@stop
