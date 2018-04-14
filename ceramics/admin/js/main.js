
$(document).ready(function(){
	var DOMAIN1 = "http://localhost/ceramics/admin";
	var DOMAIN = "http://localhost/ceramics/admin/includes";
	
	$("#register_form").on("submit",function(){
		var status = false;
		var fname = $("#f_name");
		var lname = $("#l_name");
		var email = $("#email");
		var mobile = $("#mobile");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = "Admin";
		var address1 = $('#address1');
		var address2 = $('#address2');
		var number = new RegExp(/^[0-9]+$/);
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if(fname.val() == "" || fname.val().length < 6){
			fname.addClass("border-danger");
			$("#f_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
			status = false;
		}else{
			fname.removeClass("border-danger");
			$("#f_error").html("");
			status = true;
		}
		if(lname.val() == "" || lname.val().length < 6){
			lname.addClass("border-danger");
			$("#l_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
			status = false;
		}else{
			lname.removeClass("border-danger");
			$("#f_error").html("");
			status = true;
		}
		if(lname.val() == fname.val()){
			lname.addClass("border-danger");
			$("#l_error").html("<span class='text-danger'>Please Enter fname and lname different</span>");
			status = false;
		}else{
			lname.removeClass("border-danger");
			$("#l_error").html("");
			status = true;
		}
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if(!number.test(mobile.val()) || mobile.val().length != 10){
			email.addClass("border-danger");
			$("#m_error").html("<span class='text-danger'>Please Enter Valid Phone number</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#m_error").html("");
			status = true;
		}
		if(pass1.val() == "" || pass1.val().length < 9){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if(pass2.val() == "" || pass2.val().length < 9){
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more than 9 digit password</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}
		if ((pass1.val() == pass2.val()) && status == true) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN + "/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					if (data == "EMAIL_ALREADY_EXISTS") {
						$(".overlay").hide();
						alert("It seems like you email is already used");
					}else if(data == "SOME_ERROR"){
						$(".overlay").hide();
						alert("Something Wrong");
					}else{
						$(".overlay").hide();
						window.location.href = encodeURI(DOMAIN1 + "/index.php?msg=You are registered Now you can login");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}
	})
	//Chnage password
	$("#change_pass").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	: DOMAIN + "/process.php",
			method:	"POST",
			data	:$("#change_pass").serialize(),

			success	:function(data){
				if(data == "Error"){
					window.alert("Something went wrong");
					$(".overlay").hide();
				}
				else if(data == "EMAIL NOT CORRECT"){
					window.alert("EMAIL NOT CORRECT");
					$(".overlay").hide();
				}
				else if(data == "Password incorrect"){
					window.alert("Old paswword do not match");
					$("#old_pass").html("");
					$("#pass_1").html("");
					$("#r_pass").html("");
					$(".overlay").hide();
				}
				else if(data == "Wrong Entry"){
					window.alert("New password and Re-enter paswword do not match");
					$("#pass_1").html("");
					$("#r_pass").html("");
					$(".overlay").hide();
				}
				else{
					alert("Password changed successfully");
					$(".overlay").hide();
					window.location.href = DOMAIN1 +"/dashboard.php";
					
				}
			}
		})
	})
	//For Login Part
	$("#form_login").on("submit",function(){
		var email = $("#log_email");
		var pass = $("#log_password");
		var status = false;
		if (email.val() == "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status) {
			$(".overlay").show();
			$.ajax({
				url : DOMAIN+"/process.php",
				method : "POST",
				data : $("#form_login").serialize(),
				success : function(data){
					if (data == "NOT_REGISTERD") {
						$(".overlay").hide();
						email.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>It seems like you are not Admin</span>");
					}else if(data == "PASSWORD_NOT_MATCHED"){
						$(".overlay").hide();
						console.log(data);
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
						status = false;
					}else{
						$(".overlay").hide();
						window.location.href = DOMAIN1 +"/dashboard.php";
					}
				}
			})
		}
	})

	//Fetch category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : DOMAIN+"/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root = "<option value='0'>Root</option>";
				var choose = "<option value=''>Choose Category</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(choose+data);
			}
		})
	}

	//Fetch Brand
	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url : DOMAIN+"/process.php",
			method : "POST",
			data : {getBrand:1},
			success : function(data){
				var choose = "<option value=''>Choose Brand</option>";
				$("#select_brand").html(choose+data);
			}
		})
	}

	//Add Category
	$("#category_form").on("submit",function(){
		if ($("#category_name").val() == "") {
			$("#category_name").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/process.php",
				method : "POST",
				data  : $("#category_form").serialize(),
				success : function(data){
					if (data == "CATEGORY_ADDED") {
							$("#category_name").removeClass("border-danger");
							$("#cat_error").html("<span class='text-success'>New Category Added Successfully..!</span>");
							$("#category_name").val("");
							fetch_category();
					}else{
						alert(data);
					}
				}
			})
		}
	})


	//Add Brand
	$("#brand_form").on("submit",function(){
		if ($("#brand_name").val() == "") {
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/process.php",
				method : "POST",
				data : $("#brand_form").serialize(),
				success : function(data){
					if (data == "BRAND_ADDED") {
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'>New Brand Added Successfully..!</span>");
						$("#brand_name").val("");
						fetch_brand();
					}else{
						alert(data);
					}
						
				}
			})
		}
	})
	
	//add product
	$("#product_form").on("submit",function(){
		var image = $("#userfile").val();
		if(image == ''){
			alert("Please select a image");
		}
		else{
			var ext = $("#userfile").val().split('.').pop().toLowerCase();
			if(jQuery.inArray(ext,['png','jpg','jpeg']) == -1){
				alert("Please select proper file(jpeg,png,jpg)");
				$("#userfile").val('');
			}
			else{
				$.ajax({
						url : DOMAIN+"/process.php",
						method : "POST",
						data : new FormData(this),
						processData: false,
						contentType:false,
						success : function(data){
							if(data == "un_upload"){
								alert("File not able to be moved");
							}
							if (data == "NEW_PRODUCT_ADDED") {
								alert("New Product Added Successfully..!");
								$("#product_name").val("");
								$("#select_cat").val("");
								$("#select_brand").val("");
								$("#product_price").val("");
								$("#product_qty").val("");
								$("#image_id").val("");
								$("#product_image").val("");
								$("#product_details").val("");
		
							}else{
								alert(data);
							}					
						}
				})
			}
		}
	})



})
