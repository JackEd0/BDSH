{{--*/ $subbar = 'Administration' /*--}}
@extends('layouts.sign')
@section('title')
    Commande Client
@stop
@section('content')
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    {{ Html::style('css/bootstrap-datepicker.standalone.min.css') }}
    {{ Html::style('css/transaction.css') }}
    <h1>Commande numéro {{$id}}</h1>
    <br/>
    <form method="POST" name="transactionApprobation">
        <div id="document">
            <span class="title">&nbsp;Document(s)&nbsp;</span>
            <br/>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="tabl">#</th>
                    <th class="tabl">Image</th>
                    <th class="tabl">Titre</th>
                    <th class="tabl">Collection</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0; /*--}}
                @foreach ($transactionDocuments as $document)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>
                            <img src='{{url("/images/".$collectionCodes[$i]."/".$document->file_name)}}'
                                 style='height:75px; display: block; margin: 0 auto;'
                                 data-title='{{$document->file_name}}'>
                        </td>
                        <td>{{$document->file_name}}</td>
                        <td>{{$collections[$i]}}</td>
                    </tr>
                    {{--*/  ++$i; /*--}}
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="response">
            <span class="title">&nbsp;Propriétaire/utilisateur&nbsp;</span>
            <dl class="dl-answerLicense">
                {{--*/ $i = 0; /*--}}
                @foreach ($ownerUserInfos as $ownerUserInfo)
                    <dt>{{$ownerUserInfoTitle[$i]}}</dt>
                    <dd>{{$ownerUserInfo}} </dd>
                    {{--*/  ++$i; /*--}}
                @endforeach
            </dl>
        </div>
        <div id="response">
            <span class="title">&nbsp;Réponse au formulaire&nbsp;</span>
            <dl class="dl-answerLicense">
                @foreach ($licenceResponses as $response)
                    <dt>{{$response->name_fr}}</dt>
                    <dd>{{$response->value}} </dd>
                @endforeach
            </dl>
        </div>
        <div id="content">
            <span class="title">&nbsp;Type de facturation&nbsp;</span>
            <div class="content2 form-group bill">
                <p class="col-sm-3">Type de frais &nbsp;&nbsp;</p>
                <div class="col-sm-6 divSelect">
                    <select class="form-control " name="billType" style="font-weight: normal; width: 200px"
                            id="choseBillType"
                            onchange="activateSubmitButtonFunction()">
                        <option value="empty" disabled selected value>Choisir</option>
                        <option value="private">Frais d'utilisation privé</option>
                        <option value="public">Frais d'utilisation public</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="content">
            <span class="title">&nbsp;Commentaire du client&nbsp;</span>
            <div class="comment">
                {{--*/ echo $transactionClientComment /*--}}
            </div>
        </div>


        <div id="content">
            <span class="title">&nbsp;Commentaire de l'administration&nbsp;</span>
            <div class="comment">
                <textarea placeholder="Ajouter un commentaire" name="commentAdmin" class="commentAdmin"
                          rows="4">{{$transactionAdminComment}}</textarea>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="content">
            <span class="title">&nbsp;Validation&nbsp;</span>
            <div class="submit ">
                <button class="btn btn-lg  btn-success col-md-2 Button" id="acceptBtn"
                        formaction="{{ URL::route('transactionAdmin.accept', \Crypt::encrypt($id)) }}" disabled>Accepter
                </button>
                <button class="btn btn-lg btn-danger col-md-2 Button" id="refuseBtn"
                        formaction="{{ URL::route('transactionAdmin.refuse', \Crypt::encrypt($id)) }}">Refuser
                </button>
                <button class="btn btn-lg btn-primary col-md-2 Button" id="payBtn"
                        formaction="{{ URL::route('transactionAdmin.pay', \Crypt::encrypt($id)) }}" disabled>Payer
                </button>
            </div>
        </div>
    </form>
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/bootstrap-datepicker.min.js') }}
    {{ Html::script('js/transactionButton.js') }}
@stop