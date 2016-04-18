<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 22/02/2016
 * Time: 00:02.
 */
//active le menu profil
$subbar = 'Profil';
?>

@extends('layouts.sign')

@section('title')
    Profil
@stop

@section('content')

    <div class="container">
        <div class="" style="display: block; text-align: center; margin: auto; max-width: 60%;">
            <form id="mainForm" class="form-signin" role="form" method="POST" action="{{ URL::route('updateProfile', \Crypt::encrypt($user->id)) }}">
                {!! csrf_field() !!}

                <h1 class="form-signin-heading">Profil</h1>

                <div style="margin-bottom: 2%;">
                    @if (isset($message))
                        <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
                    @endif
                </div>

                <div class="form-group col-md-6" style="text-align:left;">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="inputUsername" class="control-label">Nom d'utilisateur *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputUsername" name="username"
                                   value="{{ $user->username }}" placeholder="Nom d'utilisateur" required autofocus>
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
                            <input type="text" class="form-control text-capitalize" id="inputFirstName" name="firstName"
                                   value="{{ $user->firstName }}" placeholder="Prénom" required>
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
                            <input type="text" class="form-control text-capitalize" id="inputName" name="name"
                                   value="{{ $user->name }}" placeholder="Nom" required>
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
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                   value="{{ $user->email }}" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="inputPhone" class="control-label">Téléphone</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                   value="{{ $user->phone }}" placeholder="Téléphone">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6" style="text-align:left;">
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="inputAddress" class="control-label">Adresse *</label>
                        <div class="">
                            <input type="text" class="form-control" id="inputAddress" name="address"
                                   value="{{ $user->address }}" placeholder="Adresse" required>
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
                            <input type="text" class="form-control" id="inputTown" name="town" value="{{ $user->town }}"
                                   placeholder="Ville" required>
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
                            <input type="text" class="form-control" id="inputPostalCode" name="postalCode"
                                   value="{{ $user->postalCode }}" placeholder="Code Postal" required>
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
                            <input type="text" class="form-control" id="inputProvince" name="province"
                                   value="{{ $user->province }}" placeholder="Province" required>
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
                            <input type="text" class="form-control" id="inputCountry" name="country"
                                   value="{{ $user->country }}" placeholder="Pays" required>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
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
            <h4><br/></h4>
            <a href="#" onclick="hideThis('form', 'mainForm')" >
                <strong id="linkChangePassword">Modifier le mot de passe</strong>
                <strong id="linkChangeProfile" style="display: none">Modifier les informations de profils</strong>
            </a>

            <h4><br/></h4>

            <FORM id="form" method="POST" action="{{ URL::route('updatePassword', \Crypt::encrypt($user->id)) }}" style="display: none;" class="form-group col-md-8 col-sm-offset-2 col-xs-offset-2">
                {!! csrf_field() !!}
                <div class="form-group" style="text-align:left;">
                    <div class="form-group{{ $errors->has('previousPassword') ? ' has-error' : '' }}">
                        <label for="inputPreviousPassword" class="control-label">Ancien mot de passe *</label>
                        <div class="">
                            <input type="password" class="form-control" id="inputPreviousPassword" name="previousPassword" placeholder="Ancien mot de passe" required>
                            @if ($errors->has('previousPassword'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('previousPassword') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label" for="inputPassword">Nouveau Mot de passe *</label>
                        <div class="">
                            <input id="inputPassword" class="password form-control" name="password" type="password" placeholder="Nouveau Mot de passe" required/>

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
                        <label for="inputPasswordConfirmation" class="control-label">Confirmer Mot de passe *</label>
                        <div class="">
                            <input type="password" class="form-control" id="inputPasswordConfirmation" name="password_confirmation" placeholder="Confirmer mot de passe" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                            <i class="fa fa-btn fa-user"></i>Enregistrer
                        </button>
                    </div>
                </div>

            </FORM>
            {{ Html::script('js/hideShowDiv.js') }}
        </div>
    </div>

    {{ Html::script('js/passwordValidation.js') }}
    {{ Html::style('css/passwordValidation.css') }}
@stop