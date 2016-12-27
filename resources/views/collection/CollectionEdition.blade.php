<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-26
 * Time: 23:59.
 */

//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Collection | Edition
@stop

@section('content')
    <h1 class="form-signin-heading">Éditer une collection</h1>
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="addCollection" method="POST" action="{{ URL::route('collection.edit', \Crypt::encrypt($collection->id)) }}" >
            {!! csrf_field() !!}
            <br />
            <br />
            <br />
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <label for="inputCode"  class="control-label">Cote de fond</label>
                <input type="text" id="inputCode" name="code" class="form-control"  value="{{$collection->code}}"><br />
                <label for="inputName" class="control-label">Titre de fond</label>
                <input type="text" id="inputName" name="name" class="form-control" multiple="multiple"  value="{{$collection->name}}" ><br />

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