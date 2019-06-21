$(document).ready(function(){
	$(".otp-form").hide();
	$(".forgot-form").hide();
	$("#terms-conditions-content").hide();
	get_category();
    url_slug = (window.location.href).split("##")[1];
	$("#login-form").submit(function(e){
		e.preventDefault();
		email = document.getElementById('login-email').value;
		password = document.getElementById('login-password').value;  
		keep_me_signin = $("#keep_me_signin:checked").length;
		$.ajax({
			type : "POST",
			url : "../controller/login_controller.php",
			data: {email : email, password : password, keep_me_signin:keep_me_signin},
			success: function(data){
				console.log(data); 
				if (data == 'success') {
					// window.location = "../"+url_slug;
					window.location = "../home";

				}else if (data == 'error'){
					document.getElementById('response').innerHTML = '<div class="alert alert-danger">Invalid Credentials.</div>';
					setTimeout(function(){document.getElementById('response').innerHTML ="";},2000);
				} else{
					document.getElementById('response').innerHTML = '<div class="alert alert-danger">Try again Later!</div>';
				}  
			}
		});
	});

	$("#signup-form").submit(function(e){
		e.preventDefault();
		email = document.getElementById('signup-email').value;
		name = document.getElementById('signup-name').value;
		password = document.getElementById('signup-password').value;
		phone_no = document.getElementById('signup-phone-no').value;  
		$.ajax({
			type: "POST",
			url: "../controller/signup_email_validate.php",
			data: {email : email,phone_no:phone_no},
			success: function(data) { 
				// console.log(data);
				if (data == "exists") {
					document.getElementById('response').innerHTML = '<div class="alert alert-danger">Email Already Exists.</div>';
					setTimeout(function(){document.getElementById('response').innerHTML ="";},2000);					
				}else if(data == "not_exists"){
					$.ajax({
						type: "POST",
						url: "../controller/register.php",
						data: {email : email, password : password,name : name,phone_no:phone_no},
						success: function(data) { 
							// console.log(data);
						var spl  = data;
						var newdata = spl.split("-");
						var register_otp = newdata[0];
						console.log(register_otp);
						var user_phone_no = newdata[1];
						if(spl == "Error"){
							document.getElementById('response').innerHTML = '<div class="alert alert-danger">Something Went Wrong, Try again Later.</div>';
							setTimeout(function(){document.getElementById('response').innerHTML ="";},2000);
						}else{
								$(".otp-form").show();
								$(".signup-form").hide();
									$("#otp_form").click(function(e){
									e.preventDefault();
									otp = $("#otp_content").val();
									
									$.ajax({
										type : "POST",
										url : "../controller/validate_otp.php",
										data : {otp : otp},
										success: function(data){
											console.log(data);
											if(data == 'success'){
												 user_register(user_phone_no);
											}else{
												document.getElementById('response').innerHTML = '<div class="auto_hide_div"><div class="alert alert-danger">Enter Valid OTP</div></div>' ; 
												setTimeout(function() {
											$('.auto_hide_div').fadeOut('fast');
											}, 2000)
											}
										}
									});	
								});
							}
							
						} //success sunction End
					});

				}else{
					document.getElementById('response').innerHTML = '<div class="alert alert-danger">Something Went Wrong, Try again Later.</div>';
					setTimeout(function(){document.getElementById('response').innerHTML ="";},2000);					
				}
			}
		});
	});

	$("body").on("click","#forgot-password",function(e){
		e.preventDefault();
		$(".login-form").hide();
		$(".forgot-form").show();
		// $(".login-form1").show();
	});

	$("#send-password").click(function(e){
		e.preventDefault();
		var email = $("#forgot-email").val();
		forgot_password(email);
	});
	$("#terms-conditions").click(function(){
		$("#terms-conditions-content").show();
	});
	$("#close").click(function(){
		$("#terms-conditions-content").hide();
	});
});

function get_category(){
	$.ajax({
		type: "POST",
		url: "../controller/get_category.php",
		data:{data:'test'},
		success: function(data) {  
			// console.log(data);
			var data = JSON.parse(data);
			if (data['menu_header'] != 'empty') {
				$('#header-middle').html(data['session_data']);
			}else{
				$('#category').html("<li>No Categories Found</li>");
			}
		}
	});	
}


function forgot_password(email){
	$.ajax({
		type : "POST",
		url  : "../controller/forgot_password_controller.php",
		data : {user_email:email},
		success:function(data){
			var data = JSON.parse(data);
			if(data['status'] =='success'){
				$('#response').html("<div class = 'alert alert-success' role='alert'><strong>Password send Successfully</strong></div>");
				$(".forgot-form").hide();
				$(".login-form").show();

			}else if(data['status'] =='wrong_mail'){
				$('#response').html("<div class = 'alert alert-success' role='alert'><strong>Enter correct Email</strong></div>");
			}else if(data['status'] =='error'){
				$('#response').html("<div class = 'alert alert-success' role='alert'><strong>Try Again</strong></div>");
			}else if(data['status'] =='not_send'){
				console.log("Password Updated But Mail Not Send");
			}
		}

	});

}

function user_register(user_phone_no){
			$.ajax({
			type : "POST",
			url : "../controller/register_otp.php",
			data : {id:user_phone_no},
			success: function(data){
				console.log(data);
			if(data == "success"){
			window.location = "../login/";
			}
			else{
			document.getElementById('response').innerHTML = '<div class="auto_hide_div"><div class="alert alert-danger"><strong>Sorry!   </strong>Not Register</div></div>' ; 
			setTimeout(function() {
			$('.auto_hide_div').fadeOut('fast');
			}, 2000)
		  }
		}
			});

}