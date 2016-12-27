{{--*/ $subbar = 'Administration' /*--}}
@extends('layouts.report')
@section('title')
    Rapport | Téléchargements
@stop
@section('reportTitle')
    Rapport de téléchargement d'images
@stop

@section('content')
    <div class="form-group col-sm-9 panel panel-default">
        <div class="form-group col-md-5">
            <h3>Génération précise</h3>
            <div class="form-group">
                <label for="startDate" class="control-label">Entre le</label>
                <input class="form-control" type="text" placeholder="Date de début" name="startDate" id="startDate" required
                       @if(isset($startDate))
                       value="{{ substr($startDate, 0, 10) }}"
                        @endif>
            </div>
            <div class="form-group">
                <label for="endDate" class="control-label">Et le</label>
                <input class="form-control" type="text" placeholder="Date de fin" name="endDate" id="endDate" required
                       @if(isset($endDate))
                       value="{{ substr($endDate, 0, 10) }}"
                        @endif>
            </div>
            <div class="form-group">
                <a class="btn btn-lg btn-primary btn-block" onclick="sendForm('downloads')" title="Générer les rapports sur l'intervale indiqué">
                    <i class="fa fa-btn fa-user"></i>Générer
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        @if(isset($reportDownloadList))
            <h2>Rapport de téléchargement des images</h2>
            <table class="table table-bordered table-striped table-hover" id="reportTable">
                <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Type</th>
                    <th>Document</th>
                    <th>Cote</th>
                    <th>Utilisation</th>
                    <th>Date Transaction</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportDownloadList as $reportDownload)
                    <tr>
                        <td>{{ $reportDownload->username }}</td>
                        <td>{{ $reportDownload->user_type_name_fr }}</td>
                        <td>{{ $reportDownload->file_name }}</td>
                        <td>{{ explode('_', $reportDownload->file_name)[0] }}</td>
                        <td>{{ $reportDownload->comment }}</td>
                        <td>{{ $reportDownload->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/bootstrap-datepicker.min.js') }}
    {{ Html::script('js/dataTables.buttons.min.js') }}
    {{ Html::script('js/jszip.min.js') }}
    {{ Html::script('js/pdfmake.min.js') }}
    {{ Html::script('js/vfs_fonts.js') }}
    {{ Html::script('js/buttons.html5.min.js') }}
    {{ Html::script('js/buttons.print.min.js') }}
    {{ Html::script('js/reportDashboard.js') }}
@stop
