$(document).ready(function(){

	get_wallet_details();
	$('body').on('change','#shop_name',function(){
		$('#response').html("");
		$('#range').html('<option value="">...</option>');
		shop_id_value = $(this).val();
		$.ajax({
			type: "POST",
			url: "../controller/get_price_range.php",
			data:{shop_id:shop_id_value},
			success: function(data) {  
				console.log(data);
				var data = JSON.parse(data);
				if (data['status'] == 'success'){
					$('#range').append(data['value']);
				}else if (data['status'] == 'error'){
					$('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
				}
			}
		});	
		get_value();
	});	
	$('body').on('change','#range',function(){
		get_value();
	});	
	$('body').on('click','#logout-client',function(){
		logout();
		get_all_details(shop_id);
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
});

function get_value(){
	shop_id = $('#shop_name').val();
	price_range = $('#range').val();
	if (!(shop_id == "") && !(price_range == "")) {
		$.ajax({
			type: "POST",
			url: "../controller/get_wallet_details.php",
			data:{shop_id:shop_id,price_range:price_range},
			success: function(data) {  
				console.log(data);
				var data = JSON.parse(data);
				if (data['status'] == 'success'){
					$('#applicable_price').prop("value", data['data']['applicable_price']);
					$('#coupon_price').prop("value", data['data']['coupon_price']);
				}else if (data['status'] == 'error'){
					$('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
				}
			}
		});	
	}
}
function get_wallet_details(){
	$.ajax({
		type: "POST",
		url: "../controller/wallet_controller.php",
		data:{data:'test'},
		success: function(data) {  
			// console.log(data);
			var data = JSON.parse(data);
			if (data['status'] == 'success') {
				$('#header-middle').html(data['session_data']);
				$('#coupon_header').html(data['coupon_header']);
				$('#footer_content').html(data['session_data_footer']);
				$('#form-data').html(data['update_form']);
			}
		}
	});	
}