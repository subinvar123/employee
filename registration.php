<?php
$title='index';
 require_once 'includes/header.php' ;
 require_once 'db/conn.php'; 

 ?>
 </br></br></br></br>
    <h1 class="text-center">Registration</h1>
    <form method="post" action="sucess.php" enctype="multipart/form-data">
    <div class="form-group">
    <label for="name">firstname</label>
    <input required type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp">
   
  </div>
    <div class="form-group">
    <label for="lastname">last name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname"  aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="dob">date of joining</label>
    <input required type="date" class="form-control" id="dateofjoining" name="dateofjoining" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
  <label for="email">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password">Address</label>
    <input  type="text" class="form-control" id="address" name="address">
  </div>
 
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</br>
    <?php require_once 'includes/footer.php' ;?>