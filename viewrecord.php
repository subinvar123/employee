<?php
$title='view records';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 /*if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //extract values from the$_post array
    //print_r($_POST);
    $month = $_POST['month'];
    $year = $_POST['year'];
    $atle  = $_POST['attendance/leave'];
    $id  =  $_SESSION['userid'];
   

    $issucess = $crud->getattndancedetails( $month, $year, $atle ,$id);
    //print_r($issucess);
  }*/
  $result = $crud->getemployee();
 ?>


</br></br></br></br></br></br>
<div class="content pb-0 content-main">
            <div class="animated fadeIn">
               <div class="row">
              
                  <div class="col-lg-12">
                     <div class="card">
                       
                        <div class="card-body card-block">
<form method="post" action="viewattendance.php" enctype="multipart/form-data">

<div class="form-group">
    <label for="employeename">Employee name</label>
    <select class="form-control" id="employeename" name="employeename">
    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <option  value="<?php echo $r['user_id']?>"> <?php echo $r['firstname'] ?></option>
      <?php } ?>
    <!--here option value is passed as name-->
    </select>
  </div>


<div class="form-group">
    <label for="month">MONTH</label>
    <select class="form-control" id="month" name="month">
      <option value="01">January</option>
      <option  value="02">February</option>
      <option  value="03" >March</option>
      <option value="04"  >April</option>
      <option value="05"  >May</option>
      <option value="06" >June</option>
      <option  value="07">July</option>
      <option value="08" >August</option>
      <option  value="09">Sep</option>
      <option value="10" >Oct</option>
      <option value="11" >Nov</option>
      <option value="12" >Dec</option>
    </select>
  </div>
  <div class="form-group">
    <label for="year">YEAR</label>
    <select class="form-control" id="year" name="year">
      <option value="2022">2022</option>
      <option value="2023">2023</option>
    
    </select>
  </div>

<div class="form-group">
    <label for="attendance/leave">Attendance/Leave</label>
    <select class="form-control" id="attendance/leave" name="attendance/leave">
      <option value="attendance">Attendance</option>
      <option value="leave">Leave</option>
     
    </select>
  </div></br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
  </form>
  </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
  <?php require_once 'includes/footer.php' ;?>