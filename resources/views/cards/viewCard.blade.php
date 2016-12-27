<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 04/04/2016
 * Time: 22:32.
 */
//active le menu administration
$subbar = 'Recherche';

if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
} else {
    $currentUserType = 0;
}
?>

@extends('layouts.sign')

@section('title')
    Fiche | Visualisation
@stop

@section('content')
    {{ Html::style('css/owl.carousel.css') }}
    {{ Html::style('css/owl.theme.css') }}
    {{ Html::style('css/owl.transitions.css') }}
    {{ Html::style('css/lightbox.css') }}
    <br/>
    <div class="container" style="display: block; text-align: center; margin: auto; max-width: 80%;">
        <div style="display: inline-flex;" class="col-md-12">
            @if(count($fileList) != 0)
                <div class='col-md-1 customNavigation' style='padding-top: 65px;'>
                    <a class='btn prev glyphicon glyphicon-chevron-left btn-lg' title='Précédant'> </a>
                </div>
                <div id='cardDocumentDiv' class='col-md-10 owl-carousel owl-theme'>

                    @foreach ($fileList as $file)
                        <?php
                        $temp = explode('.', $file->file_name, 2);
                        $filename = $temp[0];
                        $temp = explode('_', $file->file_name, 2);
                        $fileCollection = $temp[0];
                        unset($temp);
                        $carousselHeight = 200;
                        $image = url('/images/' . $fileCollection . '/' . $file->file_name);
                        $size = getimagesize('C:/data/HOME/Documents/images/IMPORTER/ICONO/' . $fileCollection . '/' . $file->file_name);
                        $width = round($size[0] * $carousselHeight / $size[1]);
                        ?>
                        <div id='{{$filename."Div"}}' style='margin: auto;'>
                            <a href='{{ url("/images/".$fileCollection."/".$file->file_name)}}' data-lightbox='lightbox'
                               data-title='{{$filename}}'>
                                <img src='{{url("/images/".$fileCollection."/".$file->file_name)}}' alt='{{$filename}}'
                                     height='{{$carousselHeight}}'
                                     style='width:{{$width."px"}}; display: block; margin: 0 auto;'
                                     data-title='{{$filename}}'>
                            </a>
                            <div>
                                <div style='text-align: center;'>
                                    <i>
                                        <span>{{$file->file_name}}</span>
                                    </i>
                                </div>
                            </div>
                            <div>
                                @if($currentUserType == 0 || $currentUserType == 1 || $currentUserType == 4)
                                    <div style='text-align: center;'>
                                        <a href='{{ url("/cookie/set/".$file->file_name)}}'>
                                            <span> Ajouter au panier </span>
                                            <span class='glyphicon glyphicon-shopping-cart'></span>
                                        </a>
                                    </div>
                                @endif
                                @if($currentUserType == 1 || $currentUserType == 2 || $currentUserType == 3)
                                    <div style='text-align: center;'>
                                        <input type="hidden" value="{{ $fileCollection }}" id="fileCollection">
                                        <input type="hidden" value="{{ $file->file_name }}" id="fileName">
                                        <a id="downloadImage" class="btn-link"
                                           href='{{ url("/downloadImage/".$fileCollection."/".$file->file_name)}}'>
                                            <span> Télécharger </span>
                                            <span class='glyphicon glyphicon-download-alt'></span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class='col-md-1 customNavigation' style='padding-top: 65px;'>
                    <a class='btn next glyphicon glyphicon-chevron-right btn-lg' title='Suivant'> </a>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <form class="form-signin" id="viewCardForm" method="POST" action="">
                {!! csrf_field() !!}
                <br/>
                <div style="margin-bottom: 2%;">
                    @if (isset($message))
                        <div class="bg-success bg-sm"> {{  $message }} </div>
                    @endif
                </div>

                <div align="center" style="text-align:left;">
                    <dl class="dl-horizontal">
                        <dt>Type de fiche</dt>
                        <dd>{{$cardType->name_fr}}</dd>
                        <dt>N° de fiche</dt>
                        <dd>{{ $card->card_number }}</dd>
                        @if($cardType->id == 2 ||$cardType->id == 5 ||$cardType->id == 7)
                            <dt>Collection</dt>
                            <dd>{{ $collection->code . " - " . $collection->name}}</dd>
                        @endif
                        @foreach ($attributeInfos as $association)
                            @if(!($association->value == null && $association->hide_if_empty == 1))
                                @if($currentUserType == 1)
                                    <dt><b>{{$association->name_fr}}</b></dt>
                                    <dd>{{$association->value}}</dd>
                                @elseif($currentUserType != 1 && $association->user_permit_level != 1  )
                                    <dt><b>{{$association->name_fr}}</b></dt>
                                    <dd>{{$association->value}}</dd>
                                @endif
                            @endif
                        @endforeach
                    </dl>
                </div>
            </form>
            <div class="btn btn-lg btn-link btn-block">
                <h2><a onclick="history.go(-1);">
                        Retour
                    </a>
                </h2>
            </div>
        </div>
    </div>

    {{ Html::script('./js/viewCard.js') }}
    {{ Html::script('./js/lightbox.js') }}
    {{ Html::script('./js/owl.carousel.min.js') }}
@stop