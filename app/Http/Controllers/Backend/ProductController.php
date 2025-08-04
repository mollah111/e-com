<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function productCreate ()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('backend.product.create', compact('categories', 'subCategories'));
    }

    public function productStore (Request $request)
    {
        $product = new Product();

          if(isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension();
            $request->image->move('backend/images/product',$imageName);

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->sku_code = $request->sku_code;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->policy = $request->policy;
        $product->product_type = $request->product_type;

        $product->save();
        return redirect()->back();
    }
}
