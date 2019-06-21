$(document).ready(function(){
	
	$('body').on('keypress','#phone_no',function (e) {
		var regex = new RegExp("^[0-9-]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	get_account_details();
    $('body').on('submit','#form-update',function(e){
    	e.preventDefault();
    	console.log("submitting")
		 $.ajax({
			url: "../controller/update_profile_controller.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				var data = JSON.parse(data);
				console.log(data);
				if (data['status']=='success') {
					$('#response').html("<div class = 'alert alert-success' role='alert'><strong>Request Updated Successfully!</strong></div>");
				}else if(data['status']=='not-updated'){
					$('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Try after Sometime!</strong></div>");
				}else if(data['status']=='image-error'){
					$('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Only Jpeg/Jpg/Png Extensions are allowed!</strong></div>");
				}
			}
		});   	
    });
    $('body').on('click','#logout-client',function(){
        logout();
        get_all_details(shop_id);
    });
});

function get_account_details(){
	$.ajax({
		type: "POST",
		url: "../controller/account_controller.php",
		data:{data:'test'},
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