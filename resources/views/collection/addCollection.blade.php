<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-20
 * Time: 23:35.
 */

//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Collections | ajouter
@stop

@section('content')

    <h1 class="form-signin-heading">Ajouter une collection</h1>
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="addCollection" method="POST" action="{{ URL::route('collection.create') }}" >
            {!! csrf_field() !!}

            <br />
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <label for="inputCode"  class="control-label">Cote de fond</label>
                <input type="text" id="inputCode" name="code" class="form-control" placeholder="Cote de fond" value=""><br />
                <label for="inputName" class="control-label">Titre de fond</label>
                <input type="text" id="inputName" name="name" class="form-control" placeholder="Titre de fond" value=""><br />

            </div>
            <br />
            <button href="" class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3>
                <a href="{{ URL::route('collection.List')}}">Annuler</a>
            </h3>
        </div>
    </div>
@stop