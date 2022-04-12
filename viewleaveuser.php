
<?php
$title='view leave';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 $id  =  $_SESSION['userid'];
 $result = $crud->getuserleave($id);
 ?>
<table class="table">
  <thead>
    <tr>
    <!--<th scope="col">id</th>-->
    
      <th scope="col">Name</th>
      <th scope="col">leave type</th>
      <th scope="col">status</th>
      <th scope="col">start date</th>
      <th scope="col">end date</th>
      
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
      
 
      <td><a href="editviewleaveuser.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">edit</a>
      <td><!--<a href="deleteviewleaveuser.php?id=<//?php echo $r['id'] ?>" class="btn btn-danger">delete</a>-->
      <a onclick="return confirm('Are you sure you want to delete this record?');" href="deleteviewleaveuser.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
   <?php } ?>
  </tbody>
</table>







</br>
    <?php require_once 'includes/footer.php' ;?>
