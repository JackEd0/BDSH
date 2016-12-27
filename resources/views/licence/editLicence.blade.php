<?php
/**
 * Created by PhpStorm.
 * User: tarik
 * Date: 2016-09-26
 * Time: 23:31.
 */

//active le menu administration
$subbar = 'Administration';
?>

@extends('layouts.sign')

@section('title')
    Licence | Éditer
@stop

@section('content')

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <br />
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Édition du formulaire de licence</h1>

        <form  id="register" method="post" action="{{ URL::route('licence.Add') }}">
            {!! csrf_field() !!}
            <br />
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>
            <div class="form-group" style="text-align:left; height: 100%">
                <div>
                    <textarea name="terms" id="input"><?php echo $licence->terms ?></textarea>
                </div>

                <script src="{{URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
                <script>
                    var editor_config = {
                        selector:"textarea",
                        menubar: "edit format",
                        plugins : "autoresize link",
                        mode : "exact",
                        resize: false,
                        autoresize_bottom_margin: 10,
                        statusbar: false,
                    };
                    tinymce.init(editor_config);
                </script>

            </div>
            <div class="form-group">
                <button value="Enregistrer" type="submit" class="btn btn-lg btn-primary btn-block">Enregistrer</button>
            </div>
        </form>

@stop
