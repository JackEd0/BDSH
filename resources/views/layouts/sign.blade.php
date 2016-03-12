<?php
$navbar = 0;
if(isset($subbar))
    $navbar += $subbar;
?>
        <!DOCTYPE html>
<html lang="en">
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
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:white;"  href="{{ URL::route('shs.home') }}">Accueil</a>
            <a class="navbar-brand" style="color:white;"  href="{{ URL::route('shs.search') }}">Recherche</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" style="font-size: 115%;">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php
                if ($navbar == 3) echo 'active';
                ?>"><a class="mylink" style="color:white;" href="#">Panier</a></li>
                <li class="<?php
                if ($navbar == 4) echo 'active';
                ?>"><a class="mylink" style="color:white;" href="#">Mon Profil</a></li>
                <li class="<?php
                if ($navbar == 5) echo 'active';
                ?>"><a class="mylink" style="color:white;" href="{{ URL::route('users.list') }}">Administration</a></li>
                <li class="<?php
                if ($navbar == 1) echo 'active';
                ?>"><a style="color:white;" href="{{ URL::route('users.signUp') }}">Inscription</a></li>
                <li class="<?php
                if ($navbar == 2) echo 'active';
                ?>"><a class="mylink" style="color:white;" href="{{ URL::route('users.login') }}">Connexion</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<style>
    .navbar {
        background-color: #019fc4;
        color: white;
    }
</style>

<div class="container">
    <!-- Example row of columns -->
    @yield('content')



    <!--<footer>
        <p>&copy; 2015 Company, Inc.</p>
    </footer>-->
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ Html::script('js/ie10-viewport-bug-workaround.js') }}
{{ Html::script('js/bootstrap.min.js') }}

</body>
</html>
