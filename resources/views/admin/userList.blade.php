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
    Utilisateurs | Liste
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <h4><br/></h4>
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Liste des utilisateurs</h1>

    <div class="row">
        <div class="col-sm-6 form-group">
            <div class="checkbox form-inline">
                <label>
                    <input type="checkbox" name="show_inactive_users" value="1" id="inputShowInactiveUsers"
                           onclick="showInactive();"
                    > Afficher inactifs
                </label>
            </div>
        </div>
        <div class="col-sm-6 form-group"></div>
    </div>
    <table class="table table-striped table-bordered table-hover" id="userTable"
           data-search="true">
        <thead>
        <tr>
            <th class="sorting">Login</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Type</th>
            <th>Création</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        foreach ($users as $user) {
        ++$i;
        $userType = \app\User::find($user->id)->userType;
        if ($user->active == 1) {
            $userDeactivateButton = 'Désactiver';
        } else {
            $userDeactivateButton = 'Activer';
        }
        ?>
        <tr>
            <td>{{ $user->username }}</td>
            <td><?php echo utf8_encode($user->firstName).' '.($user->name);
                ?></td>
            <td>{{ $user->email }}</td>
            <td>{{ $userType->name_fr }}</td>
            <td class="col-sm-1">
                <?php echo substr($user->created_at, 0, 10);
                ?>
            </td>
            <td >
                <a href="{{ URL::route('users.editAccess', \Crypt::encrypt($user->id)) }}">Modifier</a> |
                <a href="{{ URL::route('user.deactivate', \Crypt::encrypt($user->id)) }}">{{ $userDeactivateButton }}</a>
            </td>
        </tr>
        <?php

        } ?>
        </tbody>
    </table>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/dataTablesConf.js') }}

@stop
