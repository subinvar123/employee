<?php
$title='edit';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 

 if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewleaveuser.php");

 }
else{
    $id =  $_GET['id'];
   $result =$crud->getleavelistedit($id);



 
 ?>
<h1 class="text-center">Update Leave</h1>
    <form method="post" action="editviewleaveuserpost.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo  $result['id'] ?>" />
   
    <div class="form-group">
    <label for="time">Start date</label>
    <input required type="date" class="form-control"  value="<?php echo  $result['start_date'] ?>" id="startdate" name="startdate"  aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="time">End date</label>
    <input required type="date" class="form-control"  value="<?php echo  $result['end_date'] ?>" id="enddate" name="enddate" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Leave Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="leavetype">
      <option value="Half Day" <?php if($result['leavetype'] == "Half Day"){echo "selected";} ?>>Half Day</option>
      <option value="Full Day" <?php if($result['leavetype'] == "Full Day"){echo "selected";} ?>>Full Day</option>
    </select>
  </div>
  
  
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>








<?php }?>
</br>
    <?php require_once 'includes/footer.php' ;?>