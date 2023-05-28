<?php 

session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from person where user_name = '$user_name' limit 1";
			$query1 = "select * from person where user_name = 'admin' limit 1";
			$result = mysqli_query($con, $query);
			$result1 = mysqli_query($con, $query1);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{	

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
					
				
					}
					if($user_data['user_name'] === 'admin')
					{	

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: admin.php");
						
				
					}
					
					

					
				}

				
				
			}

			
		
			
			echo '<script type = "text/javascript"> alert ("Wrong username or password!")</script>';
		}
		
		
		else
		{
			echo '<script type = "text/javascript"> alert ("Wrong username or password!")</script>';
		}
		
	}

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