<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function fun(){
  document.getElementById("password").value = (Math.random()+1).toString(36).substring(6);
}
function deleteData(){
var txt;
var r = confirm("Are you sure you want to delete it ?");
if (r == true) {
   return true;
} else {
    return false;
}
}

</script>

<style>

.container-fluid{
  padding:0px;
}
.container-fluid #panel{
  background-color:lightgray;
}
.btn{
  width:200px;
}
#right{
  float:right;
}
#labelPassword{
  display:block;
}
#password{
  display: inline;
  width:79%;
}
#generatePassword{
  height:34px;
}
#leftdiv{
  padding:0px;
  margin:0px;
  height: 600px;
}
#leftslider{
  height:100%;
  position: fixed;
  padding:0 40px 0 40px;
}

#leftContainer{
 padding-top: 120px;
}
  .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
table,th,td{
  border:2px gray solid;
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
  <div class="container-fluid" id="header">
    <div class="panel panel-default" id="panel" data-spy="affix" style="box-sizing: border-box;" >
      <h1 style="width:60%;"><div class="panel-heading" >Admin Pannel</div></h1>
      <form method="post" action="login.php" style="float:right;">
        <button type="submit" name="logout" >Logout</button>
      </form>
    </div>
  </div>
      <div class="container-fluid" id="leftContainer">
  <div class="col-md-3" id="leftdiv">
    <div class="panel" id="leftslider">
      <?php if(isset($_COOKIE['flag'])&& $_COOKIE['flag']=='1' ){$_SESSION['active']=1;} ?>
      <?php if(isset($_COOKIE['flag'])&& $_COOKIE['flag']=='2' ){$_SESSION['active']=2;} ?>
      <?php if(isset($_COOKIE['flag'])&& $_COOKIE['flag']=='3' ){$_SESSION['active']=3;} ?>
   <h2>Register Dealer</h2>
   <ul class="nav nav-pills nav-stacked">
    <li id="mylink0" <?php if(!isset($_SESSION['active'])){ ?> class="active" <?php } ?> ><a data-toggle="pill" href="#home">Home</a></li>
    <li id="mylink1" <?php if(isset($_SESSION['active']) && $_SESSION['active']==1){ ?> class="active" <?php } ?> ><a data-toggle="pill" href="#insert">Insert Dealer Data</a></li>
    <li id="mylink2" <?php if(isset($_SESSION['active']) && $_SESSION['active']==2){ ?> class="active" <?php } ?>><a data-toggle="pill" href="#delete">Delete Dealer Data</a></li>
    <li id="mylink3" <?php if(isset($_SESSION['active']) && $_SESSION['active']==3){ ?> class="active" <?php } ?>><a data-toggle="pill" href="#update">Update Dealer Data</a></li>
  </ul>
  </div>
</div>

  <div class="tab-content">
    <div id="home" <?php if(!isset($_SESSION['active'])){ ?> class="tab-pane fade in active" <?php }else{  ?> class="tab-pane fade" <?php } ?> >
      <h3>  HOME</h3>
    <p>hello i am home content</p>
    </div>
    <div id="insert" <?php if(isset($_SESSION['active']) && $_SESSION['active']==1){ ?> class="tab-pane fade in active" <?php }else{  ?> class="tab-pane fade" <?php } ?> >
      
     <div class="col-md-9">
      <h3>Insert Dealership Data</h3>
   <form action="InsertDealerData.php" method="post" enctype="multipart/form-data" >
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="name">Dealership Name:</label>
                    <input type="text" class="form-control" name="dealershipName" placeholder="Dealership Name" required="required">
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <label for="name">Dealer Name:</label>
                    <input type="text" class="form-control" name="dealerName" placeholder="Dealer Name" required="required">
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
                  <div style="padding: 0;margin:0px">
                    <input id="telNo" class="form-control" name="dealershipPhone1" type="tel" placeholder="xxx" required
           pattern="[0-9]{3}" style="width:29%;display: inline" maxlength="3">
            <input id="telNo" class="form-control" name="dealershipPhone2" type="tel" placeholder="xxx" required
           pattern="[0-9]{3}" style="width:29%;display: inline" maxlength="3">
            <input id="telNo" class="form-control" name="dealershipPhone3" type="tel" placeholder="xxxx" required
           pattern="[0-9]{4}" style="width:40%;display: inline" maxlength="4">
            
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Email:</label>
                    <input type="email" class="form-control" name="dealershipEmail" placeholder="Email" required="required">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Pics Upload:</label><br>  
                  <input type="file" name="image" required="required" style="border:12px white solid">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <?php include_once('random.php');
                $pass=rand_string(6);
                ?>
                  <label for="name" id="labelPassword">Password:</label>
                    <input type="text" id="password" class="form-control" name="dealershipPassword" required="required" placeholder="password" >
                    <input type="button" id="generatePassword" name="generatePassword" value="Generate" onclick="fun()">
                    <p id="demo"></p>
              </div>
             
          </div>
          <div class="col-lg-12">
          <center>  <input type="submit" class="btn btn-primary" name="submitDealerDetails" value="Submit"></center>
          </div>
          </form>

   
   </div>
    </div>
    <div id="delete" <?php if(isset($_SESSION['active']) && $_SESSION["active"]==2){ ?> class="tab-pane fade in active" <?php }else{  ?> class="tab-pane fade" <?php } ?> >
     
    <div class="col-md-9">
       <h3>Delete Dealership Data</h3>
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
           include("Database.php");
          $qry1=mysqli_query($con,"SELECT COUNT(*) as `total` FROM `dealerdata`");
          $total=mysqli_fetch_assoc($qry1);
          $totalArticles=$total['total'];
          $articlesPerPage=3;
          $totalPages = ceil($totalArticles / $articlesPerPage);
          // Check that the page number is set.
if(!isset($_GET['page'])){
    $_GET['page'] = 0;
}else{
    // Convert the page number to an integer
    $_GET['page'] = (int)$_GET['page'];
}

// If the page number is less than 1, make it 1.
if($_GET['page'] < 1){
    $_GET['page'] = 1;
    // Check that the page is below the last page
}else if($_GET['page'] > $totalPages){
    $_GET['page'] = $totalPages;
}
echo '<center><ul class="pagination">';

foreach(range(1, $totalPages) as $page){
    // Check if we're on the current page in the loop
    if($page == $_GET['page']){
        echo '<li  class="active"><a href="#">' . $page . '</a></li>';
    }else if($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)){
        echo '<li> <a id="mylink" href="?page=' . $page . '">' . $page . '</a></li>';
    }
}
echo "</ul></center>";
// Calculate the starting number
$startArticle = ($_GET['page'] - 1) * $articlesPerPage;
$i=$startArticle+1;
// SQL Query
$sql = 'SELECT * FROM `dealerdata` LIMIT ' . $startArticle . ', ' . $articlesPerPage;
$qry3=mysqli_query($con,$sql);
        while($data=mysqli_fetch_assoc($qry3)){
         ?>
            <tr>
              <td><?php echo $i++;  ?></td>
              <td><?php echo $data['DealershipName'];  ?></td>
              <td><?php echo $data['Location'];  ?></td>
              <td><?php echo $data['Phone'];  ?></td>
              <td><?php echo $data['Email'];  ?></td>
              <td><img src="images/<?php echo $data['Image'] ?>" style="width:100px;height: 100px;border:1px red groove"></td>
              <td>
              <form action="delete.php" method="post" onsubmit="return deleteData()">
                <input type="hidden" name="id" value="<?php echo $data['id']  ?>">
              <center><button type="submit" class="glyphicon glyphicon-trash" style="border:none;background-color:white" name="submitDeleteId"></button>
              </center>
              </form>
              </td>
            </tr>

        <?php } ?>
          </table>

          <?php echo '<center><ul class="pagination">';

