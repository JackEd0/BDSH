{{--*/ $subbar = 'Administration'; /*--}}


@extends('layouts.sign')

@section('title')
    Modification | Frais
@stop

@section('content')
    <br />
    <h1 class="form-signin-heading">Modification des frais de licence</h1> <br />
    <div style="display: block; text-align: center; margin: auto; max-width: 40%;">

        <div class="form-group" style="text-align:left;">
            <form method="post" action="{{ URL::route('fees.insertFees') }}">
                <div id="divTvq">
                    <label for="tvq" class="control-label">Taux TVQ</label>
                    <input type="text" id="tvq" class="form-control" value="{{ $taxes['tvq'] }}" name="tvq"><br />
                </div>

                <div id="divTps">
                    <label for="tps" class="control-label">Taux TPS</label>
                    <input type="text" id="tps" class="form-control" value="{{ $taxes['tps'] }}" name="tps"><br />
                </div>

                <div id="divAdmin">
                    <label for="admin" class="control-label">Frais Administratifs</label>
                    <input type="text" id="admin" class="form-control" value="{{ $taxes['admin'] }}" name="admin"><br />
                </div>

                <div id="divPrivate">
                    <label for="private_use" class="control-label">Frais Utilisation Privée</label>
                    <input type="text" id="private_use" class="form-control" value="{{ $taxes['private_use']}}" name="private_use"><br />
                </div>

                <div id="divPublic">
                    <label for="public_use" class="control-label">Frais Utilisation Publique</label>
                    <input type="text" id="public_use" class="form-control" value="{{ $taxes['public_use'] }}" name="public_use"><br />
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input  type="submit" class="btn  btn-lg btn-primary btn-block" value="Enregistrer" id="soumettre"/>

            </form>
        </div>
    </div>
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/feesEdition.js') }}

@stop