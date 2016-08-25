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


    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-group" method="post" action="{{ URL::route('createCardAttribute') }}">
            {!! csrf_field() !!}
            <h1><br/></h1>
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <label for="inputNameFr" class="control-label">Nom français</label>
                <input type="text" id="inputNameFr" class="form-control" placeholder="Nom en Français" name="nameFr" value="{{ old('nameFr') }}"><br/>
                <label for="inputNameEn" class="control-label">Nom anglais</label>
                <input type="text" id="inputNameEn" class="form-control" placeholder="Nom en Anglais" name="nameEn" value="{{ old('nameEn') }}"><br/>
                <div class="checkbox">
                    <label><input type="checkbox" value="1" name="hideIfEmpty">Cacher Si Vide</label>
                </div>
                <div class="selectContainer">
                    <label class="control-label">Niveau de permission requis</label>
                    {{
                        Form::select(
                            'userPermitLevel',
                            array(
                                1 => 'Administrateur',
                                2 => 'Employé +',
                                3 => 'Employé',
                                4 => 'Client'
                            ),
                            null ,
                            array(
                                'class' => 'form-control',
                                'id' => 'userPermitLevel'
                            )
                        )
                    }}
                </div>

            </div>
            <h1><br/></h1>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ url('search') }}">
                    <small>Annuler</small>
                </a>
            </h3>
        </div>
    </div>
@stop