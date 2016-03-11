<?php
/**
 * Created by PhpStorm.
 * User: Jacques
 * Date: 15/02/2016
 * Time: 15:48
 */
$subbar = 1;
?>
@extends('layouts.master')

@section('title')Posts | Liste @stop

@section('content')
    <h1>La liste des posts</h1>
    <div class="row">
    @foreach($posts as $post)
        <div class="col-md-3">
            <a href="{{ URL::route('posts.show', $post->slug) }}">
                <h2>{{ $post->name }}</h2>
            </a>
            <p>Contenu</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    @endforeach
    </div>
    {{ $posts->links() }}
@stop
