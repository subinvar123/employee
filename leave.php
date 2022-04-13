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
    if($etime==''){
      $etime = $sdate;
    }
 
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
    <h1 class="text-center">Mark Leave</h1>

    <div class="content pb-0 content-main">
            <div class="animated fadeIn">
               <div class="row">
              
                  <div class="col-lg-12">
                     <div class="card">
                       
                        <div class="card-body card-block">
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Leave Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="leavetype" id="leavetype"  onchange="GetSelectedTextValue(this)">
    <option value="Full Day">Full Day</option>

      <option value="Half Day">Half Day</option>
     
    </select>
  </div>
    <div class="form-group">
    <label for="date" id="startDateLabel">Start Date</label>
    <input required type="date" class="form-control" id= "startDate" name="startdate" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="date" id="endDateLabel">End Date</label>
    <input type="date" class="form-control" id = "endDate" name="enddate" aria-describedby="emailHelp">
   
  </div>
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</br>
    <?php require_once 'includes/footer.php' ;?>