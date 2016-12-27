@if(Auth::check())
    {{--*/ $currentUserType = Auth::user()->user_type_id /*--}}
@else
    {{--*/ $currentUserType = 5; /*--}}
@endif
{{--*/ $subbar = 'Recherche' /*--}}
@extends('layouts.sign')
@section('title')
    Recherche
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    <style>
        .btn-search-type{
            width: 100px;
        }
        .btn-search-field{
            width: 175px;
        }
        .first-checkbox{
            margin-left: 10px;
        }
        .dropdown-li-small{
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
    <h1>Recherche</h1>

    <form id="form" method="POST" action="{{ URL::route('search') }}">
        <input type="hidden" id="searchType" name="searchType" value="{{$searchType}}" />

        <input type="hidden" id="searchBox1" name="searchBox1" value="{{$searchBox1}}" />
        <input type="hidden" id="searchBox2" name="searchBox2" value="{{$searchBox2}}" />
        <input type="hidden" id="searchBox3" name="searchBox3" value="{{$searchBox3}}" />
        <input type="hidden" id="searchBox4" name="searchBox4" value="{{$searchBox4}}" />

        <input type="hidden" id="searchField1" name="searchField1" value="{{$searchField1}}" />
        <input type="hidden" id="searchField2" name="searchField2" value="{{$searchField2}}" />
        <input type="hidden" id="searchField3" name="searchField3" value="{{$searchField3}}" />
        <input type="hidden" id="searchField4" name="searchField4" value="{{$searchField4}}" />

        <input type="hidden" id="searchCond2" name="searchCond2" value="{{$searchCond2}}" />
        <input type="hidden" id="searchCond3" name="searchCond3" value="{{$searchCond3}}" />
        <input type="hidden" id="searchCond4" name="searchCond4" value="{{$searchCond4}}" />

        <div class="col-sm-3">
            <div class="row">
                <div class="form-group">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">Catégories</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in" style="padding-left: 10px;">
                                @foreach ($cardTypeList as $i => $cardType)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="category{{ $i }}" name="category{{ $i }}" value="{{ $cardType->id }}" {{$categories[$i]}}>
                                            {{ $cardType->name_fr }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3">Photos</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse in" style="padding-left: 10px; padding-top: 10px;">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkWithPictures" name="checkWithPictures" {{$checkWithPictures}}>
                                        Afficher uniquement les résultats avec photos
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div id="quickSearch" class="col-xs-12" style="display:{{ $searchType=='advanced' ? 'none' : 'block' }};">
                    <div class="input-group">
                        <input type="text" class="form-control" id="quickSearchBox" name="quickSearchBox" placeholder="Recherche" value="{{$quickSearchBox}}">
                        <span class="input-group-btn search-panel">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </span>
                    </div>
                    <a id="openAdvanced" href="#" onclick="hideThis('open')" class="pull-right">Recherche avancée</a>
                </div>

                <div id="advancedSearch" style="display:{{ $searchType=='advanced' ? 'block' : 'none' }};">
                    <div class="col-xs-12">
                        <input type="hidden" name="search_field1" value="{{ $searchField1 ? $searchField1 : 'all' }}" id="search_field1">
                        <input type="hidden" name="searchFieldName1" value="{{$searchFieldName1}}" id="searchFieldName1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchBox1" placeholder="Recherche" value="{{$searchBox1}}">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-field" data-toggle="dropdown">
                                    <span id="searchField1">{{ $searchFieldName1 ? $searchFieldName1 : 'Partout' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="field1" class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a href="#all">Partout</a></li>
                                    <li class="divider"></li>
                                    @foreach ($cardAttributeList as $cardAttribute)
                                        <li><a href="#{{ $cardAttribute->id }}" class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-type" data-toggle="dropdown">
                                    <span id="searchCond2">{{ $searchCond2 ? $searchCond2 : 'Et' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="condition2" class="dropdown-menu" role="menu">
                                    <li><a href="#Et">Et</a></li>
                                    <li><a href="#Ou">Ou</a></li>
                                    <li><a href="#Exclure">Exclure</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_cond2" value="{{ $searchCond2 ? $searchCond2 : 'Et' }}" id="search_cond2">
                            <input type="hidden" name="search_field2" value="{{ $searchField2 ? $searchField2 : 'all' }}" id="search_field2">
                            <input type="hidden" name="searchFieldName2" value="{{$searchFieldName2}}" id="searchFieldName2">
                            <input type="text" class="form-control" name="searchBox2" placeholder="Recherche" value="{{$searchBox2}}">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-field" data-toggle="dropdown">
                                    <span id="searchField2">{{ $searchFieldName2 ? $searchFieldName2 : 'Partout' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="field2" class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a href="#all">Partout</a></li>
                                    <li class="divider"></li>
                                    @foreach ($cardAttributeList as $cardAttribute)
                                        <li><a href="#{{ $cardAttribute->id }}" class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-type" data-toggle="dropdown">
                                    <span id="searchCond3">{{ $searchCond3 ? $searchCond3 : 'Et' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="condition3" class="dropdown-menu" role="menu">
                                    <li><a href="#Et">Et</a></li>
                                    <li><a href="#Ou">Ou</a></li>
                                    <li><a href="#Exclure">Exclure</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_cond3" value="{{ $searchCond3 ? $searchCond3 : 'Et' }}" id="search_cond3">
                            <input type="hidden" name="search_field3" value="{{ $searchField3 ? $searchField3 : 'all' }}" id="search_field3">
                            <input type="hidden" name="searchFieldName3" value="{{$searchFieldName3}}" id="searchFieldName3">
                            <input type="text" class="form-control" name="searchBox3" placeholder="Recherche" value="{{$searchBox3}}">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-field" data-toggle="dropdown">
                                    <span id="searchField3">{{ $searchFieldName3 ? $searchFieldName3 : 'Partout' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="field3" class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a href="#all">Partout</a></li>
                                    <li class="divider"></li>
                                    @foreach ($cardAttributeList as $cardAttribute)
                                        <li><a href="#{{ $cardAttribute->id }}" class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-type" data-toggle="dropdown">
                                    <span id="searchCond4">{{ $searchCond4 ? $searchCond4 : 'Et' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="condition4" class="dropdown-menu" role="menu">
                                    <li><a href="#Et">Et</a></li>
                                    <li><a href="#Ou">Ou</a></li>
                                    <li><a href="#Exclure">Exclure</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_cond4" value="{{ $searchCond4 ? $searchCond4 : 'Et' }}" id="search_cond4">
                            <input type="hidden" name="search_field4" value="{{ $searchField4 ? $searchField4 : 'all' }}" id="search_field4">
                            <input type="hidden" name="searchFieldName4" value="{{$searchFieldName4}}" id="searchFieldName4">
                            <input type="text" class="form-control" name="searchBox4" placeholder="Recherche" value="{{$searchBox4}}">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-search-field" data-toggle="dropdown">
                                    <span id="searchField4">{{ $searchFieldName4 ? $searchFieldName4 : 'Partout' }}</span> <span class="caret"></span>
                                </button>
                                <ul id="field4" class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a href="#all">Partout</a></li>
                                    <li class="divider"></li>
                                    @foreach ($cardAttributeList as $cardAttribute)
                                        <li><a href="#{{ $cardAttribute->id }}" class="dropdown-li-small">{{ $cardAttribute->name_fr }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a id="closeAdvanced" href="#" onclick="hideThis('close')">Fermer la recherche avancée</a>
                        <button type="submit" class="btn btn-primary pull-right">Rechercher</button>
                    </div>
                </div>
            </div>

    </form>


    <table class="table table-striped table-bordered table-hover" id="cardSearchTable">
        <thead>
        <tr>
            <th>Type</th>
            <th>Resumé</th>
            @if($currentUserType < 4)
                <th>Création</th>
            @endif
            <th>Actions</th>
        </tr>
        </thead>
    </table>
    </div>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/searchCard.js') }}

@stop
