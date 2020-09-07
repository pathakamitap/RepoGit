<?php
   session_start();
      $_SESSION['active']=3;
   $name=$_POST['dealershipName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $email=$_POST['dealershipEmail'];
   $image=$_POST['imageName'];
   $id=$_POST['id'];
   
   if(isset($_FILES['image']) && $_FILES['image']['name'] !=""){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=@strtolower(end(explode('.',$_FILES['image']['name'])));
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){

         //delete previous image
         unlink("images/$image");
         
         //update new image
         $file_name=$id."ds".$file_name;
         move_uploaded_file($file_tmp,"images/".$file_name);
        $image=$file_name;
        //echo $image;
      }
   }
   $name=$_POST['dealershipName'];
   $location=$_POST['dealershipLocation'];
   $phone=$_POST['dealershipPhone'];
   $email=$_POST['dealershipEmail'];

  include("Database.php");
   $qry1=mysqli_query($con,"update dealerdata set DealershipName='$name', Location='$location', Phone='$phone', Email='$email', Image='$image' where id='$id'");
   if($qry1){
   
   header("location:register.php");
   }
?>
