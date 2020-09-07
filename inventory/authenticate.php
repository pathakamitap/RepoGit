<?php
session_start();
// Check connection
/*if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
  }
  */
if(isset($_POST['loginSubmit'])){
	loginUser();
	exit();
}elseif(isset($_POST['changePasswordSubmit']) && isset($_SESSION['otpVerified'])){
	resetPassword();
	exit();
}elseif(isset($_POST['changePasswordSubmit'])){
	changePassword();
	exit();
}
elseif(isset($_POST['generateOTP'])){
	generateOTP();
	exit();
}elseif(isset($_POST['alreadyhaveOTP'])){	
	alreadyhaveOTP();
	exit();
}elseif(isset($_POST['submitOTP'])){
	verificationOTP();
}


function loginUser(){
	
  $name=$_POST['usrname'];
  $pass=$_POST['password'];
include("Database.php");

  $qry1=mysqli_query($con,"select * from authentication where username='$name'");
  if (mysqli_num_rows($qry1) > 0)
  {
	$qry2=mysqli_query($con,"select * from authentication where username='$name'");
 		while($row=mysqli_fetch_assoc($qry2)){
				$password= $row['password'];
			}
		if($pass==$password){
			
			header("location:register.php");
		}else{
			$_SESSION['errorpassword']=1;
			header("location:login.php");
		}
  
  }else{
  		$_SESSION['errorusrname']=1;
  		header("location:login.php");
  	}

mysqli_close($con);
}

function changePassword(){
	$name=$_POST['usrname'];
	$pass=$_POST['password'];
	$newpass=$_POST['passwordnew'];
include("Database.php");

  $qry1=mysqli_query($con,"select * from authentication where username='$name'");
  if (mysqli_num_rows($qry1) > 0)
  {
	$qry2=mysqli_query($con,"select * from authentication where username='$name'");
 		while($row=mysqli_fetch_assoc($qry2)){
				$password= $row['password'];
			}
		if($pass==$password){
			$qry3=mysqli_query($con,"update authentication set password='$newpass' where username='$name'");
			if($qry3){
				$_SESSION['passwordchanged']=1;
				header("location:changepassword.php");
			}else{
				echo "error";
			}
			
		}else{
			$_SESSION['errorpassword']=2;
			header("location:changepassword.php");
		}
  
  }else{
  		echo $name;
  		$_SESSION['errorusrname']=1;
  		header("location:changepassword.php");
  	}

mysqli_close($con);

}
 
 function generateOTP(){
	$name=$_POST['usrname'];
	include("Database.php");

  $qry1=mysqli_query($con,"select * from authentication where username='$name'");
  if (mysqli_num_rows($qry1) > 0)
  {
  	$otp=generationOfOtp($name);
  	$_SESSION['generateOTP']=1;
  	//header("location:resetPassword.php");
  }
  else{
$_SESSION['errorusrname']=1;
header("location:resetPassword.php");
  }

}

 function alreadyhaveOTP(){
	$name=$_POST['usrname'];
	include("Database.php");

  $qry1=mysqli_query($con,"select * from authentication where username='$name'");
  if (mysqli_num_rows($qry1) > 0)
  {
  		$_SESSION['username']=$name;
  		header("location:verifyOTP.php");
  }else{
  	$_SESSION['errorusrname']=1;
  	header("location:resetPassword.php");
  }

}

function generationOfOtp($name){
	include("Database.php");
	$qry1=mysqli_query($con,"select * from otp");
	$i=0;
	while($data = mysqli_fetch_assoc($qry1)){
		$a[$i]=$data['var'];
		$i++;
	}

	$w=((3*$a[0])+7)%10;
	$x=((2*$a[1])+5)%10;
	$y=((37*$a[2])+9)%10;
	$z=((35*$a[3])+3)%10;

	$_SESSION['otp']= $w.$x.$y.$z;

	mysqli_query($con,"update otp set var=$w where serial_no=1");
	mysqli_query($con,"update otp set var=$x where serial_no=2");
	mysqli_query($con,"update otp set var=$y where serial_no=3");
	mysqli_query($con,"update otp set var=$z where serial_no=4");

	$qry2=mysqli_query($con,"select email from authentication where username='$name'");
	while($data2=mysqli_fetch_row($qry2)){
		$_SESSION['to']= $data2[0];
	}

		$subject="Regarding reset your password";
		$msg="To reset your password the OTP is:".$_SESSION['otp'];
		mail($_SESSION['to'],$subject,$msg);
		if(mail){
			$_SESSION['ackmail']=1;
		}
		header("location:resetPassword.php");
	
		
}

function verificationOTP(){
	$otp=$_POST['otp'];
	/*
	$con = mysqli_connect("localhost","root","","inventry");
	$qry1=mysqli_query($con,"select * from otp");
	$i=0;
	while($data=mysqli_fetch_assoc($qry1)){
		$otp[$i++]=$data['var'];
	}
	$otpDatabase=
	*/
	if($otp==$_SESSION['otp']){
		$_SESSION['otpVerified']=1;
		header("location:changePassword.php");
	}else{
		$_SESSION['errorotp']=1;
		header("location:verifyOTP.php");
	}
}
function resetPassword()
{
	$name=$_POST['usrname'];
	$newpass=$_POST['passwordnew'];
include("Database.php");

  $qry1=mysqli_query($con,"select * from authentication where username='$name'");
  if (mysqli_num_rows($qry1) > 0)
  {
	$qry3=mysqli_query($con,"update authentication set password='$newpass' where username='$name'");
		if($qry3){
			unset($_SESSION['otpVerified']);
			header("location:login.php");
		}else{
			echo "error";
		}
	}
mysqli_close($con);

}

?>