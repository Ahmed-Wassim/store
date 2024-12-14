@extends('site.layouts.app')

@section('title')
    WessoStore - Stores
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Store</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>{{ Auth::user()->store->name ?? 'Anonymous Store' }}</li>
                        @auth
                            @if (Auth::user()->store?->id === $store->id)
                                <li><a href="{{ route('stores.edit', $store->slug) }}">Edit</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start About Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{ $store->image->path ?? asset('defaults/store.jpg') }}" alt="#">
                        <a href="{{ $store->video }}" class="glightbox video"><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <h2>{{ $store->name }}</h2>
                        <p>{{ $store->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    <!-- Start Team Area -->
    <section class="team section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Products</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($store->products as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ $product->images[0]->path }}" alt="#">
                                <div class="button">
                                    @if (Auth::check() && (Auth::user()->store?->id === $store->id || Auth::user()->hasRole(['admin', 'super admin'])))
                                        {{-- <form action="{{ route('product.destroy', $product->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="button cart-button">
                                                <button type="submit" class="btn">Delete
                                                    Product</button>
                                            </div>
                                        </form> --}}
                                    @else
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="button cart-button">
                                                <button type="submit" class="btn">Add to
                                                    Cart</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $product->category->title }}</span>
                                <h4 class="title">
                                    <a href="{{ route('products.show', $product->slug ?? '#') }}">{{ $product->name }}</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>{{ CurrencyHelper::format($product->price) }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            </div>
            {{ $store->products->links() }}
        </div>
    </section>
    <!-- End Team Area -->
@endsection

@push('scripts')
    <script type="text/javascript">
        GLightbox({
            'href': '{{ $store->video }}',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
@endpush
