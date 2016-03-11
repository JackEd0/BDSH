<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 21/02/2016
 * Time: 22:32
 */
$subbar = 5; //active le menu administration
?>


@extends('layouts.sign')

@section('title')Users | Liste @stop

@section('content')
    <h1>La liste des utilisateurs</h1>

    <h1></h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Login</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($utilisateurs as $utilisateur) {
        $i++;
              //  $userType = $utilisateur->userType;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo utf8_encode($utilisateur->username); ?></td>
            <td><?php echo utf8_encode($utilisateur->name) . " " . ($utilisateur->firstName); ?></td>
            <td><?php echo utf8_encode($utilisateur->email); ?></td>
            <td>
                <?php
                    if($utilisateur->userType_id == 1) echo "Administrateur";
                    elseif($utilisateur->userType_id == 2) echo "Client";
                    elseif($utilisateur->userType_id == 3) echo "Employé";
                    elseif($utilisateur->userType_id == 4) echo "Employé +";
                    else echo "Pas de Type";
                ?>
            </td>
            <td>
                <a href="{{ URL::route('shs.usersEdit', $utilisateur->email) }}">Modifier</a> |
                <a href="#">Désactiver</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    {{ $utilisateurs->links() }}
@stop
