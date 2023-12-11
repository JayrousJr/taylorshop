@include('/site/includes/header')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>{{$product->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="/storage/{{$product->image}}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product->name}}</h3>
                    <p class="single-product-pricing"><span>Per Piece</span> ${{$product->cost}}</p>
                    <p>{!!$product->discription!!}</p>
                    <div class="single-product-form">
                        <!-- <form action="index.html">
							<input type="number" placeholder="0">
						</form> -->
                        <!-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
                        <p><strong>Categories: </strong>{{$product->category}}</p>
                    </div>
                    <div>
                        <p class="size">Availabe sizes</p>
                        @foreach($product->size as $size)
                        <span class="badge badge-secondary">{{$size}}</span>
                        @endforeach
                    </div>
                    <ul class="product-share">
                        <li><a><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </a>
                        </li>
                        <!-- <li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href=""><i class="fab fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Related</span> Products</h3>
                    <p>Other Related Products under the same Category from our stores</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProduct as $data)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href='/product_9OeUu9fHbc9Of4SM3H6rr{{$data->id}}u8QDrviQlx67fJ7tKOPpxdata&prd'><img src="/storage/{{$data->image}}" alt=""></a>
                    </div>
                    <h3>{{$data->name}}</h3>
                    <div>
                        <p class="size">Availabe sizes</p>
                        @foreach($data->size as $size)
                        <span class="badge badge-secondary">{{$size}}</span>
                        @endforeach
                    </div>
                    <p class="product-price"> ${{$data->cost}}<span>Per Piece</span> </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end more products -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
    @include('/site/includes/footer')