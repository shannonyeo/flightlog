<?php 
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'flightlog');

	// initialize variables
	$tailNumber = "";
	$flightID = "";
	$takeoff = "";
	$landing = "";
	$duration = "";
	$id = 0;
	$edit_state = false;
	$signup_state = false;


	if (isset($_POST['login']))
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($db, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{	
						
						header('location: index.php');
						
					}
					
				}	
				
			}
		
		}
	}

	if (isset($_POST['register'])) 
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		$user = mysqli_query($db,"select user_name from users where user_name = '$user_name'");
		$result = mysqli_num_rows($user);

		$sql_u = "select * from users where user_name = '$user_name' limit 1";
		$res_u = mysqli_query($db, $sql_u);
		

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && mysqli_num_rows($res_u)<1)
		{

			//save to database
			
			$query = "insert into users (user_name,password) values ('$user_name','$password')";
			$result = mysqli_query($db, $query);

			echo '<script type = "text/javascript"> alert ("Account created!")</script>';
		}
		if(empty($user_name) && empty($password) && is_numeric($user_name))
		
		{
		echo '<script type = "text/javascript"> alert ("Please key in valid username and password!")</script>';
		}
		elseif(mysqli_num_rows($res_u)>0)	
		{
			echo '<script type = "text/javascript"> alert ("Username taken!")</script>';
		}
		
	
		
	}

	//save records
	if (isset($_POST['save'])) {
		$tailNumber = $_POST['tailNumber'];
		$flightID = $_POST['flightID'];
		$takeoff = $_POST['takeoff'];
		$landing = $_POST['landing'];
		$duration = $_POST['duration'];

		mysqli_query($db, "INSERT INTO info (tailNumber,flightID, takeoff, landing, duration) VALUES ('$tailNumber', '$flightID', '$takeoff','$landing','$duration')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$tailNumber = $_POST['tailNumber'];
		$flightID = $_POST['flightID'];
		$takeoff = $_POST['takeoff'];
		$landing = $_POST['landing'];
		$duration = $_POST['duration'];
	
		mysqli_query($db, "UPDATE info SET tailNumber='$tailNumber', flightID='$flightID', takeoff = '$takeoff', landing = '$landing', duration = '$duration'  WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

	//delete records
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id = $id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: index.php');

	}


