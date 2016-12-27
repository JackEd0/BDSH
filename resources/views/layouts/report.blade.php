<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS : bootstrap.min.css-->
    {{ Html::style('css/bootstrap.min.css') }}
            <!-- Custom styles for this template : jumbotron.css-->
    {{ Html::style('css/jumbotron.css') }}

            <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    {{ Html::script('js/ie8-responsive-file-warning.js') }}<![endif]-->
    {{ Html::script('js/ie-emulation-modes-warning.js') }}

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Jquery and Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    {{ Html::script('js/jquery-2.2.2.min.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
</head>

<body>


@include('layouts.navbar')


<div class="container">
    <!-- Style pour datepicker et datatable -->
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/bootstrap-datepicker.standalone.min.css') }}
    {{ Html::style('css/buttons.dataTables.min.css') }}
    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br /><br />
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>@yield('reportTitle')</h1>
    <br />

    <div class="col-sm-3">
        <div class="">
            <div class="form-group">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapseReport">Rapports</a>
                            </h4>
                        </div>
                        <div id="collapseReport" class="panel-collapse collapse in">
                            <ul class="list-group">
                                <li class="list-group-item" title="Rapports de photographies ajoutées" id="PictureReport">
                                    <a href="{{ URL::route('report.reportPicture') }}">Photographies Ajoutées</a>
                                </li>
                                <li class="list-group-item" title="Rapports de fiches ajoutées" id="cardReport">
                                    <a href="{{ URL::route('report.reportCardCreation') }}">Fiches Ajoutées</a>
                                </li>
                                <li class="list-group-item" title="Rapports d'utilisation des images" id="imageReport">
                                    <a href="{{ URL::route('report.transaction') }}">Utilisation des Images</a>
                                </li>
                                <li class="list-group-item" title="Rapports de téléchargement des images" id="imageDownloadReport">
                                    <a href="{{ URL::route('report.download') }}">Téléchargement des Images</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseQuickReport">Génération rapide :</a>
                    </h4>
                </div>
                <div id="collapseQuickReport" class="panel-collapse collapse in">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ URL::route($reportTypeUrl , 'week') }}"
                               title="Générer le rapport pour la dernière semaine">
                                La dernière semaine
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ URL::route($reportTypeUrl , 'month') }}"
                               title="Générer le rapport pour le dernier mois">
                                Le dernier mois
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ URL::route($reportTypeUrl , 'semester') }}"
                               title="Générer le rapport pour les 4 derniers mois">
                                Les 4 derniers mois
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ URL::route($reportTypeUrl , 'year') }}"
                               title="Générer le rapport pour la dernière année">
                                La dernière année
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ Html::script('js/ie10-viewport-bug-workaround.js') }}

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
