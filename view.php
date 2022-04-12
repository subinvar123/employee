<!--<//?php
$title='view record';
 require_once 'includes/header.php' ;
 //require_once 'includes/auth_check.php' ;//
 require_once 'db/conn.php'; 

 if(!isset($_GET['id'])){
    echo "<h1>plase check details and try again.</h1>";
   

 }else{ 
      $id = $_GET['id'];
    $result= $crud->getattendeedetails($id);
  
     
 
 
 ?>


<img src="<//?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ; ?>" class="rounded-circle" style="width: 20%; height: 20%" />
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><//?php echo $result["firstname"] . " " . $result["lastname"]  ?></h5>
    
    <h6 class="card-subtitle mb-2 text-muted">SPECIALITY:<//?php echo $result["name"]  ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">DOB:<//?php echo $result["dateofbirth"]  ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">EMAIL:<//?php echo $result["email"] ?></h6>
   
   
  </div>
</div>  
<a href="viewrecords.php" class="btn btn-info">back to list</a>
    <a href="edit.php?id=<//?php echo $result['attendee_id'] ?>" class="btn btn-warning">edit</a>
    <a onclick="return confirm('are you sure you want to delete');" href="delete.php?id=<//?php echo $result['attendee_id'] ?>" class="btn btn-danger">delete</a>

<?//php } ?>








</br>
    <?//php require_once 'includes/footer.php' ;?>