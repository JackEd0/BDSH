{{--*/ $subbar = 'Panier' /*--}}
@extends('layouts.sign')
@section('title')
    Mon panier
@stop

@section('content')
    {{ Html::style('css/lightbox.css') }}
    {{ Html::style('css/dataTables.bootstrap.min.css') }}
    <h1 class="form-signin-heading">Mon panier</h1>
    <div align="center">

        @if( is_null($cookie) )
            <div class='alert alert-warning' role='alert'>Votre panier est vide, vous pouvez le remplir depuis la page
                <a href="{{ url('searchHome') }}">Recherche</a></div>
        @else
            {{--*/ $cookieExploded = explode('|', $cookie) /*--}}
            {{--*/ $cpt = 0 /*--}}
            {{--*/ $documents = array() /*--}}
            <table class="table table-striped table-bordered table-hover" id="cardSearchTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Visuel</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cookieExploded as $caseCookie)
                    @if ($caseCookie != null)
                        {{--*/ $temp_collection = explode('_', $caseCookie) /*--}}
                        {{--*/ $collection = $temp_collection[0] /*--}}
                        {{--*/ $rootToObject = url('images/'.$collection.'/'.$caseCookie) /*--}}
                        {{--*/ ++$cpt /*--}}
                        {{--*/ $documents[] = $caseCookie /*--}}

                        <tr style='margin-bottom: 2%; cursor: hand;'>
                            <td>{{$cpt}}</td>
                            <td>
                                <a href='{{$rootToObject}}' data-lightbox='lightbox' data-title='{{$caseCookie}}'>
                                    <img src='{{$rootToObject}}' alt='Thumbnail' class='img-thumbnail' height='130'
                                         width='111'/>
                                </a>
                            </td>
                            <td>{{$caseCookie}}</td>
                            <td>
                                <a href="/cookie/set/delete:{{$caseCookie}}">
                                    <img src='img/icons/basketDelete.png'/>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
    </div><p align="center"><b>1. Lire et d'accepter la licence ci-dessous :</b></p>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" align="center">
                    <a data-toggle="collapse" href="#licence">Ouvrir la licence d'utilisation</a>
                </h4>
            </div>
            <div id="licence" class="panel-collapse collapse">
                <div class="panel-body">
                    {!! $licences->terms !!}
                </div>
            </div>
        </div>
    </div>
    <form class="form-signin" id="transaction" method="POST" action="{{ URL::route('basket.transaction') }}">
        <div class="form-group">
            <p align="center"><b>2. Choisir votre type d'utilisation</b></p>
            <select name="use" class="form-control">
                <option>Votre choix</option>
                @foreach ($licenceTypes as $licenceType)
                    <option value="{{ $licenceType['id'] }}">{{ $licenceType['name_fr'] }}</option>
                @endforeach
            </select>
            <br/>
            <br/>
            @foreach ($licenceTypes as $licenceType)
                <div id="choice_{{ $licenceType['id'] }}" class="choices" style="display:none">
                    @foreach ($licenceAttributeTypes as $licenceAttributetype)
                        @if ($licenceAttributetype['licence_type_id'] == $licenceType['id'])
                            @foreach ($licenceAttributes as $licenceAttribute)
                                @if ($licenceAttribute['id'] == $licenceAttributetype['licence_attribute_id'])
                                    <div>
                                        <label for='example-url-input'
                                               class='control-label'>{{ $licenceAttribute['name_fr'] }}</label>
                                        <input class='form-control' type='text' name="{{ $licenceAttribute['id'] }}"
                                               placeholder="{{ $licenceAttribute['name_fr'] }}" id='example-text-input'>
                                        <br/>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="form-group" align="center">
            <br/>
            <input value="another" type="checkbox" id="another"> Je fais la demande pour une autre personne/entité
            <br/>
        </div>

        <div id="fields" align="center" class="hidden">

            <label>Je place ma commande pour </label>
            <select id="owner">
                <option value="nothing">----</option>
                <option value="pro" id="pro">une entreprise</option>
                <option value="perso" id="perso">une personne</option>
            </select>
            <br/>
            <div id="enterprise" class="hidden">
                <label for='company' class='control-label'>Entreprise</label>
                <input class='form-control' type='text' name='enterprise' placeholder='Entreprise' id='company'>
                <br/>
            </div>
            <div id="firstname" class="hidden">
                <label for='fName' class='control-label'>Votre nom</label>
                <input class='form-control' type='text' name='firstname' placeholder='Votre nom' id='fName'>
                <br/>
            </div>
            <div id="lastname" class="hidden">
                <label for='lName' class='control-label'>Votre prénom</label>
                <input class='form-control' type='text' name='lastname' placeholder='Votre prénom' id='lName'>
                <br/>
            </div>
            <div id="divMail" class="hidden">
                <label for='mail' class='control-label'>Mail</label>
                <input class='form-control' type='text' name='mail' placeholder='email' id='mail'>
                <br/>
            </div>
            <div id="divAddress" class="hidden">
                <label for='address' class='control-label'>Adresse</label>
                <input class='form-control' type='text' name='address' placeholder='Adresse' id='address'>
                <br/>
            </div>
            <div id="divCity" class="hidden">
                <label for='city' class='control-label'>Ville</label>
                <input class='form-control' type='text' name='city' placeholder='Ville' id='city'>
                <br/>
            </div>
            <div id="divPostalCode" class="hidden">
                <label for='postalCode' class='control-label'>Code postal</label>
                <input class='form-control' type='text' name='postalcode' placeholder='Code postal' id='postalCode'>
                <br/>
            </div>
            <div id="divProvince" class="hidden">
                <label for='province' class='control-label'>Province</label>
                <input class='form-control' type='text' name='province' placeholder='Province' id='province'>
                <br/>
            </div>
            <div id="divCountry" class="hidden">
                <label for='country' class='control-label'>Pays</label>
                <input class='form-control' type='text' name='country' placeholder='Pays' id='country'>
                <br/>
            </div>
            <div id="divPhone" class="hidden">
                <label for='phone' class='control-label'>Téléphone</label>
                <input class='form-control' type='text' name='phone' placeholder='Téléphone' id='phone'>
                <br/>
                <br/>
            </div>

        </div>
        <label for='example-url-input' class='control-label'>Commentaire sur votre commande</label>
        <input class='form-control' type='text' name='comment_user' placeholder='Commentaire' id='example-text-input'>
        <br/>
        <div>
            <input type="checkbox" name="validation" id="validation"> En cochant, j'accepte les Conditions et modalités
            d’utilisation
        </div>
        <br/>
        <div class="form-group">
            <br/>
            <input type="hidden" name="documents" value="{{ serialize($documents) }}"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" id="soumettre" class="btn btn-info btn-lg"
                   value="Veuillez accepter la licence d'utilisation"/>
        </div>
    </form>

    @endif
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/lightbox.js') }}
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/licencePanier.js') }}

@stop