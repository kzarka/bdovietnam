<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('active', 1)->get();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Categories::find($id);
        //validate
        $category->fill($data);
        $category->save();
        return 'true';
    }

    public function create(Request $request)
    {
        $category = new Categories();
        $data = $request->all();
        //validate
        $category->fill($data);
        $category->save();
        return 'true';
    }

    public function load(Request $request)
    {
        $categories = Categories::select('*')->get();
        foreach ($categories as $category) {
            $category->parent_name = Categories::getName($category->id);
        }
        $result['data'] = $categories;
        return json_encode($result);
    }

    public function delete($id)
    {
        $class = Categories::find($id);
        if(!$class) {
            return 'false';
        }
        $class->delete();
        return 'true';
    }
}
