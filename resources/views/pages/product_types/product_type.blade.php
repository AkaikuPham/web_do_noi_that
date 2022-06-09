@extends('pages.layouts.main')

@section('content')
<!-- ======================== Main header ======================== -->

<section class="main-header" style="background-image:url(assets/images/gallery-3.jpg)">
    <header>
        <div class="container">
            <h1 class="h2 title">Shop</h1>
            <ol class="breadcrumb breadcrumb-inverted">
                <li><a href="{{ route('home.index') }}"><span class="icon icon-home"></span></a></li>
                <li><a href="{{ route('categories.detail', $productType->category->id) }}">{{ $productType->category->name }}</a></li>
                <li><a class="active" href="{{ route('product_types.detail', $productType->id) }}">{{ $productType->name }}</a></li>
            </ol>
        </div>
    </header>
</section>

<!-- ========================  Icons slider ======================== -->

<section class="owl-icons-wrapper">

    <!-- === header === -->

    <header class="hidden">
        <h2>Product categories</h2>
    </header>

    <div class="container">

        <div class="owl-icons">

            <!-- === icon item === -->
            @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <a href="{{ route('categories.detail', $category->id) }}">
                        <figure>
                            <i class="{{ $category->icon }}"></i>
                            <figcaption>{{ $category->name }}</figcaption>
                        </figure>
                    </a>
                @endforeach
            @endif

        </div> <!--/owl-icons-->
    </div> <!--/container-->
</section>

<!-- ======================== Products ======================== -->

<section class="products">
    <div class="container">

        <header class="hidden">
            <h3 class="h3 title">Product category grid</h3>
        </header>

        <div class="row">

            <!--product items-->

            <div class="col-md-9 col-xs-12">

                <div id="products" class="row">

                    <!-- === product-item === -->

                    @if($productType->products)
                        @foreach ($productType->products as $product)
                            <div class="col-md-4 col-xs-6">
                                <article>
                                    <div class="info">
                                        @if(Auth::user())
                                            <span class="add-favorite {{ $product->favorite ? 'added' : '' }}" data-url="{{ route('product.update_favorite') }}" data-id="{{ $product->id }}">
                                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                            </span>
                                        @endif
                                        <span>
                                            <a href="#productid{{ $product->id }}" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                                        </span>
                                    </div>
                                        <div class="btn btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $product }}">
                                            <i class="icon icon-cart"></i>
                                        </div>
                                    <div class="figure-grid">
                                        <div class="image">
                                            <a href="#productid{{ $product->id }}" class="mfp-open">
                                                <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="360" height="360"/>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4"><a href="{{ route('pages.product_detail', $product->id) }}">{{ $product->name }}</a></h2>
                                            @if (isset($product->promotion) && now()->gte($product->promotion->started_at) && now()->lte($product->promotion->ended_at) && $product->promotion->status)
                                                <sub>{{ number_format($product->sale_price) }} VND</sub>
                                                @if ($product->promotion->promotion_method)
                                                    <sup>{{ number_format($product->sale_price - ($product->sale_price * $product->promotion->price) / 100) }} VND</sup>
                                                @else
                                                    <sup>{{ number_format(($product->sale_price - $product->promotion->price)) }} VND</sup>
                                                @endif
                                            @else
                                                <sup>{{ number_format($product->sale_price) }} VND</sup>
                                            @endif

                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endif

                </div><!--/row-->

            </div> <!--/product items-->

        </div><!--/row-->
        <!-- ========================  Product info popup - quick view ======================== -->
        @if($productType->products)
        @foreach ($productType->products as $product)
            <div class="popup-main mfp-hide" id="productid{{ $product->id }}">

                <!-- === product popup === -->

                <div class="product">

                    <!-- === popup-title === -->

                    <div class="popup-title">
                        <div class="h1 title">{{ $product->name }} <small>{{ $product->category->name }}</small></div>
                    </div>

                    <!-- === product gallery === -->

                    <div class="owl-product-gallery">
                        @if ($product->productImages->count())
                            @foreach ($product->productImages as $image)
                                <img src="{{ asset('images/product_images/' . $image->name) }}" alt="" width="640" />
                            @endforeach
                        @endif
                    </div>

                    <!-- === product-popup-info === -->

                    <div class="popup-content">
                        <div class="product-info-wrapper">
                            <div class="row">

                                <!-- === left-column === -->

                                <div class="col-sm-6">
                                    <div class="info-box">
                                        <strong>Thương hiệu</strong>
                                        <span>{{ $product->supplier->name }}</span>
                                    </div>
                                    {{-- <div class="info-box">
                                        <strong>Materials</strong>
                                        <span>Wood, Leather, Acrylic</span>
                                    </div> --}}
                                    <div class="info-box">
                                        <strong>Tình trạng</strong>
                                        <span>
                                            {{
                                                $product->productDetails->filter(function ($productDetail) {
                                                    return $productDetail->quantity > 0;
                                                }) ? 'Còn hàng' : 'Hết hàng'
                                            }}
                                        </span>
                                    </div>
                                </div>

                                <!-- === right-column === -->

                                <div class="col-sm-6">
                                    <div class="info-box">
                                        <strong>Màu sắc</strong>
                                        @if ($product->productDetails->count())
                                                <div class="clearfix">
                                                    @foreach ($product->productDetails as $productDetail)
                                                    <span class="checkbox checkbox-inline checkbox-color">
                                                        <input type="radio" id="product_detail_{{ $productDetail->id }}" name="product_detail" value="{{ $productDetail->id }}" checked="checked">
                                                        <label for="product_detail_{{ $productDetail->id }}">
                                                            <strong>{{ $productDetail->color }}</strong>
                                                        </label>
                                                    </span>
                                                    @endforeach
                                                </div>
                                        @endif
                                    </div>
                                </div>

                            </div> <!--/row-->
                        </div> <!--/product-info-wrapper-->
                    </div> <!--/popup-content-->
                    <!-- === product-popup-footer === -->

                    <div class="popup-table">
                        <div class="popup-cell">
                            <div class="price">
                                {{-- <span class="h3">{{ $product->sale_price }} <small>{{ $product->import_price }}</small></span> --}}

                                @if (isset($product->promotion) && now()->gte($product->promotion->started_at) && now()->lte($product->promotion->ended_at) && $product->promotion->status)
                                    @if ($product->promotion->promotion_method)
                                        <span class="h3">{{ number_format($product->sale_price - ($product->sale_price * $product->promotion->price) / 100) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                    @else
                                    <span class="h3">{{ number_format($product->sale_price - $product->promotion->price) }} VND<small>{{ number_format($product->sale_price) }} VND</small></span>
                                    @endif
                                @else
                                    <span>{{ number_format($product->sale_price) }} VND</span>
                                @endif
                            </div>
                        </div>
                        <div class="popup-cell">
                            <div class="popup-buttons">
                                <a href="{{ route('pages.product_detail', $product->id) }}"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
                                <a href="javascript:void(0);" class="btn-add" data-url="{{ route('carts.addCart') }}" data-product="{{ $product }}"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
                            </div>
                        </div>
                    </div>

                </div> <!--/product-->
            </div> <!--popup-main-->
        @endforeach
    @endif
    </div><!--/container-->
</section>
@endsection
