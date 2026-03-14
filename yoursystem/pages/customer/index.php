<?php
include "../../api/config.php";

if (!isset($_SESSION['user'])) {
	header("LOCATION: ../../");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Customer</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	  </head>
	<body>
		<?php include "../menu.php";?>
		<h1>Hello <?php echo $_SESSION['user']['email']?></h1>
		
		<img id="profilePreview" src="../../api/uploads/<?php echo $_SESSION['user']['profile_pic']?>" class="img-thumbnail" style="width:200px;height:200px"/>
		<br/>
		<a download href="../../api/uploads/<?php echo $_SESSION['user']['profile_pic']?>">Download Me</a><br/>
		<input type="file" id="profilePic" name="profile_pic"/> <br/> <br/><button type="button" id="uploadPic">Upload File</button>
		
	</body>
	<script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
		<script src="script.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>