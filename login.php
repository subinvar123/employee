<?php
$title='user login';
 require_once 'includes/header.php' ;
 require_once 'db/conn.php'; 

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);
   $result = $user->getUser($username,$new_password);
   //print_r($result);
  // $result =$user->getuserbyemailandpassword($username,$password);

  $_SESSION['usertype'] = $result['role'];
  //echo 'xfdx'.$result['role'];
  //echo 'rett'. $_SESSION['usertype'];
    if($result['role']=='admin'){
        $_SESSION['username'] = $result['email'];
        $_SESSION['userid'] = $result['user_id'];
       header("Location: viewallrecord.php");
    }
    elseif($result['role']=='user'){
        $_SESSION['username'] = $result['email'];
        $_SESSION['userid'] = $result['user_id'];
        header("Location: attendance.php");
    }
    else{
       
        echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
    }

}
 ?>
</br></br></br></br>
<h1 class="text-center"><?php echo $title ?> </h1>
   
   <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
       <table class="table table-sm">
           <tr>
               <td><label for="username">Username: </label></td>
               <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
               </td>
           </tr>
           <tr>
               <td><label for="password">Password: </label></td>
               <td><input type="password" name="password" class="form-control" id="password">
               </td>
           </tr>
       </table><br/><br/>
       <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
      
           
   </form><br/><br/><br/><br/>

<?php include_once 'includes/footer.php'?>