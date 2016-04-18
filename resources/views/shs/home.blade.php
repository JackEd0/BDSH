<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Soci�t� d'histoire de Sherbrooke</title>
    <meta name="description" content="Les archives du moment et les actualit�s de la soci�t� d'histoire de sherbrooke">
    <meta name="keywords" content="">
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <meta charset="utf-8"/>
    <style>
        .twentytwenty-horizontal .twentytwenty-handle:before, .twentytwenty-horizontal .twentytwenty-handle:after, .twentytwenty-vertical .twentytwenty-handle:before, .twentytwenty-vertical .twentytwenty-handle:after {
            content: " ";
            display: block;
            background: white;
            position: absolute;
            z-index: 30;
            -webkit-box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
        }

        .twentytwenty-horizontal .twentytwenty-handle:before, .twentytwenty-horizontal .twentytwenty-handle:after {
            width: 3px;
            height: 9999px;
            left: 50%;
            margin-left: -1.5px;
        }

        .twentytwenty-vertical .twentytwenty-handle:before, .twentytwenty-vertical .twentytwenty-handle:after {
            width: 9999px;
            height: 3px;
            top: 50%;
            margin-top: -1.5px;
        }

        .twentytwenty-before-label, .twentytwenty-after-label, .twentytwenty-overlay {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .twentytwenty-before-label, .twentytwenty-after-label, .twentytwenty-overlay {
            -webkit-transition-duration: 0.5s;
            -moz-transition-duration: 0.5s;
            transition-duration: 0.5s;
        }

        .twentytwenty-before-label, .twentytwenty-after-label {
            -webkit-transition-property: opacity;
            -moz-transition-property: opacity;
            transition-property: opacity;
        }

        .twentytwenty-before-label:before, .twentytwenty-after-label:before {
            color: white;
            font-size: 13px;
            letter-spacing: 0.1em;
        }

        .twentytwenty-before-label:before, .twentytwenty-after-label:before {
            position: absolute;
            background: rgba(255, 255, 255, 0.2);
            line-height: 38px;
            padding: 0 20px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
        }

        .twentytwenty-horizontal .twentytwenty-before-label:before, .twentytwenty-horizontal .twentytwenty-after-label:before {
            top: 50%;
            margin-top: -19px;
        }

        .twentytwenty-vertical .twentytwenty-before-label:before, .twentytwenty-vertical .twentytwenty-after-label:before {
            left: 50%;
            margin-left: -45px;
            text-align: center;
            width: 90px;
        }

        .twentytwenty-left-arrow, .twentytwenty-right-arrow, .twentytwenty-up-arrow, .twentytwenty-down-arrow {
            width: 0;
            height: 0;
            border: 6px inset transparent;
            position: absolute;
        }

        .twentytwenty-left-arrow, .twentytwenty-right-arrow {
            top: 50%;
            margin-top: -6px;
        }

        .twentytwenty-up-arrow, .twentytwenty-down-arrow {
            left: 50%;
            margin-left: -6px;
        }

        .twentytwenty-container {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            z-index: 0;
            overflow: hidden;
            position: relative;
            -webkit-user-select: none;
            -moz-user-select: none;
        }

        .twentytwenty-container img {
            max-width: 100%;
            position: absolute;
            top: 0;
            display: block;
        }

        .twentytwenty-container.active .twentytwenty-overlay, .twentytwenty-container.active :hover.twentytwenty-overlay {
            background: rgba(0, 0, 0, 0);
        }

        .twentytwenty-container.active .twentytwenty-overlay .twentytwenty-before-label,
        .twentytwenty-container.active .twentytwenty-overlay .twentytwenty-after-label, .twentytwenty-container.active :hover.twentytwenty-overlay .twentytwenty-before-label,
        .twentytwenty-container.active :hover.twentytwenty-overlay .twentytwenty-after-label {
            opacity: 0;
        }

        .twentytwenty-container * {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        .twentytwenty-before-label {
            opacity: 0;
        }

        .twentytwenty-before-label:before {
            content: "";
        }

        .twentytwenty-after-label {
            opacity: 0;
        }

        .twentytwenty-after-label:before {
            content: "";
        }

        .twentytwenty-horizontal .twentytwenty-before-label:before {
            left: 10px;
        }

        .twentytwenty-horizontal .twentytwenty-after-label:before {
            right: 10px;
        }

        .twentytwenty-vertical .twentytwenty-before-label:before {
            top: 10px;
        }

        .twentytwenty-vertical .twentytwenty-after-label:before {
            bottom: 10px;
        }

        .twentytwenty-overlay {
            -webkit-transition-property: background;
            -moz-transition-property: background;
            transition-property: background;
            background: rgba(0, 0, 0, 0);
            z-index: 25;
        }

        .twentytwenty-overlay:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        .twentytwenty-overlay:hover .twentytwenty-after-label {
            opacity: 1;
        }

        .twentytwenty-overlay:hover .twentytwenty-before-label {
            opacity: 1;
        }

        .twentytwenty-before {
            z-index: 20;
        }

        .twentytwenty-after {
            z-index: 10;
        }

        .twentytwenty-handle {
            height: 38px;
            width: 38px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -22px;
            margin-top: -22px;
            border: 3px solid white;
            -webkit-border-radius: 1000px;
            -moz-border-radius: 1000px;
            border-radius: 1000px;
            -webkit-box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: 0px 0px 12px rgba(51, 51, 51, 0.5);
            z-index: 40;
            cursor: pointer;
        }

        .twentytwenty-horizontal .twentytwenty-handle:before {
            bottom: 50%;
            margin-bottom: 22px;
            -webkit-box-shadow: 0 3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: 0 3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: 0 3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
        }

        .twentytwenty-horizontal .twentytwenty-handle:after {
            top: 50%;
            margin-top: 22px;
            -webkit-box-shadow: 0 -3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: 0 -3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: 0 -3px 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
        }

        .twentytwenty-vertical .twentytwenty-handle:before {
            left: 50%;
            margin-left: 22px;
            -webkit-box-shadow: 3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: 3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: 3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
        }

        .twentytwenty-vertical .twentytwenty-handle:after {
            right: 50%;
            margin-right: 22px;
            -webkit-box-shadow: -3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            -moz-box-shadow: -3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
            box-shadow: -3px 0 0 white, 0px 0px 12px rgba(51, 51, 51, 0.5);
        }

        .twentytwenty-left-arrow {
            border-right: 6px solid white;
            left: 50%;
            margin-left: -17px;
        }

        .twentytwenty-right-arrow {
            border-left: 6px solid white;
            right: 50%;
            margin-right: -17px;
        }

        .twentytwenty-up-arrow {
            border-bottom: 6px solid white;
            top: 50%;
            margin-top: -17px;
        }

        .twentytwenty-down-arrow {
            border-top: 6px solid white;
            bottom: 50%;
            margin-bottom: -17px;
        }

        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        @font-face {
            font-family: DosisMedium;
            src: url('../fonts/Dosis-Medium.ttf');
        }

        @font-face {
            font-family: DosisLight;
            src: url('../fonts/Dosis-Light.ttf');
        }

        @font-face {
            font-family: DosisSemiBold;
            src: url('../fonts/Dosis-SemiBold.ttf');
        }

        @font-face {
            font-family: DosisRegular;
            src: url('../fonts/Dosis-Regular.ttf');
        }

        body {
            font-family: arial;
            font-size: 12px;
            color: #292929;
            background-color: white;
        }

        strong {
            font-weight: bold;
        }

        div#main table p {
            line-height: 18px;
            padding-bottom: 2px;
        }

        div#main ul {
            list-style: circle;
            margin-bottom: 30px;
        }

        div#main ul li {
            margin-left: 30px;
            margin-bottom: 8px;
            line-height: 16px;
        }

        table.tableau_tarifs td {
            border-color: #80cfe1;
            border-width: 1px;
            border-style: solid;
            padding: 2px;
            padding-left: 4px;
        }

        a {
            color: #000000;
            text-decoration: underline;
        }

        a:hover {
            text-decoration: underline;
        }

        a.button, input.button {
            border: 0;
            background-color: #019fc4;
            padding: 12px 20px;
            color: #ffffff;
            font-size: 15px;
            font-family: DosisSemiBold, arial;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 10px;
        }

        a.button.visit {
            float: right;
        }

        a.button.know_more {
            float: left;
        }

        a.home_logo {
            padding: 15px;
        }

        h4.home_logo {
            font-weight: bold;
        }

        div#header a, div#menu a {
            text-decoration: none;
        }

        br.clear {
            clear: both;
            line-height: 0;
            height: 0;
        }

        img.thumbnail {
            margin-right: 30px;
            margin-bottom: 10px;
            border: 1px solid #bdbdbd;
        }

        div#header {
            background-image: url('../medias/interface/header_background.jpg');
            background-repeat: repeat-x;
            padding-bottom: 11px;
        }

        div#header div.quick_links {
            text-align: right;
            margin-bottom: 14px;
            padding-top: 15px;
        }

        div#header div.quick_links a {
            text-transform: uppercase;
        }

        div#header div.logo {
            position: relative;
            float: left;
            width: 228px;
            height: 394px;
        }

        div#header div.logo div.scroller_thumbnail {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        div#header div.logo div.scroller_thumbnail a {
            display: block;
            width: 50px;
            height: 50px;
            float: left;
            padding-top: 3px;
            padding-left: 3px;
        }

        div#header div.scroller {
            float: left;
            height: 394px;

            position: relative;
        }

        div#header div.scroller div.credit {
            position: absolute;
            bottom: 10px;
            right: 10px;

            color: #ffffff;

            background-color: #000000;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }

        div#menu {
            background-color: #019fc4;
            font-family: DosisMedium, Arial;
            font-size: 17px;
            padding: 17px 0;
            color: #ffffff;
        }

        div#menu ul {
            text-align: center;
        }

        div#menu ul li {
            float: left;
            width: 14%;
        }

        div#menu ul li a {
            color: #ffffff;
        }

        div#content {
            margin-top: 44px;
        }

        div#main {
            float: left;
            width: 70%;
        }

        div#main h1 {
            font-family: DosisLight, Arial;
            font-size: 35px;
            color: #6fb440;
            text-transform: uppercase;

            padding-bottom: 10px;
            background-image: url('../medias/interface/h1_background.png');
            background-repeat: no-repeat;

            background-position: bottom;

            margin-bottom: 45px;
        }

        div#main h2 {
            font-family: DosisRegular, Arial;
            font-size: 26px;
            color: #019fc4;
            padding-bottom: 31px;
        }

        div#main h3 {
            font-family: DosisRegular, Arial;
            font-size: 20px;
            color: #019fc4;
            margin-bottom: 20px;
            border-top: 1px solid #80cfe1;
            border-bottom: 1px solid #80cfe1;
            padding: 7px 0;
        }

        div#main h3.news {
            border: 0;
            font-family: DosisLight, Arial;
            font-size: 30px;
            color: #019fc4;
            text-transform: uppercase;

            padding-bottom: 10px;
            background-image: url('../medias/interface/h2_background.png');
            background-repeat: no-repeat;

            background-position: bottom;
        }

        div#main h5 {
            font-family: DosisRegular, Arial;
            color: #6fb440;
            font-size: 23px;
            padding-bottom: 34px;
        }

        div#main p {
            line-height: 18px;
            padding-bottom: 16px;
        }

        div#panel {
            float: right;
            width: 260px;
        }

        div#panel div.facebook {
            margin-bottom: 30px;
        }

        div#social_media_fr, div#social_media_en {
            width: 262px;
            height: 71px;
            padding-bottom: 22px;
            background-repeat: no-repeat;
        }

        div#social_media_fr {
            background-image: url('../medias/interface/social_media_back_fr.png');
        }

        div#social_media_en {
            background-image: url('../medias/interface/social_media_back_en.png');
        }

        div.social_media_button {
            float: right;
            padding-top: 3px;
            padding-right: 5px;
        }

        div#panel div.box div.title {
            background-color: #019fc4;
            font-family: DosisLight, Arial;
            font-size: 20px;
            text-transform: uppercase;
            text-align: center;
            padding: 14px 0;
            color: #ffffff;
        }

        div#panel div.box {
            position: relative;
            margin-bottom: 24px;
        }

        div#panel div.box div.more_infos {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
        }

        div#footer {
            clear: both;
            border-top: 1px solid #6fb440;
            padding-top: 24px;
            padding-bottom: 16px;
            margin-top: 44px;
        }

        div#footer p {
            text-align: center;
            color: #019fc4;
            text-transform: uppercase;
        }

        div#footer p.links {
            padding-bottom: 12px;
        }

        div#footer p.links a {
            color: #019fc4;
        }

        div#footer p.multimage {
            padding-top: 15px;
            font-size: 9px;
        }

        div#footer p.multimage a {
            color: #019FC4;
            font-size: 9px;
        }

        div.wrapper {
            width: 960px;
            margin: 0 auto;
        }

        div.archive {
            padding-bottom: 20px;
        }

        div.archive img.thumbnail {
            margin-right: 50px;
        }

        div.news {
            clear: both;
            padding-bottom: 20px;
        }

        div.news div.links a, div.resume_information div.links a {
            font-family: DosisRegular, Arial;
            font-size: 13px;
            color: #6fb440;
            text-transform: uppercase;
            text-decoration: underline;
        }

        div.news div.links a:hover, div.resume_information div.links a:hover {
            text-decoration: none;
        }

        div.resume_information {
            padding-bottom: 30px;
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 30px;
        }

        div.expo_images {
            padding: 0px;
            padding-bottom: 20px;
        }

        div.expo_images p {
            font-size: 10px;
        }

        div.expo_images table tr td.expo_images {
            padding: 2px;
            margin: 2px;
            vertical-align: top;
        }

        div.form_element {
            padding-bottom: 30px;
        }

        input.search {
            width: 500px;
            border: 1px solid #6FB440;
            padding: 5px;
        }

        p.error {
            color: red;
            font-weight: bold;
        }

        div#search_suggest {
            display: none;
            border: 1px solid #6FB440;
            margin-top: -1px;
            padding-top: 10px;
            height: 200px;
            overflow: auto;
        }

        div#main div#search_suggest ul {
            margin-bottom: 10px;
            paddong-bottom: 0;
        }

        div.store_locator_marker {
            padding: 10px;
            margin-right: 5px;
            margin-bottom: 10px;
            line-height: 14px;
        }

        div.store_locator_marker div.name p.name {
            font-weight: bold;
            padding-bottom: 3px;
            white-space: nowrap;
        }

        body#p64 div.logo, body#p64 div.scroller, body#p64 div#panel {
            display: none;
        }

        body#p64 div#main {
            width: 100%;
        }

        body#p64 div#main h1 {
            width: 70%;
        }

        body#p64 div#main p {
            text-align: justify;
        }

        .autocomplete-suggestions {
            border: 1px solid #999;
            background: #FFF;
            overflow: auto;
        }

        .autocomplete-suggestion {
            padding: 2px 5px;
            white-space: nowrap;
            overflow: hidden;
        }

        .autocomplete-selected {
            background: #F0F0F0;
        }

        .autocomplete-suggestions strong {
            font-weight: normal;
            color: #3399FF;
        }

        .autocomplete-group {
            padding: 2px 5px;
        }

        .autocomplete-group strong {
            display: block;
            border-bottom: 1px solid #000;
        }

        sup {
            vertical-align: super;
            font-size: smaller;
        }

        i {
            font-style: italic;
        }

        #lightbox {
            background-color: #eee;
            padding: 10px;
            border-bottom: 2px solid #666;
            border-right: 2px solid #666;
            z-index: 999998;
        }

        #lightboxDetails {
            font-size: 0.8em;
            padding-top: 0.4em;
            z-index: 999999;
        }

        #lightboxCaption {
            text-align: center;
        }

        #keyboardMsg {
            display: none;
        }

        #closeButton {
            top: 5px;
            right: 5px;
        }

        #lightbox img {
            border: none;
            clear: both;
        }

        #overlay img {
            border: none;
        }

        #overlay {
            background-image: url(../medias/lightbox/overlay.png);
            z-index: 999998;
        }

        * html #overlay {
            background-color: #333;
            back\ground-color: transparent;
            background-image: url(../medias/lightbox/blank.gif);
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="../medias/lightbox/overlay.png", sizingMethod="scale");
        }

    </style>
