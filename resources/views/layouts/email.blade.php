<?php
/**
 * Created by PhpStorm.
 * User: berb2701
 * Date: 3/30/2016
 * Time: 11:48 AM.
 */
?>
<div style="font-family: Arial;font-size: 100%;">
    <div style="text-align: center;">
        <img src="{{ $message->embed('./img/shs_logo.png') }}"
             alt="Logo de la société d'histoire de Sherbrooke">
    </div>
    <table width="100%">
        <td style="background-color: #019fc4; width:100%; height:45px; text-align:center; vertical-align:middle;">
            <span style="font-family:Arial; color:white; font-size: 135%; font-weight: 400; padding:0; margin:0;">@yield('title')</span>
        </td>
    </table>
    <div>
        @yield('content')
    </div>
    <div>
        <p style="color:black;">
            <b>Société d'histoire de Sherbrooke</b> <br/>
            275, rue Dufferin<br/>
            Sherbrooke, (Québec)<br/>
            J1H 4M5<br/>
            Courriel : info@histoiresherbrooke.org<br/>
            Téléphone : 819-821-5406<br/>
            Télécopieur : 819-821-5417<br/>
        </p>
    </div>
    <div style="display: inline-block">
        <div style="font-size: 20px; color: #6FB440;">
            Suivez-nous sur les réseaux sociaux!
        </div>
        <div style="display: inline-block">
            <a href="https://www.facebook.com/La-Société-dhistoire-de-Sherbrooke-22243800789/" title="Facebook">
                <img border="0" alt="Facebook" src="{{ $message->embed('./img/facebook.png') }}" width="35"
                     height="35">
            </a>
        </div>
        <div style="display: inline-block">
            <a href="https://plus.google.com/107090631336701740346?gl=ca&hl=fr" title="Google+">
                <img border="0" alt="Google+" src="{{ $message->embed('./img/google_plus.png') }}" width="35"
                     height="35">
            </a>
        </div>
        <div style="display: inline-block">
            <a href="https://twitter.com/HstSherbrooke" title="Twitter">
                <img border="0" alt="Twitter" src="{{ $message->embed('./img/twitter.png') }}" width="35"
                     height="35">
            </a>
        </div>
    </div>
</div>