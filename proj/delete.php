<?php
session_start();
  $con = mysqli_connect("localhost","root","","inventry");
        
if(isset($_POST['submitDeleteId'])){
	$id=$_POST['id'];
	$qry1=mysqli_query($con,"delete from dealerdata where id='$id'");
	if($qry1){
		$_SESSION['active']=2;
		header("location:register.php");
	}
}


?>