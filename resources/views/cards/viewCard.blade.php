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
    <div class="container" style="display: block; text-align: center; margin: auto; max-width: 80%;">
    <div class="col-md-6">
        <form class="form-signin" id="addCardForm" method="POST" action="">
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
                    $attribute = App\CardAttribute::find($association->card_attribute_id);
                    $attributeValue = $association->value;
                    ?>
                    @if(!($attributeValue == null && $attribute->hideIfEmpty == 1))
                        @if($currentUserType == 1)
                            <label for="{{ $association->id  }}" class="control-label">{{ $attribute->name_fr  }}</label>
                            <input type="text" name='{{ $association->id  }}' id='{{ $association->id  }}' class="form-control"
                                   placeholder="{{ $attribute->name_fr  }}" value="{{ $attributeValue  }}" disabled='disabled'><br>
                        @elseif($currentUserType != 1 && $attribute->userPermitLevel != 1  )
                            <label for="{{ $association->id  }}" class="control-label">{{ $attribute->name_fr  }}</label>
                            <input type="text" name='{{ $association->id  }}' id='{{ $association->id  }}' class="form-control"
                                   placeholder="{{ $attribute->name_fr  }}" value="{{ $attributeValue  }}" disabled='disabled'><br>
                        @endif
                    @endif
                @endforeach
            </div>
        </form>
        <div class="btn btn-lg btn-link btn-block">
            <h3><a href="{{ url('search') }}">
                    <small>Retour</small>
                </a>
            </h3>
        </div>
    </div>
    <div class="col-md-6">
        <h1><br/></h1>
        <div id="imageUploaded"></div>

        {{ Html::script('js/viewCard.js') }}

        <?php
        $filesPath = App\Document::where('card_id', '=', $card->id)->get();
        $i = 0;
        ?>
        @foreach($filesPath as $filePath)
            <input type="hidden" name="{{ $filePath->id }}" id="filePath{{ ++$i }}" value="{{ $filePath->file_name }}"/>
            <script>showImage('filePath{{ $i }}');</script>
        @endforeach
    </div>
    </div>

@stop
