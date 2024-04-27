@include('site.includes.header')

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="breadcrumb"><a href="{{ route('shop')}}">BACK TO SHOP</a> / PRODUCT </span>
                <h3>{{ $items->type->name}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="section best-deal mt-0 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-content">
                    <div class="row">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="info-table">
                                            <ul>
                                                <li>PRoduct name
                                                    <span style="font-size: .87rem;">
                                                        {{$items->type->name}}
                                                    </span>
                                                </li>
                                                <li>Product Type
                                                    <span style="font-size: .87rem;">
                                                       {{$items->type->type === "cloth"?"Dress":"Fabric"}}
                                                    </span>
                                                </li>
                                                <li>Product Cost
                                                    <span style="font-size: .87rem;">
                                                       ${{number_format($items->type->cost,2)}}
                                                    </span>
                                                </li>
                                                <li>Size
                                                    @foreach ($items->type->size as $size)
                                                    <span style="font-size: .87rem; margin-left:.4em"
                                                        class="span {{$items->type->type === "cloth" ? "badge-cloth":"badge-fab "}}">
                                                        {{$size}}
                                                    </span>
                                                    @endforeach
                                                    <span style="font-size: .87rem;">
                                                        {{$items->type->type === "cloth"?" ":"Yard(s)"}}
                                                    </span>
                                                </li>
                                                <li>Product Status
                                                    <span style="font-size: .87rem;"
                                                        class="category {{$items->status == 1 ? '':'text-white' }}">
                                                        {{$items->status == 1 ? 'Available in Stock':'Not Available' }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="owl-carousel owl-banner">
                                            @foreach($items->image as $data)
                                            <div class="item">
                                                <img src="/storage/{{$data}}"
                                                    alt="PRoduct image of {{$items->type->name}}">
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="col-lg-3">
                                        <h4> {{$items->type->name}}</h4> {!!$items->type->description!!}
                                    </div>
                                </div>
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
                    <h6>| VIEW RELATED PRODUCTS</h6>
                </div>
            </div>
        </div>
        <!-- Products from the store -->
        <div class="row">
            <!-- individual item -->
            @foreach ($relatedProduct as $data)
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a  href={{ $data->type->type == "fabric" ? route('fabric', $data->id) : route('cloth', $data->id) }}>
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
                                class="badge-fab m-1 {{$data->type->type === "cloth" ? "badge-cloth":""}} ">
                                {{$size}}
                            </span>
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
@include('site.includes.footer')