<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $categories = category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->lastest()
        ->take(3)
        ->get();

        $authors = Author::all();

        
        return view('front.index', compact('categories', 'articles', 'authors'));
    }
}
