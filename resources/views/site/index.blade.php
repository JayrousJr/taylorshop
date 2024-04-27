@include('site.includes.header')

<div class="main-banner">
    <div class="owl-carousel owl-banner">
        @foreach($sliders as $data)
        <div class="item" style="background-image: url(/storage/{{$data->image}});">
            <div class="header-text">
                <span class="category"> <em>{{$data->subtitle}}</em></span>
                <h2>{{$data->title}}</h2>
            </div>
        </div>
        @endforeach
    </div>
</div>




<div class="fun-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="counter">
                                <!-- <h2 class="timer count-title count-number" data-to="1" data-speed="1000"></h2> -->
                                <p class="count-text ">Cloth designing</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <!-- <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2> -->
                                <p class="count-text ">Fabrics Selling </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <!-- <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2> -->
                                <p class="count-text ">Repair & Renew</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="properties section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h6>| VIEW OUR PRODUCT</h6>
                    <h2>View Recent Products</h2>
                </div>
            </div>
        </div>
        <!-- Products from the store -->
        <div class="row">
            <!-- individual item -->
            @foreach ($items as $data)
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a
                        href={{ $data->type->type == "fabric" ? route('fabric', $data->id) : route('cloth', $data->id) }}>
                        <img src="/storage/{{$data->image[0]}}" alt="Produc Image">
                    </a>
                    <span class="category {{$data->status == 1 ? '':'text-white' }}">
                        {{$data->status == 1 ? 'Available in Stock':'Not Available' }}
                    </span>
                    <h6>${{$data->type->cost}}</h6>
                    <h4>
                        <a
                            href={{ $data->type->type == "fabric" ? route('fabric', $data->id) : route('cloth', $data->id) }}>{{$data->type->name}}
                        </a>
                    </h4>
                    <ul>
                        <li>Type: <span>{{$data->type->type === "cloth"?"Dress":"Fabric"}}</span>
                        </li>
                        <li>Size:
                            @foreach ($data->type->size as $size)
                            <span
                                class="badge-fab {{$data->type->type === "cloth" ? "badge-cloth":""}}">{{$size}}</span>
                            @endforeach
                            {{$data->type->type === "cloth"?" ":"Yard(s)"}}
                        </li>


                    </ul>

                </div>
            </div>
            @endforeach
            <!-- individual item ends -->

            <!-- Products ends -->

        </div>
        <div class="main-button align-content-center">
            <a href={{route('shop')}}>View More Products</a>
        </div>
    </div>

</div>

@include('site.includes.footer')