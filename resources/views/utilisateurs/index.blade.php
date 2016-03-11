<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 16/02/2016
 * Time: 13:13
 */
$subbar = 2;
?>

@extends('layouts.master')

@section('title')Users | Liste @stop

@section('content')
    <h1>La liste des utilisateurs</h1>
    <div class="row">
    @foreach($utilisateurs as $utilisateur)
            <div class="col-md-2">
                <a href="{{ URL::route('utilisateurs.show', $utilisateur->email) }}">
                    <h2>{{ $utilisateur->username }}</h2>
                </a>
                <p>Commentaire</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
    @endforeach
    </div>
    <h1></h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Login</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($utilisateurs as $utilisateur) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo utf8_encode($utilisateur->username); ?></td>
            <td><?php echo utf8_encode($utilisateur->email); ?></td>
            <td>
                <?php
                if ($utilisateur->compteAdmin == 1) {
                    echo "<input disabled='disabled' type='checkbox' checked='checked'>";
                }  else {
                    echo "<input disabled='disabled' type='checkbox'>";
                }
                ?>
            </td>
            <td>
                <a href="#">Modifier</a>
                <a href="#">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

@stop