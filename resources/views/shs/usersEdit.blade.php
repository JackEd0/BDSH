<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 22/02/2016
 * Time: 00:02
 */
$subbar = 5; //active le menu administration
?>

@extends('layouts.sign')

@section('title') Utilisateur | Edit @stop

@section('content')
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="register" method="post">

            <h1><br/></h1>
            <div class="form-group" style="text-align:left;">
                <label for="inputLogin" class="control-label">Nom d'utilisateur</label>
                <input type="text" id="inputLogin" disabled="disabled" class="form-control" placeholder="Nom d'utilisateur" value="{{ $utilisateur->username }}" required autofocus><br/>
                <label for="inputName" class="control-label">Nom</label>
                <input type="text" id="inputName" disabled="disabled" class="form-control" placeholder="Nom" value="{{ $utilisateur->name }}" required autofocus><br/>
                <label for="inputEmail" class="control-label">Email</label>
                <input type="email" id="inputEmail" disabled="disabled" class="form-control" placeholder="Email" value="{{ $utilisateur->email }}" autofocus><br/>
                <div class="selectContainer">
                    <label class="col-xs-3 control-label">Type</label>
                    <select class="form-control">
                        <option value="Admin">Administrateur</option>
                        <option value="Emp">Employé</option>
                        <option value="Empp">Employé +</option>
                        <option value="Client">Client</option>
                    </select>
                </div>

            </div>
            <h1><br/></h1>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ URL::route('shs.usersList') }}">
                    <small>Annuler</small>
                </a></h3>
        </div>
    </div>
@stop