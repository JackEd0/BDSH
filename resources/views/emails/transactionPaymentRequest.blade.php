@extends('layouts.email')

@section('title')
    Votre commande a été acceptée - Demande de paiement
@stop

@section('content')
    <p style="padding-top: 10px; color:black;">
        Bonjour {{ $user['first_name'] }} {{ $user['last_name'] }},
    </p>
    <p style="color:black;">
        Votre commande numéro {{ $transaction->id }} a été acceptée. Vous pouvez effectuer le paiement en ligne en
        accédant à votre commande <a href="{{ url('/clientvieworder/'.\Crypt::encrypt($transaction->id)) }}">Ma
            commande</a>. Si vous ne préférez pas faire votre paiement en ligne, veuillez contacter la Société
        d'Histoire de Sherbrooke.
    </p>
@stop