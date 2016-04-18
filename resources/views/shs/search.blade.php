<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 19/02/2016
 * Time: 16:02.
 */
$subbar = 'Recherche';
?>
@extends('layouts.sign')
@section('title')
    Shs | Search
@stop

@section('content')
    <div class="page">
        <div class="logo">
            <div class="slogan"><img src="view-source:http://www.histoiresherbrooke.ca/medias/logo.png" alt="Vos histoire"/>
            </div>
            <img src="view-source:http://www.histoiresherbrooke.ca/medias/logo.jpg" alt="Vos histoires - Nos images"/></div>

        <form method="post" action="">
            <div class="search"><span class="label">RECHERCHE</span>
                <input type="text" name="search_input[]" class="text"/>
                <input type="image" style="position: absolute;"
                       src="view-source:http://www.histoiresherbrooke.ca/medias/btn_search.png"/><span
                        class="advanced_search"><a href="search.php?advanced">Recherche avancée</a></span></div>
        </form>

        <div class="footer">
            <img src="view-source:http://histoiresherbrooke.ca/medias/footer_home.png"
                 alt="La collection de la Société d'histoire de Sherbrooke"/>
        </div>
        <div class="menu"><a href="http://www.histoiresherbrooke.org/a_propos_de_la_shs">À PROPOS DE LA SHS</a> | <a
                    href="http://www.histoiresherbrooke.org/devenez_membre">DEVENEZ MEMBRE</a> | <a
                    href="http://www.histoiresherbrooke.org/comment_nous_joindre">COMMENT NOUS JOINDRE</a></div>
    </div>

    <!-- CSS de la page de recherche -->
    {{ Html::style('css/shsSearch.css') }}
@stop

