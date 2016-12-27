<?php
/**
 * Created by PhpStorm.
 * User: fanm2101
 * Date: 2016-03-29
 * Time: 12:41.
 */
?>
@extends('layouts.email')

@section('title')
    Réinitialisation du mot de passe
@stop
@section('content')


    <ul>
        <li><strong>{{ $testVar }}</strong></li>
    </ul>
    <p>
        , Votre mot de passe vient de changer!!

    </p>
    <p>
        Si vous n'etes pas l'auteur de ce changement veuillez nous le signaler immédiatement !!
    </p>

    <p>
        Cordialement.
    </p>

@stop