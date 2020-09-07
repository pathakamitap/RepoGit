<?php
   session_start();
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=@strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
        
      }else{
         print_r($errors);
      }
   }
   include_once("random.php");
   $id="$".rand_string(5);
   $dealershipname=$_POST['dealershipName'];
   $dealername=$_POST['dealerName'];
   $location=$_POST['dealershipLocation'];
   $phone1=$_POST['dealershipPhone1'];
   $phone2=$_POST['dealershipPhone2'];
   $phone3=$_POST['dealershipPhone3'];
   $phone=(int)($phone1).(int)($phone2).(int)($phone3);
   $email=$_POST['dealershipEmail'];
   $image=$file_name;
   $password=$_POST['dealershipPassword'];
 
   $con = mysqli_connect("localhost","root","","inventry");
   $qry1=mysqli_query($con,"insert into dealerdata values('$id','$dealershipname','$dealername','$location','$phone','$email','$image','$password')");
   if($qry1){
      $_SESSION['dealerdata']=1;
      $_SESSION['active']=1;

      //sending mail to acknowledge
      $subject="Regarding your membership in inventry.com";
      $msg="congratulation you are now a member of inventry.com your dealership details are as follows ::
      username=".$email." and your password is= ".$password ."
      you are adviced to immediately change your password.";
      mail($email,$subject,$msg);
      if(mail){
         $_SESSION['ackmail']=1;
      }
      header("location:register.php");
   }

?>
