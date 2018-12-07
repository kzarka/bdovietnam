<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\ImagesSetting;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $middle_ads = ImagesSetting::find(4);
        $news = Posts::getPostsByCategory(1, 3);
        $lastest = Posts::getLastestPosts();
        $popular = Posts::getPopularPosts();
        
        return view('index', [
            'middle_ads' => $middle_ads,
            'lastest' => $lastest,
            'popular' => $popular,
            'news'     => $news
        ]);
    }
}
