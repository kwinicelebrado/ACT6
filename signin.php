<?php
include($_SERVER['DOCUMENT_ROOT'].'/json/loginConnect.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="signinFunc.js"></script>
	<title>JSON LOGIN FORM</title>
</head>
<body>
	<div class="container">
		<div class="contents">
			<h1>LOGIN HERE!</h1>
			<form method="post" action="table.php">
				<label>Username: </label>
				<input type="text" name="username" id="user" required><br>
				<label>Password: </label>
				<input type="password" name="password" id="pass" required><br>
				<input type="hidden" name="hidden_json" id="hide">
				<button type="submit" name="login" id="log" onclick="dataCheck()">LOGIN</button>
			</form>
		</div>
	</div>

<script type="text/javascript">
	var jsonData = [
	{
		username: "kwene",
		password: "blabla"
	},
	{
		username: "ravega",
		password: "watever"
	},
	{
		username: "agitate",
		password: "lolpamore"
	}
]
	document.getElementById("hide").value = JSON.stringify(jsonData);
</script>


</body>
</html>