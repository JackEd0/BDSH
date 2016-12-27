<!--
 * TO DO
 *   - Populer le dropdown avec Javascript
 -->

<?php

if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
}

//active le menu Recherche
$subbar = 'Recherche';
$i = 0;
?>
@extends('layouts.sign')
@section('title')
    Recherche
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    <style>
        .btn-search-type {
            width: 100px;
        }

        .btn-search-field {
            width: 175px;
        }

        .first-checkbox {
            margin-left: 10px;
        }

        .top-buffer {
            margin-top: 20px;
        }

        .dropdown-li-small {
            line-height: 1.2 !important;
        }

        .scrollable-menu {
            height: auto;
            max-height: 250px;
            overflow-x: hidden;
        }
    </style>

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br/>
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1 class="col-xs-offset-1">Recherche</h1>
    <br/>
    <form id="form" method="POST" action="{{ URL::route('search') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="input-group">
                    <input type="hidden" name="search_field1" value="all" id="search_field1">
                    <input type="text" class="form-control" name="searchBox1" placeholder="Recherche">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-field"
                                data-toggle="dropdown">
                            <span id="searchField1">Partout</span> <span class="caret"></span>
                        </button>
                        <ul id="field1" class="dropdown-menu scrollable-menu" role="menu">
                            <li><a href="#all">Partout</a></li>
                            <li class="divider"></li>
                            @foreach ($cardAttributeList as $cardAttribute)
                                <li><a href="#{{ $cardAttribute->id }}"
                                       class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-type"
                                data-toggle="dropdown">
                            <span id="searchCond2">Et</span> <span class="caret"></span>
                        </button>
                        <ul id="condition2" class="dropdown-menu" role="menu">
                            <li><a href="#Et">Et</a></li>
                            <li><a href="#Ou">Ou</a></li>
                            <li><a href="#Exclure">Exclure</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_cond2" value="Et" id="search_cond2">
                    <input type="hidden" name="search_field2" value="all" id="search_field2">
                    <input type="text" class="form-control" name="searchBox2" placeholder="Recherche">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-field"
                                data-toggle="dropdown">
                            <span id="searchField2">Partout</span> <span class="caret"></span>
                        </button>
                        <ul id="field2" class="dropdown-menu scrollable-menu" role="menu">
                            <li><a href="#all">Partout</a></li>
                            <li class="divider"></li>
                            @foreach ($cardAttributeList as $cardAttribute)
                                <li><a href="#{{ $cardAttribute->id }}"
                                       class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-type"
                                data-toggle="dropdown">
                            <span id="searchCond3">Et</span> <span class="caret"></span>
                        </button>
                        <ul id="condition3" class="dropdown-menu" role="menu">
                            <li><a href="#Et">Et</a></li>
                            <li><a href="#Ou">Ou</a></li>
                            <li><a href="#Exclure">Exclure</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_cond3" value="Et" id="search_cond3">
                    <input type="hidden" name="search_field3" value="all" id="search_field3">
                    <input type="text" class="form-control" name="searchBox3" placeholder="Recherche">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-field"
                                data-toggle="dropdown">
                            <span id="searchField3">Partout</span> <span class="caret"></span>
                        </button>
                        <ul id="field3" class="dropdown-menu scrollable-menu" role="menu">
                            <li><a href="#all">Partout</a></li>
                            <li class="divider"></li>
                            @foreach ($cardAttributeList as $cardAttribute)
                                <li><a href="#{{ $cardAttribute->id }}"
                                       class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xs-10 col-xs-offset-1">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-type"
                                data-toggle="dropdown">
                            <span id="searchCond4">Et</span> <span class="caret"></span>
                        </button>
                        <ul id="condition4" class="dropdown-menu" role="menu">
                            <li><a href="#Et">Et</a></li>
                            <li><a href="#Ou">Ou</a></li>
                            <li><a href="#Exclure">Exclure</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_cond4" value="Et" id="search_cond4">
                    <input type="hidden" name="search_field4" value="all" id="search_field4">
                    <input type="text" class="form-control" name="searchBox4" placeholder="Recherche">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle btn-search-field"
                                data-toggle="dropdown">
                            <span id="searchField4">Partout</span> <span class="caret"></span>
                        </button>
                        <ul id="field4" class="dropdown-menu scrollable-menu" role="menu">
                            <li><a href="#all">Partout</a></li>
                            <li class="divider"></li>
                            @foreach ($cardAttributeList as $cardAttribute)
                                <li><a href="#{{ $cardAttribute->id }}"
                                       class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-10 col-xs-offset-1" style="padding-top: 15px">
                <button type="submit" class="btn btn-primary pull-right">Rechercher</button>
            </div>
        </div>
    </form>


    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/searchCard.js') }}
    <script>
        $(document).ready(function (e) {
            $('.search-panel #field1').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchField1').text(concept);
                $('.input-group #search_field1').val(param);
            });

            $('.search-panel #field2').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchField2').text(concept);
                $('.input-group #search_field2').val(param);
            });

            $('.search-panel #condition2').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchCond2').text(concept);
                $('.input-group #search_cond2').val(param);
            });

            $('.search-panel #field3').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchField3').text(concept);
                $('.input-group #search_field3').val(param);
            });

            $('.search-panel #condition3').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchCond3').text(concept);
                $('.input-group #search_cond3').val(param);
            });

            $('.search-panel #field4').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchField4').text(concept);
                $('.input-group #search_field4').val(param);
            });

            $('.search-panel #condition4').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#searchCond4').text(concept);
                $('.input-group #search_cond4').val(param);
            });
        });
    </script>
@stop
