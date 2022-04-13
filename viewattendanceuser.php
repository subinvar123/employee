<?php
$title='view records';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 $id  =  $_SESSION['userid'];
 $result = $crud->getuserattendance($id);
 ?>
<table class="table">
  <thead>
    <tr>
    <!--<th scope="col">id</th>-->
    <!--<th scope="col">id</th>
      <th scope="col">user_id</th>-->
      <th scope="col">Name</th>
      <th scope="col">Task</th>
      <th scope="col">Date</th>
      <th scope="col">Start time</th>
      <th scope="col">End time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
    while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
      <!-- <td><//?php echo $r['id'] ?></td>
      <td><//?php echo $r['user_id'] ?></td>-->
      <td><?php echo $r['firstname']   .' '.   $r['lastname'] ?></td>
      <td><?php echo $r['task'] ?></td>
      <td><?php echo $r['date'] ?></td>
      <td><?php echo $r['start_time'] ?></td>
      <td><?php echo $r['end_time'] ?></td>
 
      
      <td><a href="editviewattendanceuser.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">edit</td>
      <td><!--<a href="deleteviewattandanceuser.php?id=<//?php echo $r['id'] ?>" class="btn btn-danger">delete-->
      <a onclick="return confirm('Are you sure you want to delete this record?');" href="deleteviewattandanceuser.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   <?php } ?>
  </tbody>
</table>







</br>
    <?php require_once 'includes/footer.php' ;?>
