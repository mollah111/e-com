@extends('master')

@section('content')
 <section class="product-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="filter-items-wrapper">
                            <div class="res_filter-items-top-outer">
                                <h3 class="res_filter-items-top-title">Filters</h3>
                            </div>
                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <form class="filter-items" id="collapseOne" action="" method="GET">                                    
                                    @foreach ($categoriesGlobal as $category)
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>{{$category->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>sub categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <form class="filter-items" id="collapseTwo" action="" method="GET">
                                    @foreach ($subCategoriesGlobal as $subCategory)
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                {{$subCategory->name}}
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-page-header-wrapper">
                                    <div class="left-side-box">
                                        <h4 class="title">
                                            Shop Products
                                        </h4>
                                    </div>
                                    <div class="right-side-box">
                                        <h4 class="product-qty">
                                            Total Products
                                            <span class="number">{{$productsCount}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item-outer">
                                    <div class="product__item-image-outer">
                                        <a href="{{url('product-details/'.$product->slug)}}" class="product__item-image-inner">
                                            <img src="{{asset('backend/images/product/'.$product->image)}}" alt="Product Image" />
                                        </a>
                                        <div class="product__item-add-cart-btn-outer">
                                            <a href="{{url('add-to-cart/'.$product->id)}}" class="product__item-add-cart-btn-inner">
                                                Add to Cart
                                            </a>
                                        </div>
                                        <div class="product__type-badge-outer">
                                            <span class="product__type-badge-inner">
                                               {{ucfirst($product->product_type)}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product__item-info-outer">
                                        <a href="{{url('product-details/'.$product->slug)}}" class="product__item-name">
                                            {{$product->name}}
                                        </a>
                                        <div class="product__item-price-outer">
                                            @if ($product->discount_price != null)
                                            <div class="product__item-discount-price">
                                                <del>{{$product->regular_price}} Tk.</del>
                                            </div>
                                            <div class="product__item-regular-price">
                                                <span>{{$product->discount_price}} Tk.</span>
                                            </div>
                                            @elseif ($product->discount_price == null)
                                            <div class="product__item-regular-price">
                                                <span>{{$product->regular_price}} Tk.</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>  
@endsection