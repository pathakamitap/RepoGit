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

</style>
</head>
<body>
  <div class="container-fluid">
    <div class="panel panel-default" id="panel">
      <h1><div class="panel-heading">Admin Pannel</div></h1>
    </div>
    <div class="container">

<h3>Update Dealership Data</h3>
<?php session_start();
$_SESSION['active']=3;
$con = mysqli_connect("localhost","root","","inventry");
          if(isset($_POST['submitUpdateId'])){
              $id=$_POST['id'];
              $qry1=mysqli_query($con,"select * from dealerdata where id='$id'");
              $data=mysqli_fetch_assoc($qry1);
              $name= $data['DealershipName'];
              $location= $data['Location'];
              $phone= $data['Phone'];
              $email= $data['Email'];
              $image= $data['Image'];
            }
  ?>
   <form action="updateDatabase.php" method="post" enctype="multipart/form-data" >
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="name">Dealership Name:</label>
                    <input type="text" class="form-control" name="dealershipName" value="<?php echo $name ?>" required="required">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Location:</label>
                    <input type="text" class="form-control" name="dealershipLocation" value="<?php echo $location ?>" required="required">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Phone Number:</label>
                    <input type="text" class="form-control" name="dealershipPhone" value="<?php echo $phone ?>" required="required">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Email:</label>
                    <input type="text" class="form-control" name="dealershipEmail" value="<?php echo $email ?>" required="required">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Pics Upload:</label><br> 
                  <img src="images/<?php echo $image ?>" style="width:100px;height: 100px;">
                  <input type="file" name="image" >
                  <input type="hidden" name="imageName" value="<?php echo $image; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
          </div>

          <div class="col-lg-12">
          <center>  <input type="submit" class="btn btn-primary" name="submitUpdateDetails" value="Update"></center>
          </div>
          </form>
        </div>
      </div>
   </body>
   </html>