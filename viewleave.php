<?php
$title='view records';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 if(isset($_POST['submit'])){
   
    $month = $_POST['month'];
    $year = $_POST['year'];
    $atle  = $_POST['attendance/leave'];
    $id  =  $_SESSION['userid'];
   

    $result = $crud->getattndancedetails( $month, $year, $atle ,$id);
    //print_r($issucess);
  }
 ?>

 
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">leave type</th>
      <th scope="col">status</th>
      <th scope="col">start_time</th>
      <th scope="col">end_time</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
       
    <?php  
    print_r($result);
    while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
        
      <td><?php echo $r['user_id'] ?></td>
      <td><?php echo $r['leavetype'] ?></td>
      <td><?php echo $r['status'] ?></td>
      <td><?php echo $r['start_time'] ?></td>
      <td><?php echo $r['end_time'] ?></td>
 
    </td>
    </tr>
   <?php } ?>
  </tbody>
</table>