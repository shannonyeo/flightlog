<?php  

include('server.php'); 


if (isset($_GET['signup'])) {
  
    $signup_state = true;
  
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if ($signup_state == false): ?>
<form method="post" >
			
    
            <div class="input-group">
                  <label>Username</label>
                  <input type="text" name="user_name" >
                </div>
            <div class="input-group">
                  <label>Password</label>
                  <input type="text" name="password">
                </div>
            <div class="input-group">
           
              </div>
              <div class="input-group">
      
          <button class="btn" type="submit" name="login" style="background: #556B2F;" >Login</button>
          
          <a href="login.php?signup" class="btn" >Signup</a>
      
      
              </div>
      
</form>

<?php else: ?>
      <form method="post" >
            <div class="input-group">
                  <label>Username</label>
                  <input type="text" name="user_name" >
                </div>
            <div class="input-group">
                  <label>Password</label>
                  <input type="text" name="password">
                </div>
            <div class="input-group">
           
              </div>
              <div class="input-group">
      
          <a href="login.php" class="btn" >Back</a>
          <button class="btn" type="submit" name="register" style="background: #556B2F;" >Register</button>
      
       
      
              </div>
            <?php endif ?>
      </form>

</body>
</html>