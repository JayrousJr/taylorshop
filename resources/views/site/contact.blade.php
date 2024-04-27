@include('site.includes.header')
@if(session('success'))
<div class="success" id="fade">
    {{session('success')}}
</div>
@endif
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="breadcrumb"><a href="#">Home</a> / Contact Us</span>
                <h3>Contact Us</h3>
            </div>
        </div>
    </div>
</div>

<div class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6>| Contact Us</h6>
                    <h2>Get In Touch With Our Agents</h2>
                </div>
                <p>We are obliged to give you the great designs, for whatever occasion you have. We have the talented
                    designers for making your day joyful with the best designs from our own shop</p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="item phone">
                            <img src="assets/images/phone-icon.png" alt="" style="max-width: 30px;">
                            <h6>Phone Number<br><span><a href="tel:+16192781930">+1 (619) 278-1930</a></span></h6>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="item email">
                            <img src="assets/images/email-icon.png" alt="" style="max-width: 30px;">
                            <h6>Business
                                Email<br><span><a
                                        href="mailto:info@tnafricanstore.com">info@tnafricanstore.com</a></span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form type="POST" class="contact-form" action="{{route('send')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="name">Full Name</label>
                                <input class="@error('name') is-invalid @enderror" name="name" value="{{old('name')}}"
                                    placeholder="Your Name ...">
                                @error('name')
                                <span class="invalid-feedback" style="margin-top: -1.8rem;" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="email" class="@error('email') is-invalid  @enderror" name="email"
                                    value="{{old('email')}}" id="email" pattern="[^ @]*@[^ @]*"
                                    placeholder="Your E-mail...">
                                @error('email')
                                <span class="invalid-feedback" style="margin-top: -1.8rem;" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="@error('phone') is-invalid  @enderror" name="phone"
                                    value="{{old('phone')}}" id="phone" placeholder="Your Phone...">
                                @error('phone')
                                <span class="invalid-feedback" style="margin-top: -1.8rem;" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="subject">Subject</label>
                                <input type="text" placeholder="Subject" value="{{old('subject')}}"
                                    class="@error('subject') is-invalid  @enderror" name="subject" id="subject">
                                @error('subject')
                                <span class="invalid-feedback" style="margin-top: -1.8rem;" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <label for="message">Message</label>
                                <textarea name="message" class="@error('message') is-invalid  @enderror"
                                    placeholder="Message">{{old('message')}}</textarea>
                                @error('message')
                                <span class="invalid-feedback" style="margin-top: -2rem;" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <fieldset>
                                <button type="submit" class="orange-button">Send Message</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
                <div id="contact"></div>
            </div>
        </div>
    </div>
</div>
@include('site.includes.footer')