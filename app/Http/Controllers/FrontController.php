<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertsement;
use App\Models\category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $categories = category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();   

        $featured_articles = ArticleNews::with(['category'])
        ->where ('is_featured', 'featured')
        ->inRandomOrder()
        ->latest()
        ->take(3)
        ->get();


        $authors = Author::all();

        $bannerads = BannerAdvertsement:: where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $entertaiment_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','entertaiment');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();


             $entertaiment_featured_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','entertaiment');
        })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

            $bisnis_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','bisnis');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

            $bisnis_featured_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','bisnis');
        })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();

     
            $kesehatan_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','Kesehatan');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

          $kesehatan_featured_articles = ArticleNews:: whereHas('category', function ($query) {
            $query-> where('name','Kesehatan');
        })
            ->where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();
     
     

        
        return view('front.index', compact('categories', 'articles', 'authors', 'featured_articles', 'bannerads','entertaiment_articles','entertaiment_featured_articles','bisnis_articles','bisnis_featured_articles','kesehatan_articles','kesehatan_featured_articles'));
    }


    public function category(Category $category){
        $categories = category:: all();

        $bannerads = BannerAdvertsement:: where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();


        return view('front.category', compact('category','categories','bannerads'));
    }
}
