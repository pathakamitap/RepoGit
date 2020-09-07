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
#labelPassword{
	display:block;
}
#password{
	display: inline;
	width:84%;
}
#generatePassword{
	height:34px;
}
.panel{
	padding:20px;
}
table,th,td{
	border:2px blue solid;
}
th,td{
	padding:8px;
}
table{
	width:100%;
}
</style>
</head>
<body>
	<?php session_start(); 
	if(isset($_SESSION['dealerdata'])){
		echo "<script>alert('data inserted successfully');</script>";
		unset($_SESSION['dealerdata']);
	} ?>
  <div class="container-fluid">
    <div class="panel panel-default" id="panel">
      <h1><div class="panel-heading">Admin Pannel</div></h1>
    </div>
    <div class="container">

  <h2>Register Dealer</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1.Insert Dealer Data</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">

        	<form action="InsertDealerData.php" method="post" enctype="multipart/form-data" >
        		<div class="col-lg-6">
        			<div class="form-group">
          				<label for="name">Dealership Name:</label>
          					<input type="text" class="form-control" name="dealershipName" placeholder="Dealership Name" required="required">
        			</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
          				<label for="name">Location:</label>
          					<input type="text" class="form-control" name="dealershipLocation" placeholder="Location" required="required">
        			</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
          				<label for="name">Phone Number:</label>
          					<input type="text" class="form-control" name="dealershipPhone" placeholder="Phone Number" required="required">
        			</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
          				<label for="name">Email:</label>
          					<input type="text" class="form-control" name="dealershipEmail" placeholder="Email" required="required">
        			</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
          				<label for="name">Pics Upload:</label><br>	
          				<input type="file" name="image" required="required">
        			</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="form-group">
          				<label for="name" id="labelPassword">Password:</label>
          					<input type="text" id="password" class="form-control" name="dealershipPassword" placeholder="Password" required="required">
          					<input type="button" id="generatePassword" name="generatePassword" value="Generate">
        			</div>
        	</div>
        	<div class="col-lg-12">
        	<center>	<input type="submit" class="btn btn-primary" name="submitDealerDetails" value="Submit"></center>
        	</div>
        	</form>
    </div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2.Delete Dealer Data</a>
        </h4>
      </div>

      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<table>
        		<tr>
        			<th>Serial Number</th>
        			<th>Dealer Name</th>
        			<th>Dealer Location</th>
        			<th>Dealer Phone Number</th>
        			<th>Dealer Email</th>
        			<th>Dealership Image</th>
        			<th>Delete</th>
        		</tr>
        		<?php 
      		$con = mysqli_connect("localhost","root","","inventry");
   			$qry1=mysqli_query($con,"select * from dealerdata");
   			$i=1;
   			while($data=mysqli_fetch_assoc($qry1)){
         ?>
        		<tr>
        			<td><?php echo $i++;  ?></td>
        			<td><?php echo $data['Name'];  ?></td>
        			<td><?php echo $data['Location'];  ?></td>
        			<td><?php echo $data['Phone'];  ?></td>
        			<td><?php echo $data['Email'];  ?></td>
        			<td><img src="images/<?php echo $data['Image'] ?>" style="width:100px;height: 100px;border:1px red groove"></td>
        			<td><center><a href="#" class="glyphicon glyphicon-trash"></a></center></td>

        		</tr>

        <?php }	?>
        	</table>

    	</div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3.Update Dealer Data</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        	
        </div>
      </div>
    </div>
  </div> 
</div>




    </div>


</body>
</html>