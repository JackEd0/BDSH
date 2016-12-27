{{--*/ $subbar = 'Administration' /*--}}
@extends('layouts.report')
@section('title')
    Rapport | Ventes
@stop
@section('reportTitle')
    Rapport de vente d'images
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
                <a class="btn btn-lg btn-primary btn-block" onclick="sendForm('transactions')" title="Générer les rapports sur l'intervale indiqué">
                    <i class="fa fa-btn fa-user"></i>Générer
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        @if(isset($reportTransactionList))
            <h2>Rapport de vente des images</h2>
            <table class="table table-bordered table-striped table-hover" id="reportTable">
                <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Type</th>
                    <th>Document</th>
                    <th>Cote</th>
                    <th>Type De License</th>
                    <th>Date Transaction</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportTransactionList as $reportTransaction)
                    <tr>
                        <td>{{ $reportTransaction->username }}</td>
                        <td>{{ $reportTransaction->user_type_name_fr }}</td>
                        <td>{{ $reportTransaction->file_name }}</td>
                        <td>{{ explode('_', $reportTransaction->file_name)[0] }}</td>
                        <td>{{ $reportTransaction->licence_type_name_fr }}</td>
                        <td>{{ $reportTransaction->created_at }}</td>
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