</head>
<body id="p1" onload="">
<div id="header">
    <div>
        <a class="monimage1" href="#"><img src="http://puu.sh/naFAM/263373dbb7.jpg"></a>
    </div>
</div>

<div id="menu">
    <div style="max-width: 80%; margin-left: 17%; text-align: center;">
        <ul>
            <li><a href="http://www.histoiresherbrooke.org/expositions">Expositions</a></li>
            <li><a href="http://www.histoiresherbrooke.org/service_darchives">Service d'archives</a></li>
            <li><a href="http://www.histoiresherbrooke.org/groupes_scolaires">Groupes scolaires</a></li>
            <li><a href="http://www.histoiresherbrooke.org/circuits_et_evenements">Circuits et evenements</a></li>
            <li><a href="http://www.histoiresherbrooke.org/horaire_et_tarifs">Horaire et tarifs</a></li>

            <li><a class="home_logo" href="{{ url('/login') }}">Connexion</a></li>
        </ul>
        <br class="clear">
    </div>
</div>

<div class="wrapper">
    <a class="monimage2" href="<?php echo URL::route('shs.search') ?>"><img
            src="http://puu.sh/naFf1/8f51654e89.jpg"></a>
    <style>
        .monimage2 {
            margin-left: 10%;
        }
    </style>
</div>


<div id="footer">
    <p class="links"><a href="http://www.histoiresherbrooke.org/a_propos_de_la_shs">� propos de la SHS</a> | <a
            href="http://www.histoiresherbrooke.org/devenez_membre">Devenez membre</a> | <a
            href="http://www.histoiresherbrooke.org/comment_nous_joindre">Comment nous joindre</a> | <a
            href="http://www.histoiresherbrooke.org/en/">English</a></p>
    <p class="copyright">tous droits r�serv�s � 2013 soci�t� d�histoire de sherbrooke</p>
    <p class="multimage">Site web r�alis� par <a href="http://www.multimage.qc.ca/" target="_blank">Productions
            Multimage</a></p>
</div>
</div>
</div>


</body>
</html>