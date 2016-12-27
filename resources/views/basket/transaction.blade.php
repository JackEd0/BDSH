<?php

if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
}
$subbar = 'Panier';

?>

@extends('layouts.sign')
@section('title')
    Transaction
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    <h1 align = "center">Téléchargement et envoi du formulaire</h1>
    <div align = "center">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Succès!</strong> Votre commande a été soumise pour approbation.
        </div>
    </div>
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/lightbox.js') }}
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/licencePanier.js') }}
@stop