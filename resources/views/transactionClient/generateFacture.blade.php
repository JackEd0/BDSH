{{--*/ $subbar = 'profil' /*--}}
@extends('layouts.sign')
@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/OrderTransaction.css') }}
    {{ Html::style('transaction.css') }}
    <img src="./img/shs_logo.png" style="position:absolute;top:8px;left:16px;"/>
    @if($licenceOwner != NULL)
        <div class="panel-body" align="right">
            {{ $licenceOwner->last_name }} {{ $licenceOwner->first_name }}
            <br/>
            @if($licenceOwner->enterprise != null)
                {{ $licenceOwner->enterprise }}
                <br/>
            @endif
            {{ $licenceOwner->address }}, {{ $licenceOwner->postal_code }}
            <br/>
            {{ $licenceOwner->town }}, {{ $licenceOwner->province }}
            <br/>
            {{ $licenceOwner->country }}
            <br/>
            {{ $licenceOwner->phone }}
        </div>
    @else
        <div class="panel-body" align="right">
            <br/>
            <br/>
            {{ $licenceOwner->first_name }}, {{ $licenceOwner->first_name }}
            <br/>
            {{ $licenceOwner->address }}, {{ $licenceOwner->postal_code }}
            <br/>
            {{ $licenceOwner->town }}, {{ $licenceOwner->province }}
            <br/>
            {{ $licenceOwner->country }}
            <br/>
            {{ $licenceOwner->phone }}
            <br/>
            {{ $licenceOwner->email }}
        </div>
    @endif
    Numéro de facture : {{$id}}
    <br/>
    Date de la commande : {{ $transaction->created_at }}
    <br/>
    Votre mail : {{ $licenceOwner->email }}
    <br/>
    Statut de la commande :
    @if($transaction->paid_date != NULL)
        <b>Payé</b>
    @else
        <b>Non payé</b>
    @endif
    <div id="document">
        <br/>
        <table class="table table-striped table-bordered table-hover" style="page-break-inside: avoid;">
            <thead>
            <tr>
                <th class="tabDocList">#</th>
                <th class="tabDocList">Nom du document</th>
                <th class="tabDocList">Collection</th>
                @if( $transaction->price_type_id != NULL )
                    <th class="tabDocList">Prix</th>
                @endif
            </tr>
            </thead>
            <tbody>
            {{--*/ $total_price = 0 /*--}}
            {{--*/ $countDoc = 1 /*--}}
            @foreach($transactionDocuments as $transactionDocument)
                {{--*/ $collection = explode('_', $transactionDocument->file_name) /*--}}
                {{--*/ $rootToObject = url('images/'.$collection[0].'/'.$transactionDocument->file_name) /*--}}
                <tr>
                    <td>{{ $countDoc }}</td>
                    <td>{{ $transactionDocument->file_name }}</td>
                    <td>@if($collectionName[$countDoc-1] != null)
                            {{ $collectionName[$countDoc-1]->name }}
                        @endif
                    </td>
                    @if( $transaction->price_type_id != NULL)
                        <td>@if($transaction->price_type_id == 1)
                                {{--*/ echo number_format($transaction->public_use, 2) /*--}} $CAD
                                <?php $total_price = $total_price + ($transaction->public_use); ?>
                            @elseif($transaction->price_type_id == 0)
                                {{--*/ echo number_format($transaction->private_use, 2) /*--}} $CAD
                                <?php $total_price = $total_price + ($transaction->private_use); ?>
                            @endif
                        </td>
                    @endif
                </tr>
                {{--*/ $countDoc++ /*--}}
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="Details">
        <br/>
        <div class="contenu">
            <br/>
            <table class="table table-striped table-bordered table-hover" style="page-break-inside: avoid;">
                <thead>
                <tr>
                    <th class="tabPriceList">Quantité</th>
                    <th class="tabPriceList">Description</th>
                    <th class="tabPriceList">Prix</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $countDoc }}</td>
                    <td>{{ $transaction->licenceType }}</td>
                    <td>{{--*/ echo number_format($total_price, 2) /*--}} $CAD</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Frais d'administration</td>
                    <td>{{--*/ echo number_format($transaction->admin,2) /*--}} $CAD</td>
                </tr>
                <tr>
                    <td></td>
                    <td>TPS</td>
                    <td>{{--*/ echo number_format((($transaction->tps) / 100 ) * $total_price ,2) /*--}} $CAD</td>
                </tr>
                <tr>
                    <td></td>
                    <td>TVQ</td>
                    <td>{{--*/ echo number_format((($transaction->tvq) / 100 ) * $total_price,2) /*--}} $CAD</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td><b>Total</b></td>
                    <td>
                        <b>{{--*/ echo number_format($total_price + ((($transaction->tps)/100) * $total_price) + ((($transaction->tvq)/100) * $total_price) + ($transaction->admin),2) /*--}}
                            $CAD</b></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop