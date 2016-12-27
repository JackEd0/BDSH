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
    Attributs | Ajout
@stop

@section('content')
    {{ Html::style('css/bootstrap-select.min.css') }}
    <div >
        <br />
        <div style="margin-bottom: 2%;">
            @if (isset($message))
                <div class="bg-success bg-sm"> {{  $message }} </div>
            @endif
        </div>

        <div class="form-group" style="text-align:left;">
            <h3>Ajouter un nouvel attribut</h3>
            <br />
            <div>
                <div class="row">
                    <p class="col-md-3"><strong>Nom en Français</strong></p>
                    <p class="col-md-3"><strong>Nom en Anglais</strong></p>
                    <p class="col-md-1"><strong>Cacher Si Vide</strong></p>
                    <p class="col-md-2"><strong>Visible Par</strong></p>
                    <p class="col-md-2"><strong>Type(s)</strong></p>
                </div>
                <form class="form-group" role="form" method="POST" action="{{ URL::route('createCardAttribute') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-3"><input type="text" id="inputNameFr" class="form-control" placeholder="Nom en Français" name="nameFr" required autofocus></div>
                        <div class="col-md-3"><input type="text" id="inputNameEn" class="form-control" placeholder="Nom en Anglais" name="nameEn" required></div>
                        <div class="col-md-1"><input type="checkbox" name="hideIfEmpty"></div>
                        <div class="col-md-2">
                            <select class="form-control" id = "userPermitLevel" name="userPermitLevel">
                                @foreach($userTypes as $userType)
                                    <option value="{{ $userType->id }}">{{ $userType->name_fr }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control selectpicker" multiple name="cardTypeList[]" required>
                                @foreach($cardTypes as $cardType)
                                    <option value="{{ $cardType->id }}" >{{ $cardType->name_fr }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br />
                    <div style="padding-left: 0%" class="col-md-3">
                        <button class="btn btn-primary btn-block" type="submit" title="Ajouter" onclick="checkIfExist()" id="sendButton" >
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br />
        <div>
            <h3>Modifier les attributs d'une fiche</h3>
            <br />
            @foreach($userTypes as $userType)
                <input type="hidden" value="{{ $userType->name_fr }}" name="userTypeList">
            @endforeach
            <div class="form-group" style="text-align:left; max-width: 40%">
                <div class="selectContainer ">
                    <label class="control-label" style="float: left ">Type de fiche </label>
                    <select class="form-control" id = "cardTypeSelect" name="cardTypeSelect" onchange="populateForm('cardTypeSelect')">
                        @foreach($cardTypes as $cardType)
                            <option value="{{ $cardType->id }}">{{ $cardType->name_fr }}</option>
                        @endforeach
                    </select>
                </div>
            </div><br />
            <div class="form-group" style="text-align:left;">
                <div>
                    <div class="row">
                        <p class="col-md-3"><strong>Nom en Français</strong></p>
                        <p class="col-md-3"><strong>Nom en Anglais</strong></p>
                        <p class="col-md-1"><strong>Cacher Si Vide</strong></p>
                        <p class="col-md-2"><strong>Visible Par</strong></p>
                        <p class="col-md-2" style="text-align: center"><strong>Actions</strong></p>
                    </div>

                    <div id="cardAttributesDiv">
                            <!-- Remplissage dynamique des champs d'une fiche -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{ Html::script('js/addCardAttribute.js') }}
    {{ Html::script('js/bootstrap-select.min.js') }}

@stop