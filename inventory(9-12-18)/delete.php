<?php
session_start();
include_once("Database.php");
        
if(isset($_POST['submitDeleteId'])){
	$id=$_POST['id'];
	$qry1=mysqli_query($con,"delete from dealerdata where id='$id'");
	if($qry1){
		$qry2=mysqli_query($con,"drop table IF EXISTS $id");
		if($qry2){
		$_SESSION['active']=2;
		header("location:register.php");
	}
	else{
		$_SESSION['active']=2;
		header("location:register.php");
		//dealerdata deleted but dealeraccount table is not deleted.
	}
}else{
		//data not deleted.
		header("location:register.php");
	}
}


?>