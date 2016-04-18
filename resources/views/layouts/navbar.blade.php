
{{ Html::style('css/navbar.css') }}

<?php
if (Auth::check()) {
    $currentUserTypeId = Auth::user()->user_type_id;
}

$navbar = array('Inscription' => '', 'Connexion' => '', 'Panier' => '', 'Profil' => '', 'Administration' => '', 'Recherche' => '');
if (isset($subbar)) {
    $navbar[$subbar] = 'active';
}
 ?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #019fc4; color: white;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse" style="font-size: 115%;">
            <ul class="nav navbar-nav">
                <li class=""><a class="mylink" style="color:white;"  href="#">Accueil</a></li>
                <li class="{{ $navbar["Recherche"] }}"><a style="color:white;" href="{{ url('search') }}">Recherche</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @if($currentUserTypeId == 1 || $currentUserTypeId == 4)
                        <li class="{{ $navbar["Panier"] }}"><a class="mylink" style="color:white;" href="#">Panier</a></li>
                    @endif
                    @if($currentUserTypeId == 1)
                            <li class="dropdown {{ $navbar["Administration"] }}">
                                <a class="mylink" style="color:white;" href="#">Administration</a>
                            <div class="dropdown-content">
                                <a href="{{ URL::route('users.list') }}">Gérer les utilisateurs</a>
                                <a href="{{ URL::route('cards.add') }}">Ajouter une fiche</a>
                                <a href="#">Ajouter un lot de documents</a>
                            </div>
                        </li>

                        @endif
                    <li class="dropdown {{ $navbar["Profil"] }}">
                        <a style="color: white;" href="{{ URL::route('users.profile', \Crypt::encrypt(Auth::user()->id)) }}">
                            Mon Profil
                        </a>
                    </li>
                    <li ><a class="mylink" style="color:white;" href="{{ url('/logout') }}">Deconnecter</a></li>
                @else
                    <li class="{{ $navbar["Inscription"] }}"><a style="color:white;" href="{{ url('/register') }}">Inscription</a></li>
                    <li class="{{ $navbar["Connexion"] }}"><a class="mylink" style="color:white;" href="{{ url('/login') }}">Connexion</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>