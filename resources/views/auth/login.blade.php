<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 16/02/2016
 * Time: 17:04.
 */
//active le menu connexion
$subbar = 'Connexion';
?>

@extends('layouts.sign')
@section('title')
    Connexion
@stop
@section('content')
    <!-- Bootstrap CSS pour login: login.css-->
    {{ Html::style('css/login.css') }}
    <div class="container">
        <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            <h2 class="form-signin-heading" style="text-align: center">Connexion</h2>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="inputUsername" class="sr-only">Nom d'utilisateur</label>

                <div class="">
                    <br /><input type="text" id="inputUsername" name="username" class="form-control" value="{{ old('username') }}"  placeholder="Nom d'utilisateur" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="inputPassword"  class="sr-only">Mot de passe</label>

                <div class="">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi |
                </label>
                <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié</a>
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                <i class="fa fa-btn fa-sign-in"></i>Continuer
            </button>

        </form>

    </div>

@stop