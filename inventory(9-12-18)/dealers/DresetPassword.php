<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" href="/layout.css" type="text/css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.container-fluid{
  padding:0px;
}
.container-fluid .panel{
  background-color:lightgray;
}
#right{
  float:right;
}
p{
  text-indent: 10px;
  color:red;
}
</style>
</head>
<body>
  <?php session_start(); ?>
  <div class="container-fluid">
    <div class="panel panel-success" id="panel">
      <h1><div class="panel-heading">Reset Password</div></h1>
      <form method="post" action="dealerLogin.php" style="float:right;">
        <button type="submit" name="logout" >Logout</button>
      </form>
    </div>
    <div class="container">
      <form action="authenticateDealer.php" method="post">
        <div class="form-group">
          <label for="name">User name:</label>
          <input type="text" class="form-control" id="name" name="usrname" placeholder="User Name" required="required">
          <p>
          <?php 
            if(isset($_SESSION['errorusrname'])){
              echo "invalid username";
              unset($_SESSION['errorusrname']);
            }
          ?>
        </p>
        </div>
        <div class="container">
        <div class="row">
          <div class="col-lg-6">
           
              <button type="submit" class="btn btn-primary" name="DgenerateOTP">Generate an OTP</button>
       

          </div>
          <div class="col-lg-6">

              <button type="submit" class="btn btn-primary" name="DalreadyhaveOTP" required>Already have an OTP</button>
      
          </div>
        </div>
        </div>
      </form>
        </div>  
<?php
if(isset($_SESSION['ackmail'])){
  echo '<script>alert("OTP has been generated and send to your mail");</script>';
  unset($_SESSION['ackmail']);
}

?> 
</body>
</html>