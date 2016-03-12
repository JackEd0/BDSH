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
    <h1>La liste des user</h1>

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
        foreach ($users as $user) {
        $i++;
              //$userType = $user->userType;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo utf8_encode($user->username); ?></td>
            <td><?php echo utf8_encode($user->name) . " " . ($user->firstName); ?></td>
            <td><?php echo utf8_encode($user->email); ?></td>
            <td>
                <?php
                    if($user->user_type_id == 1) echo "Administrateur";
                    elseif($user->user_type_id == 2) echo "Client";
                    elseif($user->user_type_id == 3) echo "Employé";
                    elseif($user->user_type_id == 4) echo "Employé +";
                    else echo "Pas de Type";
                ?>
            </td>
            <td>
                <a href="{{ URL::route('users.edit', $user->email) }}">Modifier</a> |
                <a href="#">Désactiver</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    {{ $users->links() }}
@stop
