<?php 

session_start();

include ("config.php);
$query = $connect->query("SELECT * FROM fruits");

?>


<!DOCTYPE html>
<html>
<head>
	<title>House Agents Login</title>


</head>
<body>



	<style type="text/css">
	
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
		
			<label>Username:</label>	
			<input id="text" type="text" name="user_name"><br><br>
			<label>Password:</label>	
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>



</body>
</html>
