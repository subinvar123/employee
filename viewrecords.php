<!--<//?php
$title='view records';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 //$result = $crud->getattendee();
 ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">conference</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">dob</th>
      <th scope="col">email</th>
      <th scope="col">speciality</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <//?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <td><?php echo $r['attendee_id'] ?></td>
      <td><?php echo $r['firstname'] ?></td>
      <td><?php echo $r['lastname'] ?></td>
      <td><?php echo $r['dateofbirth'] ?></td>
      <td><?php echo $r['email'] ?></td>
      <td><?php echo $r['name'] ?></td>
      <td><a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">view</a>
      <td><a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">edit</a>
      <td><a href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">delete</a>
    </td>
    </tr>
   <//?php } ?>
  </tbody>
</table>







</br>
    <?php require_once 'includes/footer.php' ;?>-->













