<?php

include "config.php";

if (isset($_POST['action'])) {
	if ($_POST['action'] == "store") {
		//do insert
	}
	
	if ($_POST['action'] == "update") {
		$id = $_POST['id'];
		$payload = json_decode($_POST['payload']);
		
		$statement = $conn->prepare("UPDATE accounts SET email = ? where id = ?");
		$statement->bind_param("si", $payload->email, $id);
		
		if ($statement->execute()) {
			echo json_encode([
				"status" => "success",
				"message" => "Successfully updated"
			]);
		} else {
			echo json_encode([
				"status" => "failed",
				"message" => "Update Failed"
			]);
		}
		
	}
	
	if ($_POST['action'] == "drop") {
		$id = $_POST['id'];
		
		$statement = $conn->prepare("DELETE from accounts where id = ?");
		$statement->bind_param("i", $id);
		
		if ($statement->execute()) {
			echo json_encode([
				"status" => "success",
				"message" => "Successfully deleted"
			]);
		} else {
			echo json_encode([
				"status" => "failed",
				"message" => "Delete Failed"
			]);
		}
	}
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == "get") {
		$statement = $conn->prepare("SELECT * from accounts");
		$statement->execute();
		$result = $statement->get_result();
		
		$accounts = [];
		while ($row = $result->fetch_assoc()) {
			$accounts[] = $row;
		}
		
		echo json_encode([
			"status" => "success",
			"message" => "Successful",
			"data" => $accounts
		]);
	}
	
	if ($_GET['action'] == "getOne") {
		$id = $_GET['id'];
		$statement = $conn->prepare("SELECT * from accounts where id = ?");
		$statement->bind_param("i", $id);
		$statement->execute();
		$result = $statement->get_result();
	
		
		echo json_encode([
			"status" => "success",
			"message" => "Successful",
			"data" => $result->fetch_assoc()
		]);
	}
}