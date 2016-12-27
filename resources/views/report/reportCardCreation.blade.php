{{--*/ $subbar = 'Administration' /*--}}
@extends('layouts.report')
@section('title')
    Rapport | Fiches
@stop
@section('reportTitle')
    Rapport de création des fiches
@stop

@section('content')
    <div class="form-group col-sm-9 panel panel-default">
        <div class="form-group col-md-5" >
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
                <a class="btn btn-lg btn-primary btn-block" onclick="sendForm('cardCreation')" title="Générer les rapports sur l'intervale indiqué">
                    <i class="fa fa-btn fa-user"></i>Générer
                </a>
            </div>
        </div>
        <br /><br />
        <div class="col-md-4 form-group">
            <div class="radio">
                <label><input type="radio" name="includeCardWithImages" value="all"
                              @if($includeCardWithImages == "all") {{ "checked" }}@endif
                    >Inclure toutes les fiches</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="includeCardWithImages" value="without"
                    @if($includeCardWithImages == "without") {{ "checked" }}@endif
                    >Inclure les fiches sans images</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="includeCardWithImages" value="with"
                    @if($includeCardWithImages == "with") {{ "checked" }}@endif
                    >Inclure les fiches avec images</label>
            </div>
        </div>
    </div>

    <div class="col-sm-9">
        @if(isset($reportCardList))
            <h2>Rapport de création des fiches</h2>
            <table class="table table-bordered table-striped table-hover" id="cardReportTable">
                <thead>
                <tr>
                    <th>Numéro de fiche</th>
                    <th>Catégorie de fiche</th>
                    @if(isset($reportCardList[0]->file_name))
                        <th id="imageName">Nom des images</th>
                    @endif
                    <th>Date de Création</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportCardList as $reportCard)
                    <tr>
                        <td>{{ $reportCard->card_number }}  </td>
                        <td>{{ $reportCard->name_fr }}  </td>
                        @if(isset($reportCard->file_name))
                            <td>{{ $reportCard->file_name }}  </td>
                        @endif
                        <td>{{ $reportCard->created_at }}  </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        @if(isset($reportCardWithImagesList))
            <h2>Rapport de création des fiches</h2>
            <table class="table table-bordered table-striped table-hover" id="cardReportTable">
                <thead>
                <tr>
                    <th>Numéro de fiche</th>
                    <th>Catégorie de fiche</th>
                    <th id="imageName">Nom des images</th>
                    <th>Date de Création</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportCardWithImagesList as $reportCard)
                    <tr>
                        <td>{{ $reportCard->card_number }}  </td>
                        <td>{{ $reportCard->name_fr }}  </td>
                        <td>{{ $reportCard->file_name }}  </td>
                        <td>{{ $reportCard->created_at }}  </td>
                    </tr>
                @endforeach
                @foreach($reportCardWithoutImagesList as $reportCard)
                    <tr>
                        <td>{{ $reportCard->card_number }}  </td>
                        <td>{{ $reportCard->name_fr }}  </td>
                        <td>{{ $reportCard->file_name }}  </td>
                        <td>{{ $reportCard->created_at }}  </td>
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
    {{ Html::script('js/reportCardCreation.js') }}
@stop
