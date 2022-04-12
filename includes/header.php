<?php
include_once 'includes/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
   
    <title>employee- <?php echo $title ?></title>
  </head>
  <body>
  <?php //echo getcwd();?>
  <nav id="mainnavbar" class="navbar navbar-expand-lg navbar-light bg-secondary text-white fixed-top">
  <a class="navbar-brand text-warning href=index.php">IMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
   
    <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='admin'){
          ?>
      <a class="nav-item nav-link active" href="registration.php">Home</a>
      <?php } ?>
      <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='admin'){
          ?>
        <a class="nav-item nav-link" href="viewallrecord.php">View Employee</a>
         <?php } ?>
         
         <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='admin'){
          ?>
        <a class="nav-item nav-link" href="viewrecord.php">Report View</a>
         <?php } ?>
         
         
        <?php 
              if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
      <a class="nav-item nav-link" href="edit.php">Edit Profile</a>
      <?php } ?>        

    <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
      <a class="nav-item nav-link" href="attendance.php">Mark Attendance</a>
      <?php } ?>        
    </div>
    <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
        <a class="nav-item nav-link" href="viewattendanceuser.php">View attendance</a>
         <?php } ?>
         <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
        <a class="nav-item nav-link" href="viewleaveuser.php">View leave</a>
         <?php } ?>
         
    <?php 
             if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
      <a class="nav-item nav-link" href="leave.php">Mark Leave</a>
      <?php } ?>        
    </div>
             

    <div class="navbar-nav ml-auto">
          <?php 
              if(!isset($_SESSION['userid'])){
          ?>
            <a class="nav-item nav-link" href="login.php">Login </a>
          <?php } else { ?>
            <!--<a class="nav-item nav-link" href="#"><span>Hello <?php //echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>-->
            <a class="nav-item nav-link" href="logout.php">Logout </a>
          <?php } ?>
        </div>
        </div>   
    </nav>
    <br>
    <br>
    <br>
    <div class="container">