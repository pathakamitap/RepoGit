<?php
   session_start();
   $dealershipname=$_POST['dealershipName'];
   $dealername=$_POST['dealerName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $dealershipImageName=$_POST['dealershipImageName'];
   if(isset($_POST['profilePicName'])){$profilePicName=$_POST['profilePicName'];}
   $id=$_POST['id'];

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
       
            unlink("../../images/$dealershipImage");
      
         //delete previous image
         
         //update new image
            $file_name=$id."ds".$file_name;
         move_uploaded_file($file_tmp,"../../images/".$file_name);
        $dealershipImageName=$file_name;

      }
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
            if(isset($profilePicName)){
         //delete previous image
         unlink("images/profilePics/$profilePicName");
      }
         //update new image
          $file_namePic=$id."dp".$file_namePic;
         move_uploaded_file($file_tmpPic,"images/profilePics/".$file_namePic);
        $profilePicName=$file_namePic;

   }
 }
   /*
   $dealershipname=$_POST['dealershipName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $email=$_POST['dealershipEmail'];
   */

 
   include_once("../../Database.php");
   $qry1=mysqli_query($con,"UPDATE dealerdata set DealershipName='$dealershipname',DealerName='$dealername',Location='$location',Phone='$phone',Image='$dealershipImageName',profilePic='$profilePicName' where id='$id'");
   
   if($qry1){
    
      $_SESSION['updateProfile']=1;
        header("location:profile.php");
 exit();
   }else{
  
      $_SESSION['updateProfile']=0;
        header("location:profile.php");
   }





?>
