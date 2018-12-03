<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\PostsCategories;

class PostsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $categories = Categories::all();
        $method = $request->method();
        $post = new Posts();
        if($method == 'GET') {
            return view('admin.posts.form', ['post' => $post, 'categories' => $categories]);
        }

        $data = $request->all();
        \Log::info($data);
        //validate
        $post->fill($data);
        if ($data['author_id']) {
            $post->author_id = $data['author_id'];
        }
        $post->save();
        $data['category'] = (isset($data['category'])) ? $data['category'] : null;
        PostsCategories::updateItems($post->id, $data['category']);
        return redirect()->route('admin_posts');
    }

    public function edit(Request $request, $id)
    {
        $method = $request->method();
        $categories = Categories::all();
        $selectedArray = '[';
        $selectedCategories = PostsCategories::select('category_id')->where('post_id', $id)->get();
        foreach ($selectedCategories as $selectedCategory) {
            $selectedArray .= $selectedCategory['category_id'] . ' ,';
        }
        if(strlen ($selectedArray) > 1) {
            $selectedArray = rtrim($selectedArray, ' ,');
        }
        $selectedArray .= ']';
        //dd($selectedArray);
        $post = Posts::find($id);
        if(!$post) {
            return redirect()->route('admin_posts');
        }

        if($method == 'GET') {
            return view('admin.posts.form', ['post' => $post, 'categories' => $categories, 'selectedArray' => $selectedArray]);
        }

        $data = $request->all();
        //validate
        if ($data['author_id']) {
            $post->author_id = $data['author_id'];
        }
        \Log::info($data);
        $post->fill($data);
        $post->save();
        $data['category'] = (isset($data['category'])) ? $data['category'] : null;
        PostsCategories::updateItems($post->id, $data['category']);
        return redirect()->route('admin_posts');
    }

    public function delete($id)
    {
        $post = Posts::find($id);
        if(!$post) {
            return 'false';
        }
        $post->delete();
        return 'true';
    }
}
