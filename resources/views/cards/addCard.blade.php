
<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 04/04/2016
 * Time: 22:32.
 */
//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Fiche | Création
@stop

@section('content')

    <h1>Ajouter une fiche</h1>
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="addCardForm" method="POST" action="{{ URL::route('cards.create') }}">
            {!! csrf_field() !!}
            <h1><br/></h1>
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>

            <div class="form-group" style="text-align:left;">
                <div class="selectContainer ">
                    <label class="control-label" style="float: left ">Type de fiche</label>
                    {{
                        Form::select(
                            'cardTypeSelect',
                            array(
                                1 => 'Archives',
                                2 => 'Audiovisuels',
                                3 => 'Bibliothèque',
                                4 => 'Cartes',
                                5 => 'Images',
                                6 => 'Périodiques',
                                7 => 'Sonores'
                            ),
                            null,
                            array(
                                'class' => 'form-control',
                                'id' => 'cardTypeSelect'
                            )
                        )
                    }}
                </div>
            </div>

            <div id="cardAttributesDiv"></div>
            <div id="cardDocumentDiv"></div>
            <br>
            <h3>
                <a id="cardAddDocumentLink" style="cursor: pointer; float: left; padding-bottom: 40px;">Ajouter un document</a>
            </h3>

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    <i class="fa fa-btn fa-user"></i>Enregistrer
                </button>
                <input type="hidden" name="fileNames" id="inputFileNames" value='{"fileNames":[]}'/>
            </div>

        </form>
        <div hidden >
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="file" id="choseFile" name="file[]" multiple="multiple" accept='image/*' >
        </div>
        <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

        <div class="btn btn-lg btn-link btn-block">
            <h3>
            <a href="{{ URL::route('search.searchCard') }}">Annuler</a>
            </h3>
        </div>
    </div>

    {{ Html::script('js/createCard.js') }}
@stop
