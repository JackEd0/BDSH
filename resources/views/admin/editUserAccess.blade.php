{{--*/
    /**
     * Created by PhpStorm.
     * User: Jacques
     * Date: 22/02/2016
     * Time: 00:02.
     */
     $subbar = 'Administration'
 /*--}}
@extends('layouts.sign')

@section('title')
    Utilisateurs | Modification
@stop

@section('content')


    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="register" method="post"
              action="{{ URL::route('editUserType', \Crypt::encrypt($user->id)) }}">
            {!! csrf_field() !!}
            <br/>
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <label for="inputLogin" class="control-label">Nom d'utilisateur</label>
                <input type="text" id="inputLogin" disabled="disabled" class="form-control"
                       placeholder="Nom d'utilisateur" value="{{ $user->username }}"><br/>
                <label for="inputName" class="control-label">Nom Complet</label>
                <input type="text" id="inputName" disabled="disabled" class="form-control" placeholder="Nom"
                       value="{{ $user->first_name }} {{ $user->last_name }}"><br/>
                <label for="inputEmail" class="control-label">Email</label>
                <input type="email" id="inputEmail" disabled="disabled" class="form-control" placeholder="Email"
                       value="{{ $user->email }}"><br/>
                <div class="selectContainer">
                    <label class="control-label">Type</label>
                    <!-- $userType is used for default value $user is used for the for loop -->
                    <select class="form-control" id="userTypeSelect" name="userTypeSelect">
                        @foreach($userTypes as $type)
                            <option value="{{ $type->id }}" {{($type->id  == $userType->id ? 'selected' : '' )}} >{{ $type->name_fr }} </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ URL::route('users.list', 1) }}">
                    <small>Annuler</small>
                </a>
            </h3>
        </div>
    </div>
@stop