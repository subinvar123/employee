<?php
$title='index';
 require_once 'includes/header.php' ;
 require_once 'db/conn.php'; 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //extract values from the$_post array
    //print_r($_POST);
    $sdate = $_POST['startdate'];
    $etime = $_POST['enddate'];
    $ltype = $_POST['leavetype'];
    $status='0';
    
 
    $issucess = $crud->insertleave($ltype ,$status ,$sdate,$etime ,$_SESSION['userid']);
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
    <h1 class="text-center">Leave</h1>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div class="form-group">
    <label for="date">Start Date</label>
    <input required type="date" class="form-control" id="date" name="startdate" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="date">End Date</label>
    <input required type="date" class="form-control" id="date" name="enddate" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Leave Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="leavetype">
      <option>Half Day</option>
      <option>Full Day</option>
     
    </select>
  </div>
  
  
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</br>
    <?php require_once 'includes/footer.php' ;?>