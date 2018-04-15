function check() {
	var name = $("#name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var cpassword = $("#cpassword").val();

	if (name == "") {
		$(".name-erro").text("* Thông tin bị thiếu");
		return false;			
	}

	if (email == "") {
		$(".email-erro").text("* Thông tin bị thiếu");
		return false;	
	}

	if (password == "") {
		$(".password-erro").text("* Thông tin bị thiếu");
		return false;	
	}

	if (cpassword == "") {
		$(".cpassword-erro").text("* Thông tin bị thiếu");
	}
	else {
		if (cpassword != password) {
			$(".cpassword-erro").text("* Mật khẩu nhập lại không khớp");
			return false;
		}
	}

	if (phone == "") {
		$(".phone-erro").text("* Thông tin bị thiếu");
	}

	if (address == "") {
		$(".address-erro").text("* Thông tin bị thiếu");
		return false;
	}
}


function add_user() {
	var order_name = $("#order_name").val();
	var order_email = $("#order_email").val();
	var order_phone = $("#order_phone").val();
	var order_address = $("#order_address").val();

	if (order_name == "") {
		$(".order_name-erro").text("* Thông tin bị thiếu");
		return false;		
	}

	if (order_phone == "") {
		$(".order_name-erro").text("* Thông tin bị thiếu");
		return false;		
	}

	if (order_email == "") {
		$(".order_name-erro").text("* Thông tin bị thiếu");
		return false;		
	}

	if (order_address == "") {
		$(".order_name-erro").text("* Thông tin bị thiếu");
		return false;		
	}
}

$(".add-cart").click(function(e){
	e.preventDefault();
	var href = $(this).attr("href");
	alert(href);
	$.ajax({
		url:href,
		type:'GET',
		success:function(res){
			$('#mini-cart').load(location.href + ' #mini-cart>*');
		}
	});
})
