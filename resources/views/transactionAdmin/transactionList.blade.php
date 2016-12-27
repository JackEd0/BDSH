<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-10-26
 * Time: 16:50.
 */
//active le menu Administration
$subbar = 'Administration';
?>
@extends('layouts.sign')
@section('title')
    Commande | Liste
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <h1>Liste des commandes</h1>
    <br/>

    <div>
        <table class="table table-striped table-bordered table-hover" id="ordersList"
               data-search="true">
            <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>Propriétaire de licence</th>
                <th>Date émission</th>
                <th>Date d'acceptation</th>
                <th>Date de refus</th>
                <th>Date de paiment</th>
                <th>Type licence</th>
                <th>Nombre de documents</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            {{--*/ $i = 0; /*--}}
            @foreach ($transactions as $transaction)
                <tr>
                    <td> {{ $transaction->id }} </td>
                    <td> {{ $licenceOwners[$i] }} </td>
                    <td> {{ $transaction->created_at }} </td>
                    <td> {{ $transaction->accepted_date }} </td>
                    <td> {{ $transaction->refusal_date }} </td>
                    <td> {{ $transaction->paid_date }} </td>
                    <td> {{ $transaction->name_fr}} </td>
                    <td> {{ $transaction->countDoc}} </td>
                    <td>
                        <a href="{{ URL::route('transactionAdmin.transactionView', \Crypt::encrypt($transaction->id))}}">Traiter</a>
                    </td>
                </tr>
                {{--*/  ++$i; /*--}}
            @endforeach
            </tbody>
        </table>
    </div>
    {{ Html::script('js/transactionList.js.') }}
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}

@stop