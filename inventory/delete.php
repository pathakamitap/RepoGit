<?php
session_start();
include_once("Database.php");
        
if(isset($_POST['submitDeleteId'])){
	$id=$_POST['id'];
	$qry1=mysqli_query($con,"delete from dealerdata where id='$id'");
	if($qry1){
		$_SESSION['active']=2;
		header("location:register.php");
	}else{
		header("location:register.php");
	}
}


?>