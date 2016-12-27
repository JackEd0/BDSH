@if (Auth::check())
    {{--*/ $currentUserTypeId = Auth::user()->user_type_id /*--}}
@else
    {{--*/ $currentUserTypeId = 0 /*--}}
@endif
{{--*/ $navbar = array('Inscription' => '', 'Connexion' => '', 'Panier' => '', 'Profil' => '', 'Administration' => '', 'Recherche' => '') /*--}}
@if (isset($subbar))
    {{--*/ $navbar[$subbar] = 'active' /*--}}
@endif

{{--*/ $basketCookie = \Illuminate\Support\Facades\Cookie::get('basket') /*--}}
{{--*/ $nombreItem = 0 /*--}}
@if($basketCookie != NULL)
    {{--*/ $cookieExploded = explode('|', $basketCookie) /*--}}
    @foreach ($cookieExploded as $caseCookie)
        @if ($caseCookie != null)
            {{--*/ $nombreItem ++ /*--}}
        @endif
    @endforeach
@endif
{{ Html::style('css/navbar.css') }}
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #019fc4; color: white;">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse" style="font-size: 115%;">
            <ul class="nav navbar-nav">
                <li>
                    <a style="color:white;" href="http://www.histoiresherbrooke.org/">Accueil</a>
                </li>
                <li class="{{ $navbar["Recherche"] }}">
                    <a style="color:white;" href="{{ url('searchHome') }}">Recherche</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if($currentUserTypeId == 0 || $currentUserTypeId == 1 || $currentUserTypeId == 4)
                    <li class="{{ $navbar["Panier"] }}">
                        <a style="color:white;" href="{{ url('basket') }}">Panier
                            <span class="badge">{{$nombreItem}}</span>
                        </a>
                    </li>
                @endif
                @if($currentUserTypeId == 1 || $currentUserTypeId == 2)
                    <li class="dropdown {{ $navbar["Administration"] }}">
                        <a style="color:white;" href="#">Administration</a>
                        <div class="dropdown-content">
                            <a href="{{ URL::route('cards.add') }}">Ajouter une fiche</a>
                            @if($currentUserTypeId == 1 )
                                <a href="{{ URL::route('users.list', 1) }}">Gérer les utilisateurs</a>
                                <a href="{{ URL::route('document.import') }}">Ajouter un lot de documents</a>
                                <a href="{{ URL::route('cards.addAttribute') }}">Gérer les champs d'une fiche</a>
                                <a href="{{ URL::route('collection.List') }}">Gérer les collections</a>
                                <a href="{{ URL::route('licence.List') }}">Gérer la licence</a>
                                <a href="{{ URL::route('search.searchHistory') }}">Historique de recherche</a>
                                <a href="{{ URL::route('report.transaction') }}">Rapport d'utilisation</a>
                                <a href="{{ URL::route('fees.editionFees') }}">Modification des frais</a>
                                <a href="{{ URL::route('externalParameter.editionParameter') }}">Modification des
                                    paramètres externes</a>
                                <a href="{{ URL::route('transactionAdmin.transactionList') }}">Liste des commandes </a>
                            @endif
                        </div>
                    </li>
                @endif
                @if(Auth::check())
                    <li class="dropdown {{ $navbar["Profil"] }}">
                        <a style="color:white;" href="#">Mon profil</a>
                        <div class="dropdown-content">
                            <a href="{{ URL::route('users.profile', \Crypt::encrypt(Auth::user()->id)) }}">Modifier mon
                                profil</a>
                            <a href="{{ URL::route('transactionClient.transactionList') }}">Mes commandes</a>
                        </div>
                    </li>

                    <li>
                        <a style="color:white;" href="{{ url('/logout') }}">Déconnexion</a>
                    </li>
                @else
                    <li class="{{ $navbar["Inscription"] }}">
                        <a style="color:white;" href="{{ url('/register') }}">Inscription</a>
                    </li>
                    <li class="{{ $navbar["Connexion"] }}">
                        <a style="color:white;" href="{{ url('/login') }}">Connexion</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
