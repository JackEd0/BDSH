{{--*/ $subbar = 'Administration' /*--}}
@extends('layouts.sign')
@section('title')
    Recherche | Historique
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/bootstrap-datepicker.standalone.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br />
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Historique de recherche</h1>
    <br />

    <div class="col-md-3">

        <br />

        <form class="form-group" role="form" method="GET" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="startDate" class="control-label">Entre le</label>
                <input class="form-control" type="text" placeholder="Date de début" name="startDate" id="startDate">
            </div>
            <div class="form-group">
                <label for="endDate" class="control-label">Et le</label>
                <input class="form-control" type="text" placeholder="Date de fin" name="endDate" id="endDate">
            </div>
        </form>
        <div class="form-group btn-group" style="margin-left: 8%">
            <a onclick="sendForm('delete');" class="btn  btn-lg btn-default" title="Supprimer l'historique" >Supprimer </a>
            <a onclick="sendForm('view');" class="btn  btn-lg btn-default" title="Afficher l'historique" >Afficher</a>
        </div>

        <br />

        <div class="">
            <a href="{{ URL::route('search.deleteAllHistory') }}" class="btn btn-block btn-default" onclick="if(!confirm('Vous êtes sûr de vouloir continuer ?')) return false;" >Supprimer tout l'historique ({{ $historyNumber }})</a>
        </div><br />
        <div class="">
            <a href="{{ URL::route('search.searchHistory') }}" class="btn btn-block btn-default" >Afficher tout l'historique ({{ $historyNumber }}) </a>
        </div>
    </div>

    <div class="col-md-9">
        <table class="table table-striped table-bordered table-hover" id="searchHistory"
               data-search="true">
            <thead>
            <tr>
                <th>Mot clés</th>
                <th>Recherché par</th>
                <th>Date de Recherche</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            {{--*/ $i = 0; /*--}}
            @foreach ($history as $term)
            <tr>
                <td class="col-md-3">{{ $term->term }}</td>
                <td>{{ $historyUserName[$i] }} ({{ $historyUserType[$i] }})</td>
                <td  class="col-md-3">{{ $term->created_at }}</td>
                <td class="col-md-3">
                    <a href="{{ URL::route('search.historyResult', $term->term) }}">Voir les résultats</a>
                </td>
            </tr>
            {{--*/ ++$i; /*--}}
            @endforeach
            </tbody>
        </table>
    </div>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/bootstrap-datepicker.min.js') }}
    {{ Html::script('js/searchHistory.js') }}
@stop