foreach(range(1, $totalPages) as $page){
    // Check if we're on the current page in the loop
    if($page == $_GET['page']){
        echo '<li  class="active"><a href="#">' . $page . '</a></li>';
    }else if($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)){
        echo '<li> <a href="?page=' . $page . '">' . $page . '</a></li>';
    }
}
echo "</ul></center>";
?>
    </div>
    </div>
    <div id="update" <?php if(isset($_SESSION['active']) && $_SESSION['active']==3){ ?> class="tab-pane fade in active" <?php }else{  ?> class="tab-pane fade" <?php } ?> >
     
      <div class="col-md-9">
         <h3>Update Dealership Data</h3>
      <table>
            <tr>
              <th>Serial Number</th>
              <th>Dealer Name</th>
              <th>Dealer Location</th>
              <th>Dealer Phone Number</th>
              <th>Dealer Email</th>
              <th>Dealership Image</th>
              <th>Update</th>
            </tr>
            <?php 
          include("Database.php");

           $qry11=mysqli_query($con,"SELECT COUNT(*) as `total1` FROM `dealerdata`");
          $total1=mysqli_fetch_assoc($qry11);
          $totalArticles1=$total1['total1'];
          $articlesPerPage1=5;
          $totalPages1 = ceil($totalArticles1 / $articlesPerPage1);
          // Check that the page number is set.
if(!isset($_GET['page1'])){
    $_GET['page1'] = 0;
}else{
    // Convert the page number to an integer
    $_GET['page1'] = (int)$_GET['page1'];
}

// If the page number is less than 1, make it 1.
if($_GET['page1'] < 1){
    $_GET['page1'] = 1;
    // Check that the page is below the last page
}else if($_GET['page1'] > $totalPages){
    $_GET['page1'] = $totalPages;
}
echo '<center><ul class="pagination">';

foreach(range(1, $totalPages1) as $page){
    // Check if we're on the current page in the loop
    if($page == $_GET['page1']){
        echo '<li  class="active"><a href="#">' . $page . '</a></li>';
    }else if($page == 1 || $page == $totalPages1 || ($page >= $_GET['page1'] - 2 && $page <= $_GET['page1'] + 2)){
        echo '<li> <a href="?page1=' . $page . '">' . $page . '</a></li>';
    }
}
echo "</ul></center>";
// Calculate the starting number
$startArticle1 = ($_GET['page1'] - 1) * $articlesPerPage1;
$i=$startArticle1+1;
// SQL Query
$sql = 'SELECT * FROM `dealerdata` LIMIT ' . $startArticle1 . ', ' . $articlesPerPage1;
$qry3=mysqli_query($con,$sql);
        
 
        while($data=mysqli_fetch_assoc($qry3)){
         ?>
            <tr>
              <td><?php echo $i++;  ?></td>
              <td><?php echo $data['DealershipName'];  ?></td>
              <td><?php echo $data['Location'];  ?></td>
              <td><?php echo $data['Phone'];  ?></td>
              <td><?php echo $data['Email'];  ?></td>
              <td><img src="images/<?php echo $data['Image'] ?>" style="width:100px;height: 100px;border:1px red groove"></td>
              <td>
                <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']  ?>">
              <center><button type="submit" style="border:none;background-color:white;color:#337ab7;" name="submitUpdateId">update</button>
              </center>
              </form>
              </td>

            </tr>

        <?php } 
        unset($_SESSION['active']);
         ?>
          </table>
<?php 
          echo '<center><ul class="pagination">';

foreach(range(1, $totalPages1) as $page){
    // Check if we're on the current page in the loop
    if($page == $_GET['page1']){
        echo '<li  class="active"><a href="#">' . $page . '</a></li>';
    }else if($page == 1 || $page == $totalPages1 || ($page >= $_GET['page1'] - 2 && $page <= $_GET['page1'] + 2)){
        echo '<li> <a href="?page1=' . $page . '">' . $page . '</a></li>';
    }
}
echo "</ul></center>";
?>
    </div>

    </div>
    
  </div>
</div>
    </div>
    <script type="text/javascript">
      $("#mylink0").bind("click", function() {
      
    document.cookie="flag=0;path=/;";
    }); 
       $("#mylink1").bind("click", function() {
      
    document.cookie="flag=1;path=/;";
    }); 
        $("#mylink2").bind("click", function() {
        //  var d = new Date();
    //d.setTime(d.getTime() +1000);
   // var expires = "expires=" + d.toGMTString();
    document.cookie="flag=2;path=/;";
    }); 
         $("#mylink3").bind("click", function() {
         // var d = new Date();
   // d.setTime(d.getTime() +1000);
    //var expires = "expires=" + d.toGMTString();
    document.cookie="flag=3;path=/;";
    }); 
</script>
</body>
</html>