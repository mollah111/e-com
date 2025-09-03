<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index ()
    {
       $hotProducts = Product::where('product_type', 'hot')->orderBy('id','desc')->get();
       $newProducts = Product::where('product_type', 'new')->orderBy('id','desc')->get();
       $regularProducts = Product::where('product_type', 'regular')->orderBy('id','desc')->get();
       $discountProducts = Product::where('product_type', 'discount')->orderBy('id','desc')->get();
       $categories = Category::orderBy('id','desc')->get();

        return view('index', compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts', 'categories'));
    }

    public function productDetails ($slug)
    {
        $product = Product::with('color', 'size', 'galleryImage', 'review')->where('slug', $slug)->first();
        $categories = Category::orderBy('id','desc')->get();
        return view('product-details', compact('product', 'categories'));
    }

    public function typeProducts ()
    {
        return view('type-products');
    }

    public function shop ()
    {
        return view('shop');
    }

    public function returnProcess ()
    {
       return view('return-process');     
    }

    public function categoryProducts ()
    {
        return view('category-products');
    }
    
    public function subcategoryProducts ()
    {
        return view('subcategory-products');
    }

    public function viewCart ()
    {
        return view('view-cart');
    }

    public function checkOut ()
    {
        return view('checkout');
    }

    public function privacyPolicy ()
    {
        return view('privacy-policy');
    }

    public function termsConditions ()
    {
        return view('terms-conditions');
    }

    public function refundPolicy ()
    {
        return view('refund-policy');
    }

    public function paymentPolicy ()
    {
        return view('payment-policy');
    }

    public function aboutUs ()
    {
        return view('about-us');
    }

    public function contactUs ()
    {
        return view('contact-us');
    }

    //Cart Function...
    public function addToCart (Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->orderBy('id', 'desc')->first();
        $product = Product::find($id);

        if($cartProduct == null){
            $cart = new Cart();
            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = 1;

        if($product->discount_price == null){
            $cart->price = $product->regular_price;
        }
        elseif($product->discount_price != null){
            $cart->price = $product->discount_price;
        }

            $cart->save();
        }

        elseif($cartProduct != null){
            $cartProduct->qty = $cartProduct->qty + 1;
            $cartProduct->save();
        }

        return redirect()->back();
    }


}
