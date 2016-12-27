<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-21
 * Time: 00:23.
 */

//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Collections | Liste
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br />
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Collections</h1>
    <br />
    <h4>
        <a href="{{ URL::route('collection.add') }}">Ajouter une collection</a>
    </h4>
    <br />
    <h4>Liste des collections</h4>

    <div class="row">
        <div class="col-sm-6 form-group">

        </div>
        <div class="col-sm-6 form-group"></div>
    </div>
    <table class="table table-striped table-bordered table-hover" id="collectionTable"
           data-search="true">
        <thead>
        <tr>
            <th class="sorting">Id</th>
            <th>Cote de fond</th>
            <th>Titre de fond</th>
            <th>Création</th>
            <th>État</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($collections as $collection)
        <tr>
            <td>{{ $collection->id }}</td>
            <td>{{ $collection->code }}</td>
            <td>{{ $collection->name }}</td>
            <td>{{ $collection->created_at }}</td>
            <td>
                @if($collection->state > 0)
                    Actif
                @else
                    Inactif
                @endif
            </td>
            <td>
                <a href="{{ URL::route('collection.Edition', \Crypt::encrypt($collection->id)) }}">Modifier</a>
                @if($collection->state > 0)
                    | <a href="{{ URL::route('collection.disable', \Crypt::encrypt($collection->id)) }}">Désactiver</a>
                @endif
                @if($collection->state == 0)
                    | <a href="{{ URL::route('collection.activate', \Crypt::encrypt($collection->id)) }}">Activer</a>
                @endif
            </td>
        </tr>

        @endforeach
        </tbody>

    </table>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}

@stop
