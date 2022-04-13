<?php
$title='user login';
 require_once 'includes/header_login.php' ;
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
<!--<h1 class="text-center"><//?php echo $title ?> </h1>
   
   <form action="<//?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
       <table class="table table-sm">
           <tr>
               <td><label for="username">Username: </label></td>
               <td><input type="text" name="username" class="form-control" id="username" value="<//?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
               </td>
           </tr>
           <tr>
               <td><label for="password">Password: </label></td>
               <td><input type="password" name="password" class="form-control" id="password">
               </td>
           </tr>
       </table><br/><br/>
       <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
      
           
   </form><br/><br/><br/><br/>-->









<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
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
      
           
   </form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>


<?php include_once 'includes/footer.php'?>