<?php

include "config.php";

$id = $_SESSION['user']['id'];

$file = $_FILES['profile_pic'];
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

$filename = "user_$id" ."." . $ext;
$targetFile = "uploads/" . $filename;

if (move_uploaded_file($file['tmp_name'], $targetFile)) {
	$sql = "UPDATE accounts set profile_pic = '$filename' where id = $id";
	$conn->query($sql);
	
	$_SESSION['user']['profile_pic'] = $targetFile;
	echo json_encode([
	"status" => "success",
	"message" => "Successfully uploaded a file"
	]);
} else {
	echo json_encode([
	"status" => "failed",
	"message" => "Uploading of file failed"
	]);
}