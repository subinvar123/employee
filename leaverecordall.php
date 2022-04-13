<?php
$title='view records';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 if(isset($_POST['submit'])){
 $month = $_POST['month'];
    $year = $_POST['year'];
   
   
    $result = $crud->getallleavedetails( $month, $year );
    }
 ?>
 <table class="table">
  <thead>
    <tr>
    <th scope="col">Name</th>
      <th scope="col">Leave type</th>
      <th scope="col">Status</th>
      <th scope="col">Start date</th>
      <th scope="col">End date</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
       
    <?php  
   
    while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
     
      <td><?php echo $r['firstname']   .' '.   $r['lastname'] ?></td>
      <td><?php echo $r['leavetype'] ?></td>
      <td><?php if ($r['status']==1){echo "Approved";}
      elseif ($r['status']==2){echo "rejected";}
      else{echo "waiting for Approval";} ?></td>
      <td><?php echo $r['start_date'] ?></td>
      <td><?php echo $r['end_date'] ?></td>
      <?php 
      $class_disable="";
      if($r['status']!=0){
        $class_disable="disabled";
      }
      ?>
      <td><a href="approveleave.php?id=<?php echo $r['id'] ?>" class="btn btn-primary <?php echo $class_disable;?>">Approve</a>
      <a href="rejectleave.php?id=<?php echo $r['id'] ?>" class="btn btn-warning <?php echo $class_disable;?>">Reject</a>
     
    </td>
    </tr>
   <?php } ?>
  </tbody>
</table>

<?php require_once 'includes/footer.php' ;?>