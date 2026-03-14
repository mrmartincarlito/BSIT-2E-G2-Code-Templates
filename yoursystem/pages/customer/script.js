const API = "../../api/profile_pic_uploader.php";
$("#profilePic").change(function() {
	const file = this.files[0];
	
	if (file) {
		const reader = new FileReader();
		reader.onload = function(e) {
			$("#profilePreview").attr("src", e.target.result);
		}
		reader.readAsDataURL(file);
	}
});

$("#uploadPic").click(function() {
	const fileInput = $("#profilePic")[0];
	
	const formData = new FormData();
	formData.append("profile_pic", fileInput.files[0]);
	
	$.ajax({
		url : API,
		type : "POST",
		data : formData,
		contentType: false,
		processData: false,
		success: function (response) {
			let resp = JSON.parse(response);
			
			alert(resp.message);
			if (resp.status == "success") {
				window.location.reload();
			}
		},
		error : function (error) {
			alert(error);
		}
	})
});