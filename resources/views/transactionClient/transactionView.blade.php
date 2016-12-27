{{--*/ $subbar = 'profil' /*--}}
@extends('layouts.sign')
@section('title')
    Ma commande
@stop
@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/transaction.css') }}
    <h1 class="form-signin-heading">Commande n°{{$id}}</h1>
    <br/>
    <div id="document">
        <br/>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="tabDocList">#</th>
                <th class="tabDocList">Prévisualisation</th>
                <th class="tabDocList">Description</th>
                <th class="tabDocList">Collection</th>
                @if( $utilisationType != NULL )
                    <th class="tabDocList">Prix</th>
                @endif
                @if( $canDownload == 1)
                    <th class="tabDocList">Télécharger</th>
                @endif
            </tr>
            </thead>
            <tbody>
            {{--*/ $total_price = 0 /*--}}
            {{--*/ $countDoc = 1 /*--}}
            @foreach($transactionDocuments as $transactionDocument)
                {{--*/ $collection = explode('_', $transactionDocument->file_name) /*--}}
                {{--*/ $rootToObject = url('images/'.$collection[0].'/'.$transactionDocument->file_name) /*--}}
                <tr>
                    <td>{{ $countDoc }}</td>
                    <td><img src="{{$rootToObject}}" alt="Thumbnail" class="img-thumbnail" height="130" width="111"/>
                    </td>
                    <td>{{ $transactionDocument->file_name }}</td>
                    <td>
                        @if($collectionName[$countDoc-1] != null )
                            {{ $collectionName[$countDoc-1]->code }} - {{ $collectionName[$countDoc-1]->name }}
                        @endif
                    </td>
                    @if( $utilisationType != "NULL")
                        <td>@if($utilisationType == "public")
                                {{--*/ echo number_format($licenceFees->public_use, 2) /*--}} $CAD
                                <?php $total_price = $total_price + ($licenceFees->public_use); ?>
                            @elseif($utilisationType == "private")
                                {{--*/ echo number_format($licenceFees->private_use, 2) /*--}} $CAD
                                <?php $total_price = $total_price + ($licenceFees->private_use); ?>
                            @endif
                        </td>
                    @endif
                    @if( $canDownload == 1)
                        <td>
                            <a href='{{ url("/downloadImage/".$collection[0]."/".$transactionDocument->file_name)}}'>
                                <span> Télécharger </span>
                                <span class='glyphicon glyphicon-download-alt'></span>
                            </a>
                        </td>
                    @endif
                </tr>
                {{--*/ $countDoc++ /*--}}
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="Details">
        <br/>
        <div class="contenu">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" align="center">
                            <a data-toggle="collapse" href="#licence">Licence</a>
                        </h4>
                    </div>
                    <div id="licence" class="panel-collapse collapse">
                        <div class="panel-body">
                            {!! $transaction->licenceName !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" align="center">
                            <a data-toggle="collapse" href="#licenceowner">Propriétaire de la licence</a>
                        </h4>
                    </div>
                    <div id="licenceowner" class="panel-collapse collapse">
                        @if($licenceOwner != "0")
                            <div class="panel-body">
                                Nom : {{ $licenceOwner->last_name }}
                                <br/>
                                Prénom : {{ $licenceOwner->first_name }}
                                <br/>
                                Entreprise : {{ $licenceOwner->enterprise }}
                                <br/>
                                Mail : {{ $licenceOwner->email }}
                                <br/>
                                Adresse : {{ $licenceOwner->address }}
                                <br/>
                                Ville : {{ $licenceOwner->town }}
                                <br/>
                                Code postal : {{ $licenceOwner->postal_code }}
                                <br/>
                                Province : {{ $licenceOwner->province }}
                                <br/>
                                Pays : {{ $licenceOwner->country }}
                                <br/>
                                Téléphone : {{ $licenceOwner->phone }}
                            </div>
                        @else
                            <div class="panel-body">
                                Nom : {{ $user->last_name }}
                                <br/>
                                Prénom : {{ $user->first_name }}
                                <br/>
                                Mail : {{ $user->email }}
                                <br/>
                                Adresse : {{ $user->address }}
                                <br/>
                                Ville : {{ $user->town }}
                                <br/>
                                Code postal : {{ $user->postal_code }}
                                <br/>
                                Province : {{ $user->province }}
                                <br/>
                                Pays : {{ $user->country }}
                                <br/>
                                Téléphone : {{ $user->phone }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" align="center">
                            <a data-toggle="collapse" href="#licencetype">Type de licence</a>
                        </h4>
                    </div>
                    <div id="licencetype" class="panel-collapse collapse">
                        <div class="panel-body">
                            {{ $transaction->licenceType }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" align="center">
                            <a data-toggle="collapse" href="#formresponse">Réponses aux formulaires de licence</a>
                        </h4>
                    </div>
                    <div id="formresponse" class="panel-collapse collapse">
                        <div class="panel-body">
                            @foreach($licenceResponses as $licenceResponse)
                                {{ $licenceResponse->name_fr }} : {{ $licenceResponse->value }} <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Actions">
        <br/>
        <div class="contenu" align="center">
            <a href="{{ URL::route('transactionClient.generateLicence', \Crypt::encrypt($id))}}">Télécharger la
                licence</a>
            <br/>
            <br/>
            @if($canFacture == 1)
                <a href="{{ URL::route('transactionClient.generateFacture', \Crypt::encrypt($id))}}">Télécharger la
                    facture</a>
                <br/>
                <br/>
            @endif
            @if($utilisationType != NULL)
                <br/>
                Frais d'administration : {{--*/ echo number_format($transaction->admin,2) /*--}} $CAD
                <br/>
                {{--*/ $total_price += $transaction->admin /*--}}
                Sous total : {{--*/ echo number_format($total_price, 2) /*--}} $CAD
                <br/>
                <i>
                    TPS : {{--*/ echo number_format((($transaction->tps) / 100 ) * $total_price ,2) /*--}} $CAD
                    <br/>
                    TVQ : {{--*/ echo number_format((($transaction->tvq) / 100 ) * $total_price,2) /*--}} $CAD
                </i>
                <br/>
                <b>Total
                    : {{--*/ echo number_format($total_price + ((($transaction->tps)/100) * $total_price) + ((($transaction->tvq)/100) * $total_price) + ($transaction->admin),2) /*--}}
                    $CAD</b>
                <br/>
                <br/>
            @endif
            @if(($canPay == 1) && ($utilisationType != NULL))

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="display:inline">
                    <input name="amount" type="hidden"
                           value="{{--*/ echo number_format($total_price + ((($transaction->tps)/100) * $total_price) + ((($transaction->tvq)/100) * $total_price) + ($transaction->admin),2) /*--}}"/>
                    <input name="currency_code" type="hidden" value="CAD"/>
                    <input name="return" type="hidden" value="{{ url("/transactioncheck")}}"/>
                    <input name="cancel_return" type="hidden" value="{{ url("/transactioncancel")}}"/>
                    <input name="notify_url" type="hidden" value="{{ url("/transactioncheck")}}"/>
                    <input name="cmd" type="hidden" value="_xclick"/>
                    {{--*/   if(isset($paypalEmail->email)){/*--}}
                    <input name="business" type="hidden" value="{{ $paypalEmail->email }}"/>
                    {{--*/   } else {/*--}}
                    <input name="business" type="hidden" value=""/>
                    {{--*/   }/*--}}
                    <input name="item_name" type="hidden" value="Commande SHS numero {{$id}}"/>
                    <input name="no_note" type="hidden" value="1"/>
                    <input name="lc" type="hidden" value="FR"/>
                    <input name="bn" type="hidden" value="PP-BuyNowBF"/>
                    <input name="tax" type="hidden" value="0.00"/>
                    <input name="shipping" type="hidden" value="0.00"/>
                    <input name="custom" type="hidden" value="{{$id}}"/>
                    <input class="btn btn-lg btn-primary" type="submit" value="Payer"/>
                </form>
            @endif
        </div>
    </div>

    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/jquery.min.js') }}
@stop