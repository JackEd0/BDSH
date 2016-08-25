

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

    <div class="col-sm-4">
        <h1></h1>
        <div class="row">
            <div class="col-sm-6 form-group">
                <div class="checkbox form-inline">
                    <label>
                        <input type="checkbox" name="show_all" value="1" id="inputShowAll"
                               onclick="showCategory(0);"
                        > Afficher Tous
                    </label>
                </div>
                <div class="checkbox form-inline">
                    <label>
                        <input type="checkbox" name="show_archives" value="1" id="inputShowArchives"
                               onclick="showCategory(1);"
                        > Afficher Archives
                    </label>
                </div>
                <div class="checkbox form-inline">
                    <label>
                        <input type="checkbox" name="show_audiovisuels" value="1" id="inputShowAudiovisuels"
                               onclick="showCategory(2);"
                        > Afficher Audiovisuels
                    </label>
                </div>
            </div>
            <div class="col-sm-6 form-group"></div>
        </div>
    </div>

    <div class="col-sm-8">
        <table class="table table-striped table-bordered table-hover" id="cardSearchTable">
            <thead>
            <tr>
                <th>Type</th>
                <th>Resumé</th>
                <th>Création</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cardList as $card)
                <?php
                $typeId = $card->card_type_id;
                $cardType = App\CardType::find($typeId)->name_fr;
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
                    <td class="col-sm-1">
                        <?php echo substr($card->created_at, 0, 10);
                        ?>
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
    </div>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/dataTablesConf.js') }}
@stop
