<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
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

        // Add Color...

        if(isset($request->color) && $request->color[0] != null){
            foreach($request->color as $color_name){
                $color = new Color();

                $color->product_id = $product->id;
                $color->color_name = $color_name;

                $color->save();
            }
        }

         // Add Size...

         if(isset($request->size) && $request->size[0] != null){
            foreach($request->size as $size_name){
                $size = new Size();

                $size->product_id = $product->id;
                $size->size_name = $size_name; 

                $size->save();
            }

         } 

         //Gallery Image...

         if(isset($request->galleryImage)){
            foreach($request->galleryImage as $image){
                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;
                $imageName = rand().'-galleryimage-'.'.'.$image->extension();
                $image->move('backend/images/galleryImage',$imageName);

                $galleryImage->image = $imageName;
                $galleryImage->save();
            }
         }

        return redirect()->back();
    }

    public function productList()
    {
        $products = Product::orderBy('id', 'desc')->with('category', 'subCategory')->get();
        return view('backend.product.list', compact('products'));
    }
}
