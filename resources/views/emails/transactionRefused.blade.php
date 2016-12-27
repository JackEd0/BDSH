@extends('layouts.email')

@section('title')
    Votre commande a été refusée
@stop

@section('content')
    <p style="padding-top: 10px; color:black;">
        Bonjour {{ $user['first_name'] }} {{ $user['last_name'] }},
    </p>
    <p style="color:black;">
        Votre commande numéro {{ $transaction->id }} a été traitée par notre archiste. Malheureusement, elle a été
        refusée.
    </p>
    @if(isset($transaction->comment_admin))
        <p style="color:black;">
            Notre archiviste vous a laissé un commentaire pour justifier son refus :{{ $transaction->comment_admin }}
        </p>
    @endif
    <p style="color:black;">
        Vous pouvez toujours consulter votre commande en suivant ce lien <a
                href="{{ url('/clientvieworder/'.\Crypt::encrypt($transaction->id)) }}">Ma commande</a>
    </p>
@stop