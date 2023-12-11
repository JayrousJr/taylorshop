@include('/site/includes/header')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>We do cloth Design, Sewing and Repairing</p>
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-text">
                    <h2 class="pb-3">Why <span class="orange-text">{{env('APP_NAME')}}</span></h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="content">
                                    <h3>Home Delivery</h3>
                                    <p>For our near customers around New Hampshire, in Manchester, we deliver the
                                        product to your home door.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Best Price</h3>
                                    <p>Our brilliant design are very affordable and comes with a very reasonable price
                                        better for you our customer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="content">
                                    <h3>From Box</h3>
                                    <p>Indulge in the luxury of bespoke fashion at {{env('APP_NAME')}}, where our
                                        dressmaking
                                        service breathes life into your style dreams. Our artisans, skilled storytellers
                                        with needle and thread, meticulously craft garments that capture the essence of
                                        your unique personality. From concept to creation, every stitch is a
                                        brushstroke, weaving a narrative that is exclusively yours. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Repair and Renewals </h3>
                                    <p>At {{env('APP_NAME')}}, we don't just tailor style; we breathe new life into your
                                        garments with our exceptional cloth repair and renewal service. Our skilled
                                        artisans, the healers of fabric, possess a keen eye for detail and a passion for
                                        preserving the essence of your wardrobe favorites. From seamlessly mending tears
                                        to expertly revitalizing worn-out fabrics, our cloth repair service is a
                                        testament to the artistry of garment rejuvenation. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->

<!-- team section -->
<div class="mt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Our <span class="orange-text">Team</span></h3>

                </div>
            </div>
        </div>
        <div class="row">
            @foreach($team as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg" style="background-image: url(/storage/{{$data->profile_photo_path}});"></div>
                    <h4>{{$data->name}} <span>{{$data->position}}</span></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end team section -->

    @include('/site/includes/testimonials')



    @include('/site/includes/footer')