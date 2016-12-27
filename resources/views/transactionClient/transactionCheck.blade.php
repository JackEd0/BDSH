<?php
$subbar = 'profil';
?>
@extends('layouts.sign')
@section('title')
    {{ $itemName }}
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/bootstrap-datepicker.standalone.min.css') }}
    {{ Html::style('css/OrderTransaction.css') }}
    {{ Html::style('transaction.css') }}

    <h1 class="form-signin-heading">{{ $itemName }}</h1>
    <br />
      <div id="document" align="center">
          @if($error_payment == "no_error")
             <div id="contenu">
                 Votre achat de {{ $payedPrice}} ${{$currency}} portant le numéro <b>{{$transactionNumber}}</b> c'est bien passé.
                 <br />
                 <br />
                 Vous pouvez télécharger le(s) document(s) <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
             </div>
          @elseif($error_payment == "not_completed")
              <div id="contenu">
                  Votre achat de {{ $payedPrice}} ${{$currency}} a échoué.
                  <br />
                  Le statut de votre paiement est incomplet.
                  <br />
                  Vous pouvez retenter votre payement <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
              </div>
          @elseif($error_payment == "not_cad")
              <div id="contenu">
                  Votre achat de {{ $payedPrice}} ${{$currency}} a échoué.
                  <br />
                  Vous utilisez une mauvaise devise.
                  <br />
                  Vous pouvez retenter votre payement <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
              </div>
          @elseif($error_payment == "no_transaction")
              <div id="contenu">
                  Votre achat de {{ $payedPrice}} ${{$currency}} a échoué.
                  <br />
                  Aucun numéro de transaction reçu.
                  <br />
                  Vous pouvez retenter votre payement <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
              </div>
          @elseif($error_payment == "global_error")
              <div id="contenu">
                  Votre achat de {{ $payedPrice}} ${{$currency}} a échoué.
                  <br />
                  Vous n'avez pas payé le bon montant.
                  <br />
                  Vous pouvez retenter votre payement <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
              </div>
          @elseif($error_payment == "wrong_receiver")
              <div id="contenu">
                  Votre achat de {{ $payedPrice}} ${{$currency}} a échoué.
                  <br />
                  Vous avez effectué le paiement sur une mauvaise adresse mail.
                  <br />
                  Vous pouvez retenter votre payement <a href="{{ URL::route('transactionClient.transactionView', \Crypt::encrypt($id))}}">en cliquant ici</a>.
              </div>
          @endif
      </div>
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/jquery.min.js') }}
@stop
