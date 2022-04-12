<?php
require_once 'db/conn.php';
if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $task= $_POST['task'];
   
    $id =$_POST['id'];

    $result = $crud->updateattendancelistedit( $task ,$date,$starttime, $endtime,$id);
//redirect to index page
if($result){
    header("Location: viewattendanceuser.php");
}
else{
    include 'includes/errormessage.php';
}
}
else{
    include 'includes/errormessage.php';
}
?>