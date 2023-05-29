<?php  

include('server.php'); 

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $edit_state = true;

  $rec = mysqli_query($db,"SELECT * FROM info WHERE id=$id");
  $record = mysqli_fetch_array($rec);
  $tailNumber = $record['tailNumber'];
  $flightID = $record['flightID'];
  $takeoff = $record['takeoff'];
  $landing = $record['landing'];
  $duration = $record['duration'];
  $id = $record['id'];
 
}

if(isset($_SESSION['logout']))
{
  unset($_SESSION['user_name']);
	header("Location: login.php");
	die;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


	<form method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Tail Number</label>
			<input type="text" name="tailNumber" value="<?php echo $tailNumber; ?>">
		</div>
		<div class="input-group">
			<label>Flight ID</label>
			<input type="text" name="flightID" value="<?php echo $flightID; ?>">
		</div>
    <div class="input-group">
			<label>Take Off</label>
			<input type="text" name="takeoff" value="<?php echo $takeoff; ?>">
		</div>
    <div class="input-group">
			<label>Landing</label>
			<input type="text" name="landing" value="<?php echo $landing; ?>">
		</div>
    <div class="input-group">
			<label>Duration</label>
			<input type="text" name="duration" value="<?php echo $duration; ?>">
		</div>
		<div class="input-group">
    <?php if ($edit_state == false): ?>
	<button class="btn" type="submit" name="save" style="background: #556B2F;" >Save</button>
<?php else: ?>
	<button class="btn" type="submit" name="update" >Update</button>
<?php endif ?>
		</div>
    
    <a href="login.php?logout "class="del_btn" >Logout</a>
   
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th >tailNumber</th>
			<th>Flight ID</th>
      <th>Takeoff</th>
      <th>Landing</th>
      <th>Duration</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['tailNumber']; ?></td>
			<td><?php echo $row['flightID']; ?></td>
      <td><?php echo $row['takeoff']; ?></td>
      <td><?php echo $row['landing']; ?></td>
      <td><?php echo $row['duration']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</form>
</body>
</html>

