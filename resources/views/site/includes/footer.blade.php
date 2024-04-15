	<!-- footer -->
	@foreach($about as $data)
	<div class="footer-area">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-3 col-md-6">
	                <div class="footer-box about-widget">
	                    <h2 class="widget-title">About us</h2>
	                    <p>{!!$data->about_us!!}</p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="footer-box get-in-touch">
	                    <h2 class="widget-title">Get in Touch</h2>
	                    <ul>
	                        <li>{{$data->street}}, {{$data->city}} <br>{{$data->state}}, {{$data->country}} </li>
	                        <li>{{$data->email}}</li>
	                        <li>{{$data->phone}}</li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="footer-box pages">
	                    <h2 class="widget-title">Pages</h2>
	                    <ul>
	                        <li><a href="{{route('home')}}">Home</a></li>
	                        <li><a href="{{route('about')}}">About</a></li>
	                        <li><a href="{{route('shop')}}">Shop</a></li>
	                        <li><a href="contact.html">Contact</a></li>
	                        <li><a href="/admin">Log In</a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-6">
	                <div class="footer-box subscribe">
	                    <h2 class="widget-title">More Contact</h2>
	                    <p>For more details and insights visit <a href="{{route('about')}}">Our About</a> Page</p>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endforeach
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6 col-md-12">
	                <p>
	                    Copyright &copy;<script data-cfasync="false"
	                        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	                    <script>
	                    document.write(new Date().getFullYear());
	                    </script> All Rights
	                    Reserved.<br>
	                    Designed By
	                    <a href="https://cloudstechn.com">
	                        TechCLOUDs Team

	                    </a>
	                </p>
	            </div>
	            <div class="col-lg-6 text-right col-md-12">
	                <div class="social-icons">
	                    <ul>
	                        @foreach($net as $data)

	                        <li><a href="{{$data->link}}" target="_blank"><i class="fab fa-{{$data->icon}}"></i></a></li>

	                        @endforeach
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

	<script>
$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#notification").fadeOut('slow');
    }, 15000);
});

$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#message").fadeOut('slow');
    }, 5000);
});
	</script>
	</body>

	</html>