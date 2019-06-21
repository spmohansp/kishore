@include('commutter.layoutMobile.header')
	<section id="form" style="margin-top: 65px;"><!--form-->
		<div class="container">
			<div id="response"></div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-sm-offset-1">
					<h4>@yield('header')</h4>
				 	@include('commutter.master.errors')
<!-- ACTIVE STATUS SHOW CONTENT -->
		@if(Auth::user())
				 	@if(Auth::user()->status==1)
				 		@yield('content')
				 	@else
				 		@yield('activeButton')
				 		<center><h3>To Be Visible Only On Active Status</h3></center>
				 	@endif
	 	@else
	 		@yield('content')
	 	@endif

				</div>
			</div>
		</div>
	</section>
	@include('commutter.layoutMobile.footer')
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