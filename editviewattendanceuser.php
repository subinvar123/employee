
<?php
$title='edit';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 

 if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewattendanceuser.php");

 }
else{
    $id =  $_GET['id'];
   $result =$crud->getattendancelistedit($id);



 
 ?>
<h1 class="text-center">Update Attendance</h1>
    <form method="post" action="editviewattendanceuserpost.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo  $result['id'] ?>" />
    <div class="form-group">
    <label for="date">Date</label>
    <input required type="date" class="form-control"  value="<?php echo  $result['date'] ?>" id="date" name="date" aria-describedby="emailHelp">
   
  </div>
    <div class="form-group">
    <label for="time">Start time</label>
    <input required type="time" class="form-control"  value="<?php echo  $result['start_time'] ?>" id="starttime" name="starttime"  aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="time">End time</label>
    <input required type="time" class="form-control"  value="<?php echo  $result['end_time'] ?>" id="endtime" name="endtime" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="task">Task</label>
    <textarea class="form-control"  value="<?php echo  $result['task'] ?>" id="task" name="task" rows="3"><?php echo  $result['task'] ?></textarea>
  </div>
 
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>








<?php }?>
</br>
    <?php require_once 'includes/footer.php' ;?>