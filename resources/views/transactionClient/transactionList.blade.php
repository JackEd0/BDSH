{{--*/ $subbar = 'Profil' /*--}}
@extends('layouts.sign')
@section('title')
    Mes commandes
@stop
@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    <h1 class="form-signin-heading">Mes commandes</h1>
    <br />
    <div>
        <table class="table table-striped table-bordered table-hover" id="ordersList">
            <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>Nombre de documents</th>
                <th>Type licence</th>
                <th>Date de la commande</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id}}</td>
                    <td>{{ $transaction->countDoc }}</td>
                    <td>{{ $transaction->name_fr }} </td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        @if(($transaction->accepted_date == NULL) && ($transaction->paid_date == NULL) && ($transaction->cancelled_date == NULL))
                            <b>En traitement</b>
                        @elseif(($transaction->accepted_date != NULL) && ($transaction->paid_date == NULL) && ($transaction->cancelled_date == NULL))
                            <b>En attente de paiement</b>
                        @elseif(($transaction->accepted_date != NULL) && ($transaction->paid_date != NULL) && ($transaction->cancelled_date == NULL))
                            <b>Payée</b>
                        @elseif(($transaction->refusal_date != NULL) && ($transaction->cancelled_date == NULL))
                            <b>Refusée</b>
                        @elseif(($transaction->cancelled_date != NULL))
                            <b>Annulée</b>
                        @endif
                    </td>
                    <td>
                        @if($transaction->cancelled_date == NULL)
                            <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($transaction->id))}}">Détails</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ Html::script('js/transactionList.js.') }}
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
@stop