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
  <?php session_start();
  if(isset($_POST['cancelChangePassword'])){
    unset($_SESSION['otpVerified']);
  }

   ?>
  <div class="container-fluid">
    <div class="panel panel-success" id="panel">
      <h1><div class="panel-heading">Login</div></h1>
    </div>
    <div class="container">
      <form action="authenticate.php" method="post">
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
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required="required">
          <p>
           <?php 
            if(isset($_SESSION['errorpassword'])){
              echo "invalid password";
              unset($_SESSION['errorpassword']);
            }
          ?>
        </p>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-default" name="loginSubmit">Submit</button>
          </div>
            <div class="col-sm-6">
              <div id="right">
                <div class="col-12">
                  <label>Change Password ? </label><a href="changepassword.php" > change</a>
                </div>
                <div class="col-12">
                  <label>Forgot Password ? </label><a href="resetPassword.php" > reset</a>
               </div>
              </div> 
          </div>
        </div>
      </form>
      <?php session_destroy();  ?>
    </div>  



  </div>
</body>
</html>
