<?php
   session_start();
   $dealershipname=$_POST['dealershipName'];
   $dealername=$_POST['dealerName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $dealershipImage=$_POST['dealershipImageName'];
   $profilePicName=$_POST['profilePicName'];
   $id=$_POST['id'];
   echo "check point";
   if(isset($_FILES['dealershipImage']) && $_FILES['dealershipImage']['name'] !=""){
      $errors= array();
 $file_name = $_FILES['dealershipImage']['name']; 
 $file_size =$_FILES['dealershipImage']['size']; 
 $file_tmp =$_FILES['dealershipImage']['tmp_name'];
 $file_type=$_FILES['dealershipImage']['type']; 
 $file_ext=@strtolower(end(explode('.',$_FILES['dealershipImage']['name'])));
 

      if($file_size > 2097152 ){
         $errors[]='File size must be excately 2 MB';
      }
      if(empty($errors)==true){

         //delete previous image
         unlink("../../images/$dealershipImage");
         //update new image
         move_uploaded_file($file_tmp,"../../images/".$file_name);
        $dealershipImage=$file_name;

   }
      }else{
         print_r($errors);
      }
 if(isset($_FILES['profilePic']) && $_FILES['profilePic']['name'] !=""){
      $errors= array();
  $file_namePic = $_FILES['profilePic']['name'];
  $file_sizePic =$_FILES['profilePic']['size'];
 $file_tmpPic =$_FILES['profilePic']['tmp_name'] ;
  $file_typePic=$_FILES['profilePic']['type'];
 $file_extPic=@strtolower(end(explode('.',$_FILES['profilePic']['name']))); 

      if($file_sizePic > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      if(empty($errors)==true){

         //delete previous image
         unlink("images/profilePics/$profilePicName");
         //update new image
         move_uploaded_file($file_tmpPic,"images/profilePics/".$file_namePic);
        $profilePicName=$file_namePic;

   }
      }else{
         print_r($errors);
      }

   /*
   $dealershipname=$_POST['dealershipName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $email=$_POST['dealershipEmail'];
   */

      echo $dealershipname."<br>";
   echo $dealername."<br>";
   echo $location."<br>";
   echo $phone."<br>";
   echo $email."<br>";
   echo $dealershipImage."<br>";
   echo $profilePicName."<br>";
   echo $id."<br>";
   $con = mysqli_connect("localhost","root","","inventry");
   $qry1=mysqli_query($con,"UPDATE dealersaccount,dealerdata set dealersaccount.profilePic='$profilePicName',dealerdata.DealershipName='$dealershipname',dealerdata.DealerName='$dealername',dealerdata.Location='$location',dealerdata.Phone='$phone',dealerdata.Image='$dealershipImage' where dealerdata.id='$id' and dealersaccount.id='$id'");
   if($qry1){
      $_SESSION['updateProfile']=1;
   header("location:dealerProfile.php");
   }else{
      $_SESSION['updateProfile']=0;
   header("location:dealerProfile.php");
   }




?>
