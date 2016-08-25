<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 21/02/2016
 * Time: 22:32.
 */
//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Document | Rapport d'importation
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <h4><br/></h4>
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Rapport d'importation</h1>

    <table class="table table-striped table-bordered table-hover" id="importReportTable"
           data-search="false">
        <thead>
        <tr>
            <th>Nom du fichier</th>
            <th>Numéro de fiche</th>
            <th>Cote du fonds</th>
            <th>Commentaires</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($importations as $import) {
                if($import['status'] != 2) {
        ?>
        <tr <?php if($import['status'] == 0){?> style="color: red; font-weight: bold;"<?php } ?> >
            <td>{{$import['fileName']}}</td>
            <td>{{ $import['cardId'] }}</td>
            <td>{{ $import['collection'] }}</td>
            <td>{{ $import['comment'] }}</td>
        </tr>
        <?php
        }
        } ?>
        </tbody>
    </table>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/dataTablesConf.js') }}

@stop
