<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 04/04/2016
 * Time: 22:32.
 */
//active le menu administration
$subbar = 'Administration';
if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
}
?>

@extends('layouts.sign')

@section('title')
    Fiche | Modification
@stop

@section('content')
    <h1>Modifier une fiche</h1>
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="editCardForm" method="POST" action="{{ URL::route('updateCard', \Crypt::encrypt($card->id)) }}">
            {!! csrf_field() !!}
            <br />
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left;">
                <div class="selectContainer ">
                    <label class="control-label" style="float: left ">Type de fiche </label>
                    <select disabled class="form-control" id = "cardTypeSelect" name="cardTypeSelect" onchange="populateForm('cardTypeSelect')">
                        @foreach($cardTypes as $cardType)
                            <option value="{{ $cardType->id }}" {{($card->card_type_id  == $cardType->id ? 'selected' : '' )}}>{{ $cardType->name_fr }}</option>
                        @endforeach
                    </select>
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label"  for="cardNumber">N° de fiche </label>
                    <input type="text" class="form-control" id="cardNumber" value="{{ $card->card_number }}" disabled>
                </div>
            </div>

            <?php
            $cardType = $card->card_type_id;
            ?>

            <div class="form-group hidden" style="text-align:left;">
                <div class="selectContainer ">
                    <label class="control-label" style="float: left ">Collection </label>
                    <select class="form-control" id = "collectionSelect" name="collectionSelect">
                        <option value="0">Veuillez choisir une collection</option>
                            @if($cardType == 2 || $cardType == 5 || $cardType == 7)
                                <?php $collectionNotFound = true;?>
                                @foreach ($collections as $collection) {
                                    @if($collection->id == $cardCollection->id){
                                        <?php $collectionNotFound = false; ?>
                                    @endif
                                @endforeach
                                @if($collectionNotFound){
                                    <option value="{{ $cardCollection->id }}" selected>{{ $cardCollection->code . " - " . $cardCollection->name}}</option>
                                @endif
                            @endif
                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}" {{($card->collection_id  == $collection->id ? 'selected' : '' )}}>{{ $collection->code . " - " . $collection->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group" style="text-align:left;">
                @foreach ($cardInfos as $cardInfo)
                    <label for="{{ $cardInfo->card_attribute_id  }}" class="control-label">{{ $cardInfo->name_fr  }}</label>
                    <input type="text" name='{{$cardInfo->card_attribute_id}}' id='{{$cardInfo->card_attribute_id}}' class="form-control"
                           placeholder="{{$cardInfo->name_fr}}" value="{{$cardInfo->value}}"
                    @if($cardInfo->card_attribute_id == 46) {{ "disabled" }}@endif><br>
                @endforeach
            </div>
            @if ($cardType == 2 || $cardType == 3 || $cardType == 4 || $cardType == 5 || $cardType == 7)
                <?php
                if (isset($fileList)) {
                    $filenames = array();
                    ?>

                    <div id="cardDocumentDiv">
                        <?php
                        foreach ($fileList as $file) {
                            $temp = explode('.', $file->file_name, 2);
                            $filename = $temp[0];
                            $temp = explode('_', $file->file_name, 2);
                            $fileCollection = $temp[0];
                            $filenames[]['fileName'] = $file->file_name;
                            empty($temp);
                            ?>
                            <div id="{{$filename}}Div" style='text-align: left; padding: 10px 0px 10px 0px; font-size: 16px;'>
                                <img src="{{ url("/images/".$fileCollection."/".$file->file_name) }}" alt="Thumbnail" height="110"/>

                                {{$file->file_name}}
                                <a style='float: right; padding-top: 45px; cursor: pointer;' onclick='removeFile("{{$filename}}")'>
                                    Retirer
                                </a>
                            </div>
                            <?php

                        }
                    $filenames = json_encode($filenames);
                }
                ?>
                </div>
                <br>
                <h3>
                    <a id="cardAddDocumentLink" style="cursor: pointer; float: left; padding-bottom: 40px;">Ajouter un document</a>
                </h3>
            @endif

            <br />

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    <i class="fa fa-btn fa-user"></i>Enregistrer
                </button>
                @if ($cardType == 2 || $cardType == 5 || $cardType == 7)
                    <input type="hidden" name="fileNames" id="inputFileNames" value='{"fileNames":{{$filenames}}}'/>
                @endif
            </div>
        </form>
        <div hidden >
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="file" id="choseFile" name="file[]" multiple="multiple" accept='image/*' >
        </div>
        <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
        <div class="btn btn-lg btn-link btn-block">
            <h2><a  onclick="history.go(-1);">
                    Annuler
                </a>
            </h2>
        </div>
    </div>
    {{ Html::script('js/createCard.js') }}
@stop
