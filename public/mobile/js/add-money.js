$(document).ready(function(){
	get_wallet_details();
	$('body').on('click','#logout-client',function(){
		logout();
		get_all_details(shop_id);
	});
});
function get_wallet_details(){
	$.ajax({
		type: "POST",
		url: "../controller/add_money_controller.php",
		// data:{data:'test'},
		success: function(data) {  
			// console.log(data);
			var data = JSON.parse(data);
			if (data['status'] == 'success') {
				$('#header-middle').html(data['session_data']);
				$('#footer_content').html(data['session_data_footer']);
				$('#form-data').html(data['update_form']);
			}
		}
	});	
}