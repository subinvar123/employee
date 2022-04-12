<?Php
//require_once 'includes/auth_check.php' ;
require_once 'db/conn.php';

echo $_GET['id'].'dsadas';
if(!isset($_GET['id'])){ 
   include 'includes/errormessage.php';
    header("Location: viewallrecord.php");
   
 }
else{
    
    $id = $_GET['id'];
    $result =$crud->deleteattendee($id);
    if($result)
    {
        header("Location:  viewallrecord.php");
    }
    else{
        include 'includes/errormessage.php';
    }
}
?>
