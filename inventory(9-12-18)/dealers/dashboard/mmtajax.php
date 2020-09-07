<?php 
include_once("../../Database.php");
session_start();
if(isset($_GET['make'])){
$make=$_GET['make'];

$_SESSION['mk']=$make;
}
if(isset($_GET['model'])){
$model=$_GET['model'];
}
if(isset($_GET['make'])){
if($make!=null){
	$qry=mysqli_query($con,"select Distinct model from vehicles where make='$make'");
	echo " <select id='modelddd' onchange='modelselected()' name='selectSm' class='form-control-sm form-control'>	<option> select </option>	
	";

	while($data=mysqli_fetch_assoc($qry)){ ?>
		<option value="<?php echo $data['model']; ?>">  <?php echo $data['model'] ; ?> </option>
	<?php }
echo "</select>";

}
}

if(isset($_GET['model'])){
if($model!=null){
	$make=$_SESSION['mk'];
	$qry1=mysqli_query($con,"select Distinct trim from vehicles where model='$model' and make='$make'");
	echo "<select id='trimddd' name='selectSm' class='form-control-sm form-control'>
	<option> select </option>
	";
	while($data1=mysqli_fetch_assoc($qry1)){
		echo "<option>"; echo $data1['trim'] ; echo "</option>";
	}
echo "</select>";

}
}


?>