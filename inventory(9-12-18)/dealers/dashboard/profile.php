<?php include_once("header.php"); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
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
    include_once("../../Database.php");
     $qry1=mysqli_query($con,"select * from dealerdata where id='$id'");
    while($data=mysqli_fetch_assoc($qry1)){
        $dealershipname=$data['DealershipName'];
        $image=$data['Image'];
        $dealername=$data['DealerName'];
        $location=$data['Location'];
        $phone=$data['Phone'];
        $email=$data['Email'];
         $profilePic=$data['profilePic'];
    }
    // $qry2=mysqli_query($con,"SELECT profilePic FROM `dealersaccount` where id='$id' ");
    // while($data=mysqli_fetch_assoc($qry2)){
    //    // $dealershipname=$data['DealershipName'];
    //    // $image=$data['Image'];
    //     $profilePic=$data['profilePic'];
    //     //$dealername=$data['DealerName'];

    // }
        ?>
              
                  <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Profile</strong></div>
                                    <div class="card-body">
                                    
                                         <form action="updateProfile.php" method="post" enctype="multipart/form-data" >
            
            <div class="form-group">
                  <label for="name">Dealership Name:</label>
                    <input type="text" class="form-control" name="dealershipName" value="<?php echo $dealershipname ?>" required="required">
            </div>
              
            <div class="form-group">
                  <label for="name">Dealer Name:</label>
                    <input type="text" class="form-control" name="dealerName" value="<?php echo $dealername ?>" required="required">
            </div>
          
         
            <div class="form-group">
                  <label for="name">Location:</label>
                    <input type="text" class="form-control" name="dealershipLocation" value="<?php echo $location ?>" required="required">
            </div>
          
          
            <div class="form-group">
                  <label for="name">Phone Number:</label>
                    <input type="text" class="form-control" name="dealershipPhone" value="<?php echo $phone ?>" required="required">
            </div>
        
            <div class="form-group">
                  <label for="name">Profile Pic:</label><br> 
                    <?php if(isset($profilePic) && $profilePic !="default"){ ?>
                        <a href="#">
                        <img src="images/profilePics/<?php echo $profilePic ?>" style="width:100px;height: 100px;">
                        
                        <input type="hidden" name="profilePicName" value="<?php echo $profilePic; ?>">
                            </a>                        
                    <?php  }else{ ?>
                        <a>
                         <i id="fa-user-in" class="far fa-user" style="width:100px;height: 100px;"></i>
          
                        </a>
                     <?php     }     ?>
                 <input type="file" name="profilePic" >
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
        
            <div class="form-group">
                  <label for="name">Dealership Pic:</label><br> 
                  <img src="../../images/<?php echo $image ?>" style="width:100px;height: 100px;">
                  <input type="file" name="dealershipImage" >
                  <input type="hidden" name="dealershipImageName" value="<?php echo $image; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
         

          <div class="col-lg-12">
          <center>  <input type="submit" class="btn btn-primary" name="submitUpdateDetails" value="Submit"></center>
          </div>
          </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <?php
 if(isset($_SESSION['passwordchanged'])){
  unset($_SESSION['passwordchanged']);
  echo "<script>alert('Password changed successfully');</script>";

}
   ?>
                                    <div class="card-header">
                                        <strong>Change Password</strong>    
                                    </div>
                                    <div class="card-body card-block">
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
                    <?php include_once("footer1.php"); ?>
                </div>
</div>
</div>

        </div>

    </div>

    <!-- Jquery JS-->
   <?php include_once("footer2.php"); ?>

</body>

</html>
<!-- end document-->
