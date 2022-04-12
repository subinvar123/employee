
<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location:  viewleaveuser.php");
    }else{
        // Get ID values
        $id = $_GET['id'];

        //Call Delete function
        $result =$crud->deleteviewleaveuser($id);
        //Redirect to list
        if($result)
        {
            header("Location:  viewleaveuser.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    

?>