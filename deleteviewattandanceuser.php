
<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location:  viewattendanceuser.php");
    }else{
        // Get ID values
        $id = $_GET['id'];

        //Call Delete function
        $result =$crud->deleteviewattandanceuser($id);
        //Redirect to list
        if($result)
        {
            header("Location:  viewattendanceuser.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    

?>