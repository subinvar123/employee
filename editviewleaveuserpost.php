<?php
require_once 'db/conn.php';
if(isset($_POST['submit'])){
   
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $leavetype= $_POST['leavetype'];
   
    $id =$_POST['id'];

    $result = $crud->updateleavelistedit($leavetype ,$startdate, $enddate,$id);
//redirect to index page
if($result){
    header("Location: viewleaveuser.php");
}
else{
    include 'includes/errormessage.php';
}
}
else{
    include 'includes/errormessage.php';
}
?>