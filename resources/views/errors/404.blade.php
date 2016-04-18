<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 16/02/2016
 * Time: 17:04.
 */
//active le menu connexion
$subbar = 2;
?>

@extends('layouts.sign')
@section('title')
    Erreur 404
@stop
@section('content')
    <div class="well text-center" style="margin-top:20px">
        <div class="alert alert-danger" role="alert">
            <h3><b>Erreur 404 : Page inexistante</b></h3>
            You fell into an internet hole
        </div>
        <div class="alert alert-info alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Si vous pensez que cette page est censée exister veuillez contacter l'administrateur de cette plateforme.
        </div>
        <a href="/home">Retour à l'accueil</a>
    </div>
@stop

<!-- Bootstrap CSS pour login: login.css-->
{{ Html::style('css/login.css') }}