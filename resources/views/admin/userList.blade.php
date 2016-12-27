{{--*/
    /**
      * Created by PhpStorm.
      * User: Jacques
      * Date: 21/02/2016
      * Time: 22:32.
     */
     $subbar = 'Administration'
 /*--}}
@extends('layouts.sign')

@section('title')
    Utilisateurs | Liste
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br/>
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Liste des utilisateurs</h1>
    <br/>
    <div class="row">
        <div class="col-sm-6 form-group">
            <div class="form-inline">
                @if($inactiveButton) <a href="/users/0"> Afficher les utilisateurs inactifs </a>
                @elseif(!$inactiveButton) <a href="/users/1"> Afficher les utilisateurs actifs </a> @endif
            </div>
        </div>
        <div class="col-sm-6 form-group"></div>
    </div>
    <br/>
    <div class="row">
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
            foreach ($users as $user) {
            if ($user->active == 1) {
                $userDeactivateButton = 'Désactiver';
            } else {
                $userDeactivateButton = 'Activer';
            }
            ?>
            <tr>
                <td>{{ $user->username }}</td>
                <td><?php echo ($user->first_name) . ' ' . ($user->last_name);
                    ?></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name_fr }}</td>
                <td class="col-sm-2">
                    <?php echo substr($user->created_at, 0, 16);
                    ?>
                </td>
                <td>
                    <a href="{{ URL::route('users.editAccess', \Crypt::encrypt($user->id)) }}">Modifier</a> |
                    <a href="{{ URL::route('user.deactivate', \Crypt::encrypt($user->id)) }}">{{ $userDeactivateButton }}</a>
                </td>
            </tr>
            <?php

            } ?>
            </tbody>
        </table>

    </div>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/userList.js') }}

@stop
