<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 17/02/2016
 * Time: 11:11.
 */
//active le menu inscription
$subbar = 'Inscription';
?>
@extends('layouts.sign')
@section('title')
    Inscription
@stop

@section('content')
    <div class="container">
        <div class="" style="display: block; text-align: center; margin: auto; max-width: 60%;">
            <form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <h1 class="form-signin-heading">Inscription</h1>

                <div class="form-group col-md-6" style="text-align:left;">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="inputUsername" class="control-label">Nom d'utilisateur *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputUsername" name="username" value="{{ old('username') }}" placeholder="Nom d'utilisateur" required autofocus>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <label for="inputFirstName" class="control-label">Prénom *</label>
                        <div class="">
                            <input type="text" class="form-control text-capitalize" id="inputFirstName" name="firstName" value="{{ old('firstName') }}" placeholder="Prénom" required>
                            @if ($errors->has('firstName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="inputName" class="control-label">Nom *</label>
                        <div class="">
                            <input type="text" class="form-control text-capitalize" id="inputName" name="name" value="{{ old('name') }}" placeholder="Nom" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="inputEmail" class="control-label">Email *</label>
                        <div class="">
                            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label" for="inputPassword">Mot de passe *</label>
                        <div class="">
                            <input id="inputPassword" class="password form-control" name="password" type="password" placeholder="Mot de passe" required/>

                            <ul class="helper-text">
                                <li class="length">Au moins 8 caractères.</li>
                                <li class="lowercase">Au moins une lettre minuscule.</li>
                                <li class="uppercase">Au moins une lettre majuscule.</li>
                                <li class="special">Au moins un nombre ou un caractère particulier.</li>
                            </ul>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label">Confirmer *</label>
                        <div class="">
                            <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation" placeholder="Confirmer mot de passe" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6" style="text-align:left;">
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="inputAddress" class="control-label">Adresse *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputAddress" name="address" value="{{ old('address') }}" placeholder="Adresse" required>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                        <label for="inputTown" class="control-label">Ville *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputTown" name="town" value="{{ old('town') }}" placeholder="Ville" required>
                            @if ($errors->has('town'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
                        <label for="inputPostalCode" class="control-label">Code Postal *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputPostalCode" name="postalCode" value="{{ old('postalCode') }}" placeholder="Code Postal" required>
                            @if ($errors->has('postalCode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postalCode') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                        <label for="inputProvince" class="control-label">Province *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputProvince" name="province" value="{{ old('province') }}" placeholder="Province" required>
                            @if ($errors->has('province'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="inputCountry" class="control-label">Pays *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputCountry" name="country" value="{{ old('country') }}" placeholder="Pays" required>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="inputPhone" class="control-label">Téléphone</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ old('phone') }}" placeholder="Téléphone">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <p><br/>
                    <small style="text-align:center;">Merci de renseigner les champs obligatoires (*)</small>
                    <br/></p>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        <i class="fa fa-btn fa-user"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{ Html::script('js/passwordValidation.js') }}
    {{ Html::style('css/passwordValidation.css') }}

@stop
