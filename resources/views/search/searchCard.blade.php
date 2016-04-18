

<?php

if (Auth::check()) {
    $currentUserType = Auth::user()->user_type_id;
}

//active le menu Recherche
$subbar = 'Recherche';

?>
@extends('layouts.sign')
@section('title')
    Recherche
@stop

@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}

    <div style="margin-bottom: 2%;">
        @if (isset($message))
            <h4><br/></h4>
            <div class="bg-success bg-sm" style="text-align: center;"> {{  $message }} </div>
        @endif
    </div>
    <h1>Recherche</h1>
    <table class="table table-striped table-bordered table-hover" id="cardSearchTable">
        <thead>
        <tr>
            <th>Type</th>
            <th>Resumé</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cardList as $card)
            <?php
            $typeId = $card->card_type_id;
            $cardType = App\CardType::find($typeId)->firstOrFail()->name_fr;
            $attributeList = DB::table('card_associations')->where('card_id', '=', $card->id)->get();

            ?>
            <tr style="margin-bottom: 2%; cursor: hand;" onclick="window.document.location='{{ URL::route("cards.view", \Crypt::encrypt($card->id)) }}';">
                <td>{{ $cardType }}</td>
                <td>
                    @foreach ($attributeList as $association)
                        <?php
                        $attributeName = App\CardAttribute::find($association->card_attribute_id)->name_fr;
                        $attributeValue = $association->value;
                        ?>
                        <strong>{{ $attributeName  }}{{' : '}}</strong>{{ $attributeValue  }}<br/>
                    @endforeach
                </td>
                <td>
                    <a href="{{ URL::route('cards.view', \Crypt::encrypt($card->id)) }}">Visualiser</a>
                    @if($currentUserType == 1)
                        | <a href="{{ URL::route('cards.edit', \Crypt::encrypt($card->id)) }}">{{ "Modifier" }}</a>
                         | <a href="#">Supprimer</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/dataTablesConf.js') }}
@stop
