<?php
$title='index';
//set staus
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //extract values from the$_post array
    //print_r($_POST);
    $date = $_POST['date'];
    $stime = $_POST['starttime'];
    $etime = $_POST['endtime'];
    $task = $_POST['task'];

    $issucess = $crud->insertattendance($task, $date ,$stime ,$etime, $_SESSION['userid']);
    //$issucess = $user->insertuser($email,$password);
    if($issucess){
     //SendEmail::SendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registerted for this year\'s IT Conference');
     include 'includes/successmessage.php';
    }
    else{ 
     include 'includes/errormessage.php';
   }
  }
 ?>
 </br></br></br></br>
    <h1 class="text-center">Mark Attendance</h1>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div class="form-group">
    <label for="date">Date</label>
    <input required type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp">
   
  </div>
    <div class="form-group">
    <label for="time">Start time</label>
    <input required type="time" class="form-control" id="starttime" name="starttime"  aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="time">End time</label>
    <input required type="time" class="form-control" id="endtime" name="endtime" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Project work.</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="task" rows="3"></textarea>
  </div>
 
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</br>
    <?php require_once 'includes/footer.php' ;?>
