<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 04/04/2016
 * Time: 22:32.
 */
//active le menu administration
$subbar = 'Administration';
if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
}
?>

@extends('layouts.sign')

@section('title')
    Fiche | Visualisation
@stop

@section('content')
    <h1></h1>
    <div class="" style="display: block; text-align: center; margin: auto; max-width: 40%;">
        <form class="form-signin" id="addCardForm" method="POST" action="{{ URL::route('updateCard', \Crypt::encrypt($card->id)) }}">
            {!! csrf_field() !!}
            <h1><br/></h1>
            <div style="margin-bottom: 2%;">
                @if (isset($message))
                    <div class="bg-success bg-sm"> {{  $message }} </div>
                @endif
            </div>

            <div class="form-group" style="text-align:left;">
                <div class="selectContainer ">
                    <label class="control-label" style="float: left ">Type de fiche</label>
                    {{
                        Form::select(
                            'cardTypeSelect',
                            array(
                                1 => 'Archives',
                                2 => 'Audiovisuels',
                                3 => 'Bibliothèque',
                                4 => 'Cartes',
                                5 => 'Images',
                                6 => 'Périodiques',
                                7 => 'Sonores'
                            ),
                            $card->card_type_id,
                            array(
                                'class' => 'form-control',
                                'id' => 'cardTypeSelect',
                                'disabled' => 'disabled'
                            )
                        )
                    }}
                </div>
            </div>

            <?php
            $attributeList = DB::table('card_associations')->where('card_id', '=', $card->id)->get();
            ?>
            <div class="form-group" style="text-align:left;">
                @foreach ($attributeList as $association)
                    <?php
                    $attributeName = App\CardAttribute::find($association->card_attribute_id)->name_fr;
                    $attributeValue = $association->value;
                    ?>
                    <label for="{{ $association->id  }}" class="control-label">{{ $attributeName  }}</label>
                    <input type="text" name='{{ $association->id  }}' id='{{ $association->id  }}' class="form-control"
                           placeholder="{{ $attributeName  }}" value="{{ $attributeValue  }}" disabled='disabled'><br>
                @endforeach
            </div>
            <h1><br/></h1>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ url('search') }}">
                    <small>Retour</small>
                </a>
            </h3>
        </div>
    </div>

@stop
