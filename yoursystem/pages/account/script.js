const API = "../../api/accounts.php";

get();
function get() {
	
	$.ajax({
		url : API,
		type : "GET",
		data : "action=get",
		success: function (response) {
			let resp = JSON.parse(response);
			
			let values = resp.data;
			
			let tr = "";
			values.forEach(data => {
				tr += "<tr>";
				tr += "<td>" +data.id+ "</td>";
				tr += "<td>" +data.email+ "</td>";
				tr += "<td>"+data.password+"</td>";
				tr += "<td><button class='btn btn-primary' onclick='edit("+data.id+")'>EDIT</button><button class='btn btn-danger' onclick='drop("+data.id+")'>DELETE</button></td>"
				tr += "<tr>";
			});
			
			$("#tblAccounts").html(tr);

		},
		error : function (error) {
			alert(error);
		}
	})
}
function edit(id) {
	$.ajax({
		url : API,
		type : "GET",
		data : "action=getOne&id=" + id,
		success: function (response) {
			let resp = JSON.parse(response);
			$("#editEmail").val(resp.data.email);
			$("#editId").val(id);
			$("#editModal").modal('show');
		},
		error : function (error) {
			alert(error);
		}
	});
}

function update() {
	let payload = {
		email : $("#editEmail").val()
	}
	
	$.ajax({
		url : API,
		type : "POST",
		data : "action=update&id=" + $("#editId").val() + "&payload=" + JSON.stringify(payload),
		success: function (response) {
			let resp = JSON.parse(response);
			alert(resp.message);
			if (resp.status == "success") {
				get();
				$("#editModal").modal('hide');
			}
			
		},
		error : function (error) {
			alert(error);
		}
	});

}

function drop(id) {
	if (confirm("Are you sure you want to delete?")) {
		$.ajax({
		url : API,
		type : "POST",
		data : "action=drop&id=" + id,
		success: function (response) {
			let resp = JSON.parse(response);
			
			alert(resp.message);
			if (resp.status == "success") {
				get();
			}
		},
		error : function (error) {
			alert(error);
		}
	})
	}
}