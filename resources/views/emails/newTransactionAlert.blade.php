@extends('layouts.email')

@section('title')
    Nouvelle commande
@stop

@section('content')
    <p style="padding-top: 10px; color:black;">
        Bonjour Administrateur,
    </p>
    <p style="color:black;">
        Une nouvelle commande a été placée, vous pouvez la traiter en suivant ce lien <a
                href="{{ url('/transactionView/'.\Crypt::encrypt($transaction_id)) }}">La commande</a>
    </p>
@stop