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
 if(isset($_SESSION['passwordchanged'])){
  unset($_SESSION['passwordchanged']);
  echo "<script>alert('Password changed successfully');</script>";

}
   ?>
  <div class="container-fluid">
    <div class="panel panel-success" id="panel">
      <h1><div class="panel-heading">Change Password</div></h1>
      <form method="post" action="dealerLogin.php" style="float:right;">
        <button type="submit" name="logout" >Logout</button>
      </form>
    </div>
    <div class="container">
      <form action="authenticateDealer.php" method="post" onsubmit="return validatepass()">
        <div class="form-group">
          <label for="name">User name:</label>
          <input type="text" class="form-control" id="name" name="usrname" placeholder="User Name" required="required" value=<?php if(isset($_SESSION['otpVerified'])){echo $_SESSION['username']; ?> readonly <?php } ?>  >
          <p>
          <?php 
            if(isset($_SESSION['errorusrname'])){
              echo "invalid username";
              unset($_SESSION['errorusrname']);
            }
          ?>
        </p>
        </div>
<?php if(isset($_SESSION['otpVerified'])){}else{ echo '
        <div class="form-group">
          <label for="pwd">Current Password:</label>
          <input type="password" class="form-control" id="pwd" name="password" placeholder="Password"  required="required">
          <p>';
            if(isset($_SESSION["errorpassword"])){
              echo "invalid password";
              unset($_SESSION["errorpassword"]);
            }
            echo '
        </p>
        </div>';
        } 
      
?>
        <div class="form-group">
          <label for="pwd">New Password:</label>
          <input type="password" class="form-control" id="pwd" name="passwordnew" placeholder="New Password" onkeyup="check1(this.value)" required="required" type="tel" minlength="6">
          <p id="txt1">  </p>
        </div>
        <div class="form-group">
          <label for="pwd">Confirm New Password:</label>
          <input type="password" class="form-control" id="pwd" name="passwordnewcon" placeholder="Confirm New Password" onkeyup="check2(this.value)" required="required">
          <p id="txt2"></p>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-default" name="DchangePasswordSubmit">Submit</button>
        </div>
       
      </form>
      <form action="dealerLogin.php" method="post">
       <div class="col-lg-6">
            <button type="submit" class="btn btn-default" name="DcancelChangePassword">Cancel</button>
        </div>
    </form>
<script>
function check1(str) {
  x = str;
   
  if (str.length == 0) { 
    document.getElementById("txt1").innerHTML = "";
    return;
  }else if(str.length <6 ){
    document.getElementById("txt1").innerHTML = "password should containat least 6 characters";
    document.getElementById("txt1").style.color="red";
  }else if(str.length <8){
    document.getElementById("txt1").innerHTML = "weak password";
    document.getElementById("txt1").style.color="orange"; 
  }else{
    document.getElementById("txt1").innerHTML = "strong password";
    document.getElementById("txt1").style.color="green";
  }
}

function check2(str){
  y=str;
    if(str != x ){
    document.getElementById("txt2").innerHTML = "password do not match";
    document.getElementById("txt2").style.color="red";
}else if(str == x){
document.getElementById("txt2").innerHTML = "";

}else{

}
}
function validatepass(){
  if(x==y){
    return true;
  }else{
    alert("password should be match");
    return false;
  }
}

</script>


</body>
</html>