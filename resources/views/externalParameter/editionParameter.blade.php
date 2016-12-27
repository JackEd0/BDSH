{{--*/ $subbar = 'Administration' /*--}}

@extends('layouts.sign')

@section('title')
    Modification | Paramètres externes
@stop

@section('content')

    <br />
    <h1 class="form-signin-heading">Modification des paramètres externes</h1> <br />
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">

        <div class="form-group" style="text-align:left;">
            <form method="post" action="{{ URL::route('externalParameter.insertParameter') }}">

                <div id="divEmail">
                <label for="email" class="control-label">Courriel du compte Paypal</label>
                <input type="text" id="email" class="form-control" value="{{ $parameter['email'] }}" name="email"><br />
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input  type="submit" class="btn  btn-lg btn-primary btn-block" value="Enregistrer" id="soumettre"/>

            </form>
        </div>
    </div>

    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/parameterEdition.js') }}
@stop