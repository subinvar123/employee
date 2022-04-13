<?php
include_once 'includes/session.php';
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--<title>employee- <//?php echo $title ?></title>-->
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   </head>
   <body>

   <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <?php if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='admin'){
          ?>
				  <li class="menu-item-has-children dropdown">
          <a href="registration.php">Home</a>
                   
                  </li>
                  <li class="menu-item-has-children dropdown">
                  <a href="viewallrecord.php">View Employee</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
          <a href="viewrecord.php">Report View</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
          <a href="leaverecord.php">Leave record</a>
                   
                  </li>
                  <?php } ?>
                  <?php
                  if(isset( $_SESSION['usertype']) && $_SESSION['usertype']=='user'){
          ?>
				  <li class="menu-item-has-children dropdown">
          <a href="edit.php">Edit Profile</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                  <a href="attendance.php">Mark Attendance</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                  <a href="viewattendanceuser.php">View attendance</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
          <a href="edit.php">Edit Profile</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                  <a href="leave.php">Mark Leave</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                  <a href="viewleaveuser.php">View leave</a>
                  </li>

				  <?php } ?>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
               <a class="navbar-brand text-warning href=index.php">IMS</a>
                  <!--<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>-->
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                  <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>



         



         