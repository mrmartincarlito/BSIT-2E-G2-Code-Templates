const API = "../../api/register.php";

function store() {
	let payload = {
		email : $("#txtEmail").val(),
		password : $("#txtPassword").val(),
		confirmPassword : $("#txtConfirmPassword").val()
	}
	
	$.ajax({
		url : API,
		type : "POST",
		data : "action=store&payload=" + JSON.stringify(payload),
		success: function (response) {
			let resp = JSON.parse(response);
			
			alert(resp.message);
			if (resp.status == "success") {
				window.location.href = "../../";
			}
		},
		error : function (error) {
			alert(error);
		}
	})
	
}