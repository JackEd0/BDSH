@extends('layouts.sign')
@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/OrderTransaction.css') }}
    {{ Html::style('transaction.css') }}
    <img src="./img/shs_logo.png" style="position:absolute;top:8px;left:16px;"/>
    <h1 class="form-signin-heading" align="center">Licence de la commande n°{{$id}}</h1>
    <div id="Details">
        <br/>
        <div class="contenu">
            <div class="panel-body">
                {!! $transaction->terms !!}
            </div>
            <h4 class="panel-title" align="center">
                <br/>
                <br/>

                <br/>
                <a>Autorisation</a>
            </h4>
            <div class="panel-body">
                <br/>
                <br/>
                <br/>
                La Société d'histoire de Sherbrooke autorise
                <b>{{ $licenceOwner->last_name }} {{ $licenceOwner->first_name }} {{ $licenceOwner->enterprise }}</b>
                à utiliser les documents de votre commande sur lesquels la Société d'histoire possède les droits
                d'auteur:
                <br/>
                <br/>
                @foreach($transactionDocuments as $transactionDocument)
                    {{ $transactionDocument->file_name }}
                    <br/>
                @endforeach
                <br/>
                <br/>
                Les documents ne peuvent être utilisés que pour les fins pour lesquelles les droits ont été cédés, soit
                :
                <br/>
                <br/>
                <b>{{ $transaction->licenceType}}</b>
                <br/>
                <br/>
                Le bénéficiaire de l'autorisation s'engage à respecter la Loi sur les droits d'auteur. Pour ce faire, il
                devra mentionner la provenance des documents détenus par la Société d'histoire. La mention se lira comme
                suit:
                <br/>
                <br/>
                Fonds ___________________________. La Société d'histoire de Sherbrooke, dans le cas des fonds privés et
                Collection de la Société d’histoire de Sherbrooke, dans les autres cas.
                <br/>
                <br/>
                Adresse du bénéficiaire: {{ $licenceOwner->address }}
                <br/>
                <br/>
                Date de la commande : {{ $transaction->created_at }}
                <br/>
            </div>
        </div>
    </div>
@stop