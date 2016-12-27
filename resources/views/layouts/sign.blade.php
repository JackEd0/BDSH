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
    @yield('content')

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ Html::script('js/ie10-viewport-bug-workaround.js') }}

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
