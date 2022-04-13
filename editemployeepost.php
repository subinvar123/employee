<?php
require_once 'db/conn.php';
if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $doj = $_POST['dateofjoining'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $user_id =$_POST['user_id'];
    $new_password = md5($password.$username);
  
    $result = $crud->updateattendee($fname ,$lname  ,$email , $new_password ,$address ,$doj  ,$user_id);
//redirect to index page
if($result){
    header("Location: viewallrecord.php");
}
else{
    include 'includes/errormessage.php';
}
}
else{
    include 'includes/errormessage.php';
}
?>