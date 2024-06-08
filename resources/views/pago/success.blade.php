@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Pago Exitoso')

@section('content_header')
    <h1 class="m-0 text-dark">Pago Exitoso</h1>
@stop

@section('content')
    <div class="alert alert-success">
        <h4>¡Tu pago se ha realizado con éxito!</h4>
        <p>Monto pagado: Bs. {{ session('total_amount') }}</p>
    </div>
@stop
