
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">  

</head>
<body>
  <?php session_start();
  if(isset($_POST['cancelChangePassword'])){
    unset($_SESSION['otpVerified']);
  }

   ?>
<div class="loginbox">
    <img src="photos/avatar.png" class="avatar" style="user-select: none;">
        <h1>Dealer Inventory Login</h1>
        <form action="authenticateDealer.php" method="post">
            <div class="form-group">
          <label for="name">Email</label>
          <input type="text" class="form-control" id="name" name="usrname" placeholder="eg. example@gmail.com" required="required">
          <p>
          <?php 
            if(isset($_SESSION['errorusrname'])){
              echo "*invalid username";
              unset($_SESSION['errorusrname']);
            }else{
            echo "<br>";
          }
          ?>
        </p>
        </div>

           <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter Your Password" required="required">
          <p>
           <?php 
            if(isset($_SESSION['errorpassword'])){
              echo "*invalid password";
              unset($_SESSION['errorpassword']);
            }else{
            echo "<br>";
            }
          ?>
        </p>
        </div><br>
            <input type="submit" name="DloginSubmit" value="Login To Inventory"><br><br>
           <a style="float:right" href="DresetPassword.php" > Forgot password ?</a>
        </form>
        
    </div>
      <?php session_destroy();  ?>

</body>
</html>
