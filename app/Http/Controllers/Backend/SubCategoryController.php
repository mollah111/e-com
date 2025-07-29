<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class SubCategoryController extends Controller
{
    public function subCategoryList ()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('backend.sub-category.list', compact('subCategories'));
    }

    public function subCategoryCreate ()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.sub-category.create', compact('categories'));
    }

    public function subCategoryStore (Request $request)
    {
        $subCategory = new SubCategory();

        $subCategory->cat_id = $request->cat_id;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        
        $subCategory->save();
        return redirect()->back();

    }
}
