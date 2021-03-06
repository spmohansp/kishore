@include('hub.layoutMobile.header')
	<section id="form" style="margin-top: 65px;"><!--form-->
		<div class="container">
			<div id="response"></div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-sm-offset-1">
					<h4>@yield('header')</h4>
				 	@include('hub.master.errors')
				 	@yield('content')
				</div>
			</div>
		</div>
	</section>
	@include('hub.layoutMobile.footer')
	<script src="{{url("/mobile/js/jquery.js")}} "></script>
		<script src="{{url("/mobile/js/bootstrap.min.js")}}"></script>
		<!-- <script src="/mobile/js/jquery.scrollUp.min.js"></script> -->
		<!-- <script src="js/price-range.js"></script> -->
	    <!-- <script src="js/jquery.prettyPhoto.js"></script> -->
	    <!-- <script scr="js/main.js"></script> -->
	    <!-- <script src="js/login.js"></script> -->
	    @yield('script')
	</body>
</html>