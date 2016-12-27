<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-26
 * Time: 23:27.
 */

//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Licences | Liste
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br />
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Liste des versions de la licence</h1>
    <br />

    <table class="table table-striped table-bordered table-hover" id="collectionTable" data-search="true">
        <thead>
            <tr>
                <th>Version</th>
                <th>Création</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($licences as $licence)
            <tr>
                <td>{{ $licence->id }}</td>
                <td>{{ $licence->created_at }}</td>
                <td >
                    <a href="{{ URL::route('licence.Edit', \Crypt::encrypt($licence->id)) }}">Modifier</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}

@stop
