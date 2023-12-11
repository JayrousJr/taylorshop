@include('/site/includes/header')

<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->

    @foreach($sliders as $data)
    <div class="single-homepage-slider " style="background-image: url(/storage/{{$data->image}});">
        <div class="container">
            <div class="row">
                <div
                    class="offset-lg-1 {{$data->id === 1 ? 'col-lg-7 col-md-12  offset-xl-0' : ''}} {{$data->id === 2 ? 'col-lg-10 text-center' : ''}} {{$data->id === 3 ? 'col-lg-10 text-right' : ''}} ">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">{{$data->subtitle}}</p>
                            <h1>{{$data->title}}</h1>
                            <div class="hero-btns">
                                <a href="{{route('shop')}}" class="boxed-btn">Cloth Collection</a>
                                <a href="{{route('contact')}}" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    @endforeach

</div>
<!-- end home page slider -->

<!-- features list section -->
@include('/site/includes/features')
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p>See our latest products from here</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($product as $data)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href='/product_9OeUu9fHbc9Of4SM3H6rr{{$data->id}}u8QDrviQlx67fJ7tKOPpxdata&prd'><img
                                src="/storage/{{$data->image}}" alt=""></a>
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
    </div>
</div>
<!-- end product section -->

@include('/site/includes/testimonials')

<!-- advertisement section -->
<!-- <div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">{{env('APP_NAME')}}</p>
                    <h2>We are <span class="orange-text">Taylors</span></h2>
                    <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel
                        nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed,
                        interdum velit. Nam eu molestie lorem.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
                        veritatis minus, et labore minima mollitia qui ducimus.</p>
                    <a href="{{route('about')}}" class="boxed-btn mt-4">know more</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- end advertisement section -->


<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> News</h3>
                    <p>Latest New of our products and events</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($news as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a>
                        <div class="latest-news-bg" style="background-image: url(/storage/{{$data->image}});"></div>
                    </a>
                    <div class="news-text-box">
                        <h3><a>{{$data->name}}</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Manager</span>
                            <span class="date"><i class="fas fa-calendar"></i>
                                {{date('D M Y', strtotime($data->created_at))}}</span>
                        </p>
                        <p class="excerpt">{!!$data->discription!!}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- end latest news -->

@include('/site/includes/footer')