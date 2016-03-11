<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    //
    public function index () {
        //$posts = Post::all(); pour tout lister
        $posts = Post::paginate(3);
        return view('posts.index',compact('posts'));
    }
    public function show ($slug) {
        $post = Post::where('slug',$slug)->firstOrFail();
        $author = $post->user;
        $notes = $post->notes;
        return view('posts.show',compact('post','author','notes'));
    }
}
