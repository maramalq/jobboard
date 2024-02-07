<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\job\job;

class CategoriesController extends Controller
{
    
    public function singleCategory($name) {
        $jobs = Job::where('category', $name)
            ->take(5)
            ->orderBy('created_at','desc')
            ->get();

        $category = Category::where('name', $name)->first(); // Corrected usage of where()

        return view("categories.single", compact("jobs" ,"category"));

    }
}
