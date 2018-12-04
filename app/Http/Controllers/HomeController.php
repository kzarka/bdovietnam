<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Posts::getPostsByCategory(1, 3);
        $lastest = Posts::getLastestPosts();
        $popular = Posts::getPopularPosts();
        return view('index', [
            'lastest' => $lastest,
            'popular' => $popular,
            'news'     => $news
        ]);
    }
}
