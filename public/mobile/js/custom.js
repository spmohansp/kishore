$(document).ready(function(){
	//for category
	get_category();
	$( "#find-products" ).autocomplete({
		source: '../controller/autocomplete_shop.php'
	});
    $('body').on('click','#logout-client',function(){
        logout();
        get_category();
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
				$('#category').html(data['menu_header']);
				$('#category-shop').append(data['shop_category']);
				$('#footer_content').html(data['session_data_footer']);
				$('#header-middle').html(data['session_data']);
			}else{
				$('#category').html("<li>No Categories Found</li>");
			}
		}
	});	
}