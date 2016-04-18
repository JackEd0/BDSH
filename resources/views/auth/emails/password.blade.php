
<?php
/**
 * Created by PhpStorm.
 * User: fanm2101
 * Date: 2016-04-13
 * Time: 23:19
 */
?>
@extends('layouts.email')

@section('title')
    Réinitialisation du mot de passe
@stop
@section('content')
    <p>
        Vous avez fait une demande de réinitialisation de mot de passe,
    </p>
    <p>
        Cliquez sur ce lien pour réinitialiser votre mot de passe :
    </p>
    <p>
        <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
    </p>
    <p>
        Si vous n'avez pas fait cette demande de réinitialisation, ignorez ce courriel et contactez nous immediatement !
    </p>
    <p>
        Cordialement.
    </p>
@stop