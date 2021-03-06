<!DOCTYPE html>
<html lang="en" style="background-color: #f9fafb">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>


</head>

<body class="animsition">
     <?php 
    session_start();
if(!isset($_SESSION['dealerid'])) {
    $loginError = "You are not logged in.";
    header("location:index.php");
    exit();
}

    $id=$_SESSION['dealerid'];
    $con = mysqli_connect("localhost","root","","inventry");
    $qry1=mysqli_query($con,"select * from dealerdata where id='$id'");
    while($data=mysqli_fetch_assoc($qry1)){
        $dealershipname=$data['DealershipName'];
        $image=$data['Image'];
        $dealername=$data['DealerName'];

    }
    $qry2=mysqli_query($con,"select * from dealersaccount where id='$id'");
    while($data1=mysqli_fetch_assoc($qry2)){
        $profilePic=$data1['profilePic'];
    }

        ?>
    <div class="page-wrapper" >
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                       
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                         <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="Calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="Edit-Delete_a_Vehicle.php">
                                <i class="fas fa-table"></i>Edit/Delete a Vehicle</a>
                        </li>
                        <li>
                            <a href="Vehicle_with_pending_Info.php">
                                <i class="far fa-check-square"></i>Vehicle with pending Info</a>
                        </li>
                      
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Add A Vehicle</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="vindecode.php">Vin Decode</a>
                                </li>
                                <li>
                                    <a href="manually.php">Manually</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block"  id="sidebartoggle1"  style="position: absolute;height:100%;overflow: hidden;">
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar" >
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a class="js-arrow" href="index.php">
                               
                               <i id="sidebaricon" class="fas fa-tachometer-alt"></i><span id="sidebarcontent1">Dashboard</span>
                                
                            </a>
                        </li>
                        <li>
                            <a href="Calendar.php">
                                <i id="sidebaricon" class="fas fa-calendar-alt"></i><span id="sidebarcontent1">Calendar</span></a>
                        </li>
                        <li>
                            <a href="Edit-Delete_a_Vehicle.php">
                                <i id="sidebaricon" class="fas fa-table"></i><span id="sidebarcontent1">Edit/Delete a Vehicle</span></a>
                        </li>
                        <li>
                            <a href="Vehicle_with_pending_Info.php">
                               <i id="sidebaricon" class="far fa-check-square"></i><span id="sidebarcontent1">Vehicle with pending Info</span></a>
                        </li>
                      
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i id="sidebaricon" class="fas fa-copy"></i><span id="sidebarcontent1">Add a vehicle</span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="vindecode.php"><span id="sidebarcontent1">Vin Decode</span></a>
                                </li>
                                <li>
                                    <a href="manually.php"><span id="sidebarcontent1">Manually</span></a>
                                </li>
                            </ul>
                        </li>
                     
                    </ul>
                </nav>
            </div>
        </aside>

         <aside class="menu-sidebar d-none d-lg-block"  id="sidebartoggle">
          <div class="logo">
                <a href="index.php">
                    <span id="big-logo" ><img id="big-logo-image"  src="../../images/<?php echo $image ?>" alt="logo" style="width:40px;height:40px;border-radius: 50%" /><span id="logo-name"><?php echo " &nbsp;".$dealershipname ?></span></span>
                    
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a class="js-arrow" href="index.php">
                               
                                <i id="sidebaricon" class="fas fa-tachometer-alt"></i></span><span id="sidebarcontent">Dashboard</span>
                                
                            </a>
                        </li>
                        <li>
                            <a href="Calendar.php">
                                <i id="sidebaricon" class="fas fa-calendar-alt"></i><span id="sidebarcontent">Calendar Schedule</span></a>
                        </li>
                        <li>
                            <a href="Edit-Delete_a_Vehicle.php">
                                <i id="sidebaricon" class="fas fa-table"></i><span id="sidebarcontent">Edit/Delete a Vehicle</span></a>
                        </li>
                        <li>
                            <a href="Vehicle_with_pending_Info.php">
                                <i id="sidebaricon" class="far fa-check-square"></i><span id="sidebarcontent">Vehicle with pending Info</span></a>
                        </li>
                      
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i id="sidebaricon" class="fas fa-copy"></i><span id="sidebarcontent">Add a vehicle</span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="vindecode.php"><span id="sidebarcontent">Vin Decode</span></a>
                                </li>
                                <li>
                                    <a href="manually.php"><span id="sidebarcontent">Manually</span></a>
                                </li>
                            </ul>
                        </li>
                     
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container" id="page-container" style="position: absolute;right:0px;">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid" id="header">
                        <div class="header-wrap">
                            <div id="toggle-icon">
                            <div id="toggleicon1"></div>
                            <div id="toggleicon1"></div>
                            <div id="toggleicon1"></div>
                        </div>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image brds-50p">
                                            <img src="images/profilePics/<?php echo $profilePic ?>" alt="Technetty.com"  />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $dealername ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/profilePics/<?php echo $profilePic ?>" alt="Technetty.com" style="width:60px;height:60px;border-radius: 50%" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $dealername ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $dealershipname ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="dealerProfile.php">
                                                        <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" >
              
                    <div class="container-fluid" style="padding:0px;margin:0px">
                        
                        <div id="contentbox">
                          <div class="container-fluid"  style="padding:0px;margin:0px;">
                            <div class="row">
                              <div class="col-lg-6" style="padding:20px 0px;margin:0px;">
                                  <div class="container-fluid" style="padding:0px;margin:0px;border:1px #efefef solid">
    <div class="panel panel-default" id="panel">
      <h2><div class="panel-heading">Edit Profile</div></h2>
    </div>
    <div class="container">
 <?php 
if(!isset($_SESSION['dealerid'])) {
    $loginError = "You are not logged in.";
    header("location:index.php");
    exit();
}
if(isset($_SESSION['updateProfile']) && $_SESSION['updateProfile']==1){
  echo "<script> alert('Profile has been updated')</script>";
}elseif(isset($_SESSION['updateProfile']) && $_SESSION['updateProfile']==0){
  echo "<script> alert('Erroe in Profile Updation')</script>";
}
unset($_SESSION['updateProfile']);
    $id=$_SESSION['dealerid'];
    $con = mysqli_connect("localhost","root","","inventry");
    $qry1=mysqli_query($con,"SELECT dealerdata.*,dealersaccount.profilePic FROM `dealersaccount`,`dealerdata` where dealerdata.id='$id'");
    while($data=mysqli_fetch_assoc($qry1)){
        $dealershipname=$data['DealershipName'];
        $image=$data['Image'];
        $profilePic=$data['profilePic'];
        $dealername=$data['DealerName'];
        $location=$data['Location'];
        $phone=$data['Phone'];
        $email=$data['Email'];

    }
        ?>
        <br><br>
   <form action="updateProfile.php" method="post" enctype="multipart/form-data" >
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="name">Dealership Name:</label>
                    <input type="text" class="form-control" name="dealershipName" value="<?php echo $dealershipname ?>" required="required">
              </div>
              </div>
              <div class="col-lg-6">
              <div class="form-group">
                  <label for="name">Dealer Name:</label>
                    <input type="text" class="form-control" name="dealerName" value="<?php echo $dealername ?>" required="required">
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
                  <label for="name">Profile Pic:</label><br> 
                  <img src="images/profilePics/<?php echo $profilePic ?>" style="width:100px;height: 100px;">
                  <input type="file" name="profilePic" >
                  <input type="hidden" name="profilePicName" value="<?php echo $profilePic; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                  <label for="name">Dealership Pic:</label><br> 
                  <img src="../../images/<?php echo $image ?>" style="width:100px;height: 100px;">
                  <input type="file" name="dealershipImage" >
                  <input type="hidden" name="dealershipImageName" value="<?php echo $image; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
          </div>

          <div class="col-lg-12">
          <center>  <input type="submit" class="btn btn-primary" name="submitUpdateDetails" value="Submit"></center>
          </div>
          </form>
        </div>
      </div>
                              </div>
                              <div class="col-lg-6" style="padding:20px 0px;margin:0px;">  
                                <div class="container-fluid" style="padding:0px;margin:0px;border:1px #efefef solid">
 <?php
 if(isset($_SESSION['passwordchanged'])){
  unset($_SESSION['passwordchanged']);
  echo "<script>alert('Password changed successfully');</script>";

}
   ?>
  <div class="container-fluid">
    <div class="panel panel-success" id="panel">
      <h2><div class="panel-heading">Change Password</div></h2>
    </div>
    <br><br>
    <div class="container">
      <form action="../authenticateDealer.php" method="post" onsubmit="return validatepass()">
        <div class="form-group">
          <?php $_SESSION['usrname']=$email; ?>

        </div>

        <div class="form-group">
          <label for="pwd">Current Password:</label>
          <input type="password" class="form-control" id="pwd" name="password" placeholder="Password"  required="required">
          <p style="color:red">
          <?php  if(isset($_SESSION["errorpassword"])){
              echo "*invalid password";
              unset($_SESSION["errorpassword"]);
            }
            ?>
        </p>
        </div>
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
            <button type="submit" class="btn btn-primary" name="DchangePasswordSubmit">Submit</button>
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

                              </div>
                            </div>

                        </div>
             </div>
           </div>
        </div>

            
            
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->


</div>
</div>
                       <!--footer-->
            <div class="container-fluid" id="footer" >
            <div class="footer" id="footer-content">
            <center>&copy All rights are reserved to technetty.com</center>
        </div>
        </div>
</div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
$(document).ready(function(){
    $i=0;
$("#toggle-icon").click(function(e){
    e.preventDefault();
    if($i%2==0){
        $("#sidebartoggle").animate({with: '75px'});
       $("#page-container").animate({width: '94.39%'});
        $(".header-desktop").animate({left: '74px'});
        $("#sidebartoggle").toggleClass("is-collapse",'5000');
        
        $i++;
        $i=$i%2;
    }else{
         $("#sidebartoggle").animate({with: '250px'});
        $("#page-container").animate({width: '81.55%'});
         $(".header-desktop").animate({left: '249px'});
         $("#sidebartoggle").toggleClass("is-collapse");

        
        $i++;
        $i=$i%2;
    }
    });
});
   // $("#sidebartoggle").toggleClass("is-collapse",'5000');
    // $("#page-container").toggleClass("is-collapsed",'5000');
    // });
/*
$(document).ready(function(){
    $("#toggle-icon").click(function(){
        $("#menu-sidebar").animate({
            width: 'toggle'
        });
   });

});
*/
</script>



</body>

</html>
<!-- end document-->


