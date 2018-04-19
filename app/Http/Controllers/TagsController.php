<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(\App\Tag $tag)
    {
       $posts = $tag->posts;
       return view('posts.index', compact('posts'));
    }
}
