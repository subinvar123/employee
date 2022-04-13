<?php
$title='index';
 require_once 'includes/header.php' ;
 require_once 'db/conn.php'; 
 

$result = $crud->getemployee();

 ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">user</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Date of joining</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    //print_r($result);
     while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <td><?php echo $r['user_id'] ?></td>
      <td><?php echo $r['firstname'] ?></td>
      <td><?php echo $r['lastname'] ?></td>
      <td><?php echo $r['email'] ?></td>
      <td><?php echo $r['address'] ?></td>
      <td><?php echo $r['dateofjoining'] ?></td>
      <!--<td><a href="view.php?id=<?php// echo $r['user_id'] ?>" class="btn btn-primary">view</a>-->
      <td><a href="editemployee.php?id=<?php echo $r['user_id'] ?>" class="btn btn-warning">edit</a>
       <!--<a href="http://localhost/employee/delete.php?id=<//?php echo $r['user_id']?>" class="btn btn-danger">delete</a>-->
      <td><a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['user_id'] ?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
   <?php } ?>
  </tbody>
</table>




























<?php require_once 'includes/footer.php' ;?>