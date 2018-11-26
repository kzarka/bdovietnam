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

    public function create(Request $request)
    {
        $method = $request->method();
        $class = new Classes();
        if($method == 'GET') {
            return view('admin.class.form', ['class' => $class]);
        }

        $data = $request->all();
        //validate
        $class->fill($data);
        $class->save();
        return redirect()->route('admin_classes');
    }

    public function edit(Request $request, $id)
    {
        $method = $request->method();
        $class = Classes::find($id);
        if(!$class) {
            return redirect()->route('admin_classes');
        }

        if($method == 'GET') {
            return view('admin.class.form', ['class' => $class]);
        }

        $data = $request->all();
        //validate
        $class->fill($data);
        $class->save();
        return redirect()->route('admin_classes');
    }

    public function delete($id)
    {
        $class = Classes::find($id);
        if(!$class) {
            return 'false';
        }
        $class->delete();
        return 'true';
    }
}
