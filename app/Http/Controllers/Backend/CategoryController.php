<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryList ()
    {
        $categories = Category::get ();
        return view('backend.category.list', compact('categories'));
    }

    public function categoryCreate ()
    {
        return view('backend.category.create');
    }

    public function categoryStore (Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = $request->image;

        $category->save();
        return redirect('admin/category/list');
    }
}
