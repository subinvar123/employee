<?php
$title='register';
 require_once 'includes/header.php' ;
 require_once 'db/conn.php'; 
 $result =$crud->getspeciality();
 ?>
    <h1 class="text-center">registration</h1>
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
    <label for="dob">date of birth</label>
    <input required type="text" class="form-control" id="dob" name="dob" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="speciality">AREA</label>
    <select class="form-control" id="speciality" name="speciality">
      <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value ="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>
        <?php }?>
    </select>
  </div>
  <div class="form-group">
  <label for="email">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
        </div>
</br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</br>
    <?php require_once 'includes/footer.php' ;?>