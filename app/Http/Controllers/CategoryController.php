<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesList()
    {
        $categories = Category::all();
        return view('categories.categories-list', [
            "categories" => $categories
        ]);
    }

    public function createCategory()
    {
        return view('categories.create-category');
    }

    public function storeCategory(Request $request)
    {
        Category::create($request->all());

        return redirect()->route("categories.list");
    }
}
