<?php
/**
 * Created by PhpStorm.
 * User: berb2701
 * Date: 3/30/2016
 * Time: 11:48 AM
 */
?>
<div style="font-family: Arial;font-size: 100%;">
    <div style="text-align: center;">
        <img src="http://i.imgur.com/AZyIMFc.png" alt="Logo de la société d'histoire de Sherbrooke"/>
    </div>
    <table width="100%">
        <td style="background-color: #019fc4; width:100%; height:45px; text-align:center; vertical-align:middle;">
            <span style="font-family:Arial; color:white; font-size: 135%; font-weight: 400; padding:0; margin:0;">@yield('title')</span>
        </td>
    </table>
    <div>
        @yield('content')
        <img src="http://i.imgur.com/eDSZWs4.png" alt="Joignez nous sur les réseaux sociaux!"/>
    </div>
</div>