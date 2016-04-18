<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 22/02/2016
 * Time: 00:02.
 */
//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Utilisateurs | Modification
@stop

@section('content')


    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="register" method="post" action="{{ URL::route('editUserType', \Crypt::encrypt($user->id)) }}">
            {!! csrf_field() !!}
            <h1><br/></h1>
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <label for="inputLogin" class="control-label">Nom d'utilisateur</label>
                <input type="text" id="inputLogin" disabled="disabled" class="form-control" placeholder="Nom d'utilisateur" value="{{ $user->username }}"><br/>
                <label for="inputName" class="control-label">Nom Complet</label>
                <input type="text" id="inputName" disabled="disabled" class="form-control" placeholder="Nom" value="{{ $user->name }} {{ $user->firstName }}"><br/>
                <label for="inputEmail" class="control-label">Email</label>
                <input type="email" id="inputEmail" disabled="disabled" class="form-control" placeholder="Email" value="{{ $user->email }}"><br/>
                <div class="selectContainer">
                    <label class="control-label">Type</label>
                    {{
                        Form::select(
                            'userTypeSelect',
                            array(
                                1 => 'Administrateur',
                                2 => 'Employé',
                                3 => 'Employé +',
                                4 => 'Client'
                            ),
                            $user->userType->id ,
                            array(
                                'class' => 'form-control',
                                'id' => 'userTypeSelect'
                            )
                        )
                    }}
                </div>

            </div>
            <h1><br/></h1>
            <button href="{{ URL::route('users.list') }}" class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ URL::route('users.list') }}">
                    <small>Annuler</small>
                </a>
            </h3>
        </div>
    </div>
@stop