<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 16/02/2016
 * Time: 17:04
 */
$subbar = 2; //active le menu connexion
?>


@extends('layouts.sign')
@section('title')Shs | Connexion @stop
@section ('content')
    <div class="container">

        <form class="form-signin">
            <h2 class="form-signin-heading">Connexion</h2>
            <label for="inputLogin" class="sr-only">Nom d'utilisateur</label>
            <br/><input type="text" id="inputLogin" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
            <br/>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <div class="" style="display: inline;">
                <label>
                    <input type="checkbox" value="remember-me"> Se souvenir de moi |
                </label>
            </div>
            <a href="#">Mot de passe oublié</a>
            <h4><br/></h4>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Continuer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ URL::route('users.signUp') }}">
                    <small>Création de compte</small>
                </a></h3>
        </div>
    </div>
@stop
<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

</style>