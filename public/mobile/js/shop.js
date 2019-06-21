$(document).ready(function(){
	//for category
	url_slug = (window.location.href).split("#");
	shop_id = url_slug[1];
	get_all_details(shop_id);
	$('body').on('click','.add-to-cart',function(){
		slug = $(this).attr('href');
		product_id = (slug).split("#")[2];
		get_product(product_id);
	});
    $('body').on('click','#logout-client',function(){
        logout();
        get_all_details(shop_id);
    });

    $('body').on('click','.category-btn',function(){
    	category = $(this).html();
    	$.ajax({
			type: "POST",
			url: "../controller/filter_category_controller.php",
			data:{shop_id : shop_id, category: category},
			success: function(data) { 
				if (data != "error") {
					console.log("im in");
					var data = JSON.parse(data);
					$('#product').html(data['product']);
				}
			}
		});	    	
    });
	$('body').on('click','#add-fav',function(){
    	var shop_id = $(this).attr("href").substr(1);;
    	console.log(shop_id);

    	$.ajax({
			type: "POST",
			url: "../controller/add_fav_controller.php",
			data:{shop_id:shop_id},
			success: function(data) { 
				console.log(data);
				var x = document.getElementById("snackbar")
				x.innerHTML = data;
			    x.className = "show";
			    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
			}
		});	
    });

   

     $('body').on('click',"#shop_review_modal",function(){
     	var shop_id = $(this).attr("shop_id_review");
     	$(".star_rating").click(function(e){
     		e.preventDefault();
     		var rating =  $("input[name='star']:checked").val();
     		var comments = $("#rating_coments").val();
     		$.ajax({
     			type:"POST",
     			url:"../controller/add_star_rating.php",
     			data:{shop_id:shop_id,rating:rating,comments:comments},
     			success:function(data){
     				location.reload();
     			}
     		});
     		
     	}) 
    });
    // Worked  by ragu
    $('#g-coupon').click(function(){
    	$('#range').html('<option value="">...</option>');
    	$.ajax({
			type: "POST",
			url: "../controller/change_coupon_controller.php",
			data:{shop_id : shop_id},
			success: function(data) { 
				var data = JSON.parse(data);
				console.log(data);
				if(data =='error'){
					 $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Please Login Your Account</strong></div>");
					}else{
					 $("#shop_name").html(data);
					  get_range_details($("#shop_name").html(data).val());
					  get_value();
					}

			}
		});	

    });

    $('#range').on('change',function(){
    	get_value();
    });
    

    $('body').on('change', '#shop_name', function() {
        $('#response').html("");
        $('#range').html('<option value="">...</option>');
        shop_id_value = $(this).val();
        get_range_details(shop_id_value);
        get_value();
        $('#applicable_price').val('');
        $('#coupon_price').val('');
        
    });

    	$('body').on('submit','#form-update',function(e){
		e.preventDefault();
		console.log("Submit Working");
		$.ajax({
			url:"../controller/update_wallet_controller.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				var data = JSON.parse(data);
				if(data['status'] =='case1'){
					console.log("I am in");
					$('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Insufficient fund</strong></div>");
				}
				else{
					 window.location.href="../cart/index.html";
				}
			}
		});
	});
    	

		$('body').on('click','.img-zoom',function(){
			var alt = $(this).children("img").attr("src");
			var input = document.getElementById('product-image');
			input.src = alt;
			var description =  $(this).children("img").attr("data");
			$("#description").text(description);
			console.log(input);
		});

		//view for Cover Image and Logo
			$('body').on('click','.cover-image',function(){
				var attr = $(this).attr("own-attr");
				var image_path = document.getElementById('cover-image-zoom');
				image_path.src = attr;
				
				
				// console.log("Hello World");
			// var alt = $(this).children("img").attr("src");
			// var input = document.getElementById('product-image');
			// input.src = alt;
			// var description =  $(this).children("img").attr("data");
			// $("#description").text(description);
			// console.log(input);
		});


    // End 
});

function get_all_details(shop_id){
	$.ajax({
		type: "POST",
		url: "../controller/get_shop.php",
		data:{data:shop_id},
		success: function(data) { 
			// console.log(data);
			if(data != "error") {
				var data = JSON.parse(data);
				$('#advertisement').html(data['header']);
				$('.category').html(data['category']);
				$('#product').html(data['product']);
				$('#review').html(data['review']);
				$('#header-middle').html(data['session_data']);
				$('#footer_content').html(data['session_data_footer']);
				if(url_slug.length == 3){
					get_product(url_slug[2]);
				}
			}else{
				$('#content').html('<div class="container text-center"><div class="logo-404"><a href="../home/"><img src="../images/logo.jpg" alt="" /></a></div><div class="content-404"><img src="../images/404/404.png" class="img-responsive" alt="" /><h1><b>OPPS!</b> We Couldn’t Find this Page</h1>			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p><h2><a href="../home/">Bring me back Home</a></h2></div></div>');
			}
		}
	});	
}

function get_product(product_id){
	$.ajax({
		type: "POST",
		url: "../controller/get_product.php",
		data:{data:product_id},
		success: function(data) { 
			// console.log(data);
			if(data != "error") {
				var data = JSON.parse(data);
				$('#product').html(data['product']);
			}else{
				$('#content').html('<div class="container text-center"><div class="logo-404"><a href="../home/"><img src="../images/logo.jpg" alt="" /></a></div><div class="content-404"><img src="../images/404/404.png" class="img-responsive" alt="" /><h1><b>OPPS!</b> We Couldn’t Find this Page</h1>			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p><h2><a href="../home/">Bring me back Home</a></h2></div></div>');
			}
		}
	});	
}

// Worked by ragu
function get_range_details(shop_id_value) {
    $.ajax({
        type: "POST",
        url: "../controller/get_price_range.php",
        data: { shop_id: shop_id_value },
        success: function(data) {
            // console.log(data);
            var data = JSON.parse(data);
            console.log(data);
            if (data['status'] == 'success') {
            	// $("#range").html(data['value']);
                $('#range').append(data['value']);
            } else if (data['status'] == 'error') {
                $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
				setTimeout(function() {
				$('#response').fadeOut('fast');
				}, 5000);
            }
        }
    });
    console.log(shop_id_value);
}

function get_value() {
    shop_id = $('#shop_name').val();
    price_range = $('#range').val();
    if (!(shop_id == "") && !(price_range == "")) {
        $.ajax({
            type: "POST",
            url: "../controller/get_wallet_details.php",
            data: { shop_id: shop_id, price_range: price_range },
            success: function(data) {
                var data = JSON.parse(data);
                console.log(data);
                if (data['status'] == 'success') {
                    $('#applicable_price').prop("value", data['data']['applicable_price']);
                    $('#coupon_price').prop("value", data['data']['coupon_price']);
                } else if (data['status'] == 'error') {
                    $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
                }
            }
        });
    }
}

// Worked By Ragu