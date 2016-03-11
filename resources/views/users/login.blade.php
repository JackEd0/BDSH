<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 17/02/2016
 * Time: 20:14
 */ ?>

@extends('layouts.master')

@section('title') Login @stop

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
    @endif
    {{ Form::open(['route'=>'users.check']) }}
    <h1><br/></h1>
    <div class="form-signin" style="max-width: 30%; margin:auto;">
        <div class="form-group">
            {{ Form::text('username','',['placeholder'=>'username','class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::password('password',['placeholder'=>'password','class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::checkbox('remember me','remember', false) }}
            {{ Form::label('remember','se souvenir de moi') }}
        </div>
        {{ Form::submit('Sign in',['class'=>'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
@stop

<?php /*
@if($errors->first('username'))
    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
@endif */
?>