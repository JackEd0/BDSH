<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 17/02/2016
 * Time: 09:52
 */ ?>
@extends('layouts.master')

@section('title') Posts | Show @stop

@section('content')

    <h1>{{ $post->name }}</h1>

    <p>{{ $post->content }}</p>


    <p>Posté par  {{ $author->username }} |
        @if ($post->nbNote == 0)
            Pas de Commentaires
        @elseif($post->nbNote == 1)
            1 Commentaire
        @else
            {{ $post->nbNote }} Commentaires
        @endif
    </p>

    <h3>Les commentaires</h3>
    @if($post->nbNote == 0)
        Pas encore de commentaires
    @else
        @foreach($notes as $note)
            <br/><strong>Commentaire posté par {{ $note->user->username }}</strong><br/>
            {{ $note->content }}
        @endforeach

    @endif
@stop
<?php /*
{{ $author->username }}
{{ $note->user->username }} */ ?>