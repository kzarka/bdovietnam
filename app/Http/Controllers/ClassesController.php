<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$classes = Classes::where('enable', 1)->get();
    	foreach ($classes as $class) {
    		$index = preg_replace('/\s/', '', $class->name);
    		$class->index = strtolower($index);
    	}
        return view('class.index', ['classes' => $classes]);
    }
}
