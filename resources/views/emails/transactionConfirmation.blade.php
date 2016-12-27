@extends('layouts.email')

@section('title')
    Confirmation de votre commande
@stop

@section('content')
    <p style="padding-top: 10px; color:black;">
        Bonjour {{ $user['first_name'] }} {{ $user['last_name'] }},
    </p>
    <p style="color:black;">
        Votre commande a bien été placée à la Société d'Histoire de Sherbrooke et porte le numéro {{ $transaction_id }}.
        Les informations concernant le paiement vous seront envoyées lorsque notre archiviste aura traité votre
        commande.
    </p>
    <p style="color:black;">
        Vous pouvez suivre votre commande en suivant ce lien <a
                href="{{ url('/clientvieworder/'.\Crypt::encrypt($transaction_id)) }}">Ma commande</a>
    </p>
@stop