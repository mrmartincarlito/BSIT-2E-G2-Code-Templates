const API = "api/login.php";

function postOne() {
	let payload = {
		email : $("#txtEmail").val(),
		password : $("#txtPassword").val()
	}
	
	$.ajax({
		url : API,
		type : "POST",
		data : "action=postOne&payload=" + JSON.stringify(payload),
		success: function (response) {
			let resp = JSON.parse(response);
			
			alert(resp.message);
			if (resp.status == "success") {
				window.location.href = "pages/home";
			}
		},
		error : function (error) {
			alert(error);
		}
	})
	
}