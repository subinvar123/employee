<?php
require_once 'db/conn.php';
require_once 'includes/header.php' ;
$id=$_GET['id'];
$r=1;
$result = $crud-> updateleaveapprove($r,$id);

if($result)
{
    header("Location:  leaverecord.php");
}
else{
    include 'includes/errormessage.php';
}

?>