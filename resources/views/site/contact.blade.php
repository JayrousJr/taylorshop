@include('/site/includes/header')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Get 24/7 Support</p>
                    <h1>Contact us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>If you have any question please, do not hesitate to contact our customer support for more help
                        and wxplanations 24/7.</p>
                </div>
                <div id="form_status">
                    @if ($errors->any())
                    <div class="alert alert-danger text-left">
                        <p>Please Fix the following errors to continue, check carefull your details input!</p>
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @endif
                </div>
                <div class="contact-form">
                    <form type="POST" action="{{route('send')}}" method="post">
                        @csrf
                        <p>
                            <input type="text" placeholder="Name" class="@error('name') is-invalid  @enderror"
                                name="name" value="{{old('name')}}" id="name">

                            <input type="email" placeholder="Email" class="@error('email') is-invalid  @enderror"
                                name="email" value="{{old('email')}}" id="email">

                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" class="@error('phone') is-invalid  @enderror"
                                name="phone" value="{{old('phone')}}" id="phone">

                            <input type="text" placeholder="Subject" value="{{old('subject')}}"
                                class="@error('subject') is-invalid  @enderror" name="subject" id="subject">

                        </p>
                        <p>
                            <textarea name="message" cols="30" class="@error('message') is-invalid  @enderror" rows="10"
                                placeholder="Message">{{old('message')}}</textarea>

                        </p>
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
            @foreach($about as $data)
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>{{$data->street}} <br> {{$data->city}}, {{$data->state}}<br> {{$data->country}}</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>MON - FRIDAY: 8:00 AM to 6:00 PM <br> SAT 10 AM to 5 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: {{$data->phone}} <br> Email: {{$data->email}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
            </div>
        </div>
    </div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
    <iframe
        src="https://www.google.com/maps/embed/v1/place?q=20+Maynard+ave+Manchester+NH+03103&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
        class="embed-responsive-item"></iframe>
</div>
<!-- end google map section -->

@include('/site/includes/footer')
<!-- 
<div style="overflow:hidden;resize:none;max-width:100%;width:500px;height:500px;">
    <div id="my-map-canvas" style="height:100%; width:100%;max-width:100%;">
        <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=20+Maynard+ave+Manchester+NH+03103&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
        </iframe>
    </div>
    <a class="googlecoder" href="https://www.bootstrapskins.com/themes" id="enable-map-data">premium bootstrap
        themes</a>
    <style>
        #my-map-canvas img {
            max-width: none !important;
            background: none !important;
            font-size: inherit;
            font-weight: inherit;
        }
    </style>
</div> -->