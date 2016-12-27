<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 16/02/2016
 * Time: 17:04.
 */

?>

@extends('layouts.error')
@section('title')
    Erreur 401
@stop
@section('content')
    <!-- Bootstrap CSS pour login: login.css-->
    {{ Html::style('css/login.css') }}
    <div class="well text-center" style="margin-top:20px">
        <div class="alert alert-danger" role="alert">
            <h3><b>Erreur 401 : Accès non autorisé</b></h3>
            Put your hands up and drop your weapons.
        </div>
        <div class="alert alert-info alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Si vous pensez avoir les droits nécessaire mais que le problème persiste veuillez contacter l'administrateur de cette plateforme.
        </div>
        <a href="{{ url('searchHome') }}"><strong>Retour à l'accueil</strong></a>
    </div>
@stop
