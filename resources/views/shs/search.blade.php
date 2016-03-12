<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 19/02/2016
 * Time: 16:02
 */
$subbar = 0;
?>
@extends('layouts.sign')
@section('title') Shs | Search @stop

@section('content')
    <div class="page">
        <div class="logo">
            <div class="slogan"><img src="view-source:http://www.histoiresherbrooke.ca/medias/logo.png" alt="Vos histoire"/>
            </div>
            <img src="view-source:http://www.histoiresherbrooke.ca/medias/logo.jpg" alt="Vos histoires - Nos images"/></div>

        <form method="post" action="search.php">
            <div class="search"><span class="label">RECHERCHE</span> <input type="text" name="search_input[]"
                                                                            class="text"/>
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

    <style>
        /* Global Resets */
        body, html, strong, em, p, h1, h2, h3, h4, h5, h6, h7, div, form {
            margin: 0px;
            padding: 0px;
            font-family: Arial;
            font-size: 13px;
        }

        form {
            margin: 0;
            padding: 0;
        }

        /*Listes*/
        ul, ol, li {
            margin: 0px;
            margin-left: 10px;
            margin-bottom: 5px;
            padding: 0px;
        }

        /*Fix pour bordure bleu sur lien images*/
        img {
            border: 0;
        }

        div.page {
            /*width: 968px;*/
            margin: auto;
            background-image: url('http://puu.sh/ne8QP/fdf11b8e45.jpg');
            background-repeat: repeat-y;
            text-align: center;
            position: relative;
            border-bottom: 18px solid #6db444;
        }

        div.menu {
            background-color: #009fc3;
            color: #ffffff;
            padding: 4px 0;
            text-align: center;
        }

        div.menu a {
            text-decoration: none;
            font-weight: bold;
            color: #ffffff;
            padding: 0 10px;
        }

        div.menu a:hover {
            text-decoration: underline;
        }

        div.logo {
            margin-top: 77px;
            margin-bottom: 83px;
            position: relative;
        }

        div.logo div.slogan {
            position: absolute;
            left: 22px;
            top: -43px;
        }

        div.search {
            clear: both;
            vertical-align: middle;
            background-color: #fdb822;
            padding: 6px 0;
            text-align: center;
        }

        div.search span.label {
            font-weight: bold;
            font-size: 15px;
        }

        div.search span.advanced_search {
            padding-left: 58px;
            font-size: 10px;
            font-weight: bold;
        }

        div.search span.advanced_search a {
            color: #000000;
        }

        div.search input.text {
            font-size: 12px;
            border: 1px solid #000000;
            width: 230px;
        }

        div.footer {
            text-align: center;
            padding: 35px 0;
        }

        div.main div.collections {
            float: left;

            padding: 20px;
            padding-left: 70px;
            padding-right: 100px;
        }

        div.main div.collections h2 {
            padding-bottom: 20px;
        }

        div.main div.collections h3 {
            font-size: 18px;
            padding-bottom: 5px;
        }

        div.main div.collections ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        div.main div.collections ul li {
            font-size: 18px;
            margin: 0;
            padding: 0;
            border-bottom: 1px solid #000000;
            margin-bottom: 3px;
            padding-bottom: 1px;
        }

        div.main div.collections ul li a {
            color: #000000;
            font-weight: bold;
            text-decoration: none;
        }

        div.main div.content {
            float: left;
            padding: 50px 0;
        }

        div.main div.content h1, div.main div.content h1 strong {
            font-size: 16px;
        }

        div.main div.content div.resultat {
            padding-bottom: 40px;
        }

        div.main div.content div.resultat a {
            color: #000000;
            font-weight: bold;
        }

        div.main div.content div.resultat p.fields {
            padding-bottom: 4px;
        }

        div.main div.content p.fields strong {
            width: 150px;
            display: block;
            float: left;
        }

        div.main div.content p.fields span.values {
            display: block;
            padding-left: 150px;
        }

        a.order {
            background-color: #009fc3;
            color: white;
            padding: 10px 12px;
        }

        p.form_element {
            padding-bottom: 5px;
        }

        label {
            padding-top: 2px;
            font-weight: bold;
            display: block;
        }

        p.error {
            color: red;
            border: 1px solid red;
            padding: 10px;
            margin: 10px;
            background-color: white;
        }
    </style>
@stop

