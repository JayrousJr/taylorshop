@include('/site/includes/header')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Discover the epitome of personalized style</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach($category as $data)
                        <li data-filter=".{{$data->slug}}">{{$data->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            @foreach($products as $data)
            <div class="col-lg-4 col-md-6 text-center {{$data->cat_slug}}">
                <div class="single-product-item">
                    <div class="product-image">
                        <!-- data&prd -->
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
                    <!-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
                </div>
            </div>
            @endforeach

        </div>

        <!-- <div class="row">
			<div class="col-lg-12 text-center">
				<div class="pagination-wrap">
					<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a class="active" href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div> -->
    </div>
</div>
<!-- end products -->

@include('/site/includes/footer')