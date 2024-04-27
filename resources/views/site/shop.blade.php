@include('site.includes.header')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="breadcrumb"><a href="{{route('home')}}">GO BACK HOME</a> / STORE</span>
                <h3>ALL PRODUCTS ARE FOUND HERE</h3>
            </div>
        </div>
    </div>
</div>

<div class="properties section">
    <div class="container">
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
    </div>

</div>
@includeIf('site.includes.footer')