<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    @foreach($testimonials as $data)
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="/storage/{{$data->image}}" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>{{$data->name}} <span>{{$data->position}}</span></h3>
                            <p class="testimonial-body">
                                "{!!$data->discription!!}"
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->