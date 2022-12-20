<!DOCTYPE html>
<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/isp_aukcionai/include/config.php");
?>
<html>
<head>
	<title>Registruotis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<style>
	*{
		padding: 0;
		margin: 0;
		border-radius: 25px;
	}
	.login-form{
		width: 350px;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		position: absolute;
		align-items: center;
		background-color: #caedff;
		
	}
	.login-form h1{
		font-size:40px;
		text-align:center;
		text-transform: uppercase;
		margin: 40px 0;
	}
	.login-form p{
		font-size: 20px
		margin: 15px 0;
		align: center;
	}
	
	.login-form input{
		font-size: 16px;
		width: 100%;
		padding: 15px 10px;
		border: 1;
		outline: none;
		border-radius: 5px;
	}
	.login-form button{
		font-size: 18px;
		font-weight: bold;
		margin: 20px 0;
		padding: 10px 15px;
		width: 49%;
		border-radius: 5px;
		border: 1;
	}
	.regis{
		font-size: 18px;
		font-weight: bold;
		margin: 25px 0;
		padding: 10px 15px;
		width: 100%;
		border-radius: 5px;
		border: 1;
		align-items: center;
	}
	
</style>
</head>   
	  
<?php

if (isset($_POST['user'])) {
	
	$query = "INSERT INTO vartotojas (vardas, pavarde, email, slaptazodis, likutis, blokuotas)
			  VALUES('" . $_POST['name'] . "','" . $_POST['surname'] . "','" . $_POST['user'] . "','" . $_POST['password'] . "','0.0','0')";
	if(mysqli_query($db, $query)){
		header("Location: /isp_aukcionai/PagrindinisPuslapis.php");
	}
}

?>

<body>
	<div class ="login-form">
		
		<h1>Registruotis</h1>
		<form method="post">
			<p>El-pastas</p>
			<input type="text" name="user" placeholder="El-pastas", required="required">
			<p>Vardas</p>
			<input type="text" name="name" placeholder="Vardas", required="required">
			<p>Pavardė</p>
			<input type="text" name="surname" placeholder="Pavardė", required="required">
			<p>Slaptažodis</p>
			<input type="password" name="password" placeholder="Slaptažodis", required="required">
			
			
			<p>
			<button type ="submit">Registruotis</button>
			</p>
		</form>
		
		<div class="container text-center">
			<p><a href = "/isp_aukcionai/PagrindinisPuslapis.php"> Į pagrindinį puslapį?</a></p>
		</div>
		
	</div>
</body>
	  
</html>
