<?php
/**
 * Created by PhpStorm.
 * User: berb2701
 * Date: 2016-03-25
 * Time: 10:32.
 */
?>

@extends('layouts.email')

@section('title')
    Confirmation d'inscription
@stop

@section('content')
    <p style="padding-top: 10px;">
        Bonjour {{ $user->first_name }} {{ $user->last_name }} ,
    </p>
    <p>
        La création de votre compte s'est effectuée avec succès. Votre nom d'utilisateur est
        <strong>{{ $user->username }}</strong>.
    </p>
    <p>
        Afin de valider votre compte, veuillez suivre le lien suivant
        : {{route('user.activate', \Crypt::encrypt($user->id))}}.
    </p>
    <p>
        Vous pouvez maintenant passer une commande à partir de <a style="color:#019fc4;text-underline: single;"
                                                                  href="{{ url('searchHome') }}">notre catalogue en ligne</a>.
    </p>
@stop