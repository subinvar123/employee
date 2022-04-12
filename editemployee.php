<?php
$title='edit';
 require_once 'includes/header.php' ;
 require_once 'includes/auth_check.php' ;
 require_once 'db/conn.php'; 
 

 if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewallrecord.php");

 }
else{
    $id =  $_GET['id'];
    $result =$crud->getattendeedetails($id);



 
 ?>
    <h1 class="text-center">registration</h1>
    <form method="post" action="editemployeepost.php">
      <input type="hidden" name="user_id" value="<?php echo  $result['user_id'] ?>" />
      <div class="form-group">
    <label for="name">firstname</label>
    <input required type="text" class="form-control" value="<?php echo  $result['firstname'] ?>" id="firstname" name="firstname">
   
  </div>
    <div class="form-group">
    <label for="lastname">last name</label>
    <input required type="text" class="form-control" value="<?php echo  $result['lastname'] ?>" id="lastname" name="lastname"  aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="dob">date of joining</label>
    <input required type="date" class="form-control" value="<?php echo  $result['dateofjoining'] ?>"  id="dateofjoining" name="dateofjoining" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
  <label for="email">Email address</label>
    <input required type="email" class="form-control" value="<?php echo  $result['email'] ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input required type="password" class="form-control" value="<?php echo  $result['password'] ?>" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password">Address</label>
    <input  type="text" class="form-control" value="<?php echo  $result['address'] ?>" id="address" name="address">
  </div>
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<?php }?>
</br>
    <?php require_once 'includes/footer.php' ;?>


    <selct>
        <option>