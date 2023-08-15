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

    public function editCategory($categoryId) {
        $category = Category::find($categoryId);
        return view('categories.edit-category', [
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->update($request->all());
        return redirect()->route("categories.list");
    }

    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return back();
    }
}
