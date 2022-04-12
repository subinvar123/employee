<?php
$title='sucess';
 require_once 'includes/header.php';
 require_once 'db/conn.php';
 if(isset($_POST['submit'])){
   //extract values from the$_post array
   //print_r($_POST);
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $doj = $_POST['dateofjoining'];
   $email = $_POST['email'];
   $password = $_POST['password'];
  $new_password = md5($password.$email);
   $address = $_POST['address'];
  $user='user';

   $issucess = $crud->insertuser($fname ,$lname ,$email ,$new_password ,$doj ,$address , $user);
   //$issucess = $user->insertuser($email,$password);
   if($issucess){
    //SendEmail::SendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registerted for this year\'s IT Conference');
    include 'includes/successmessage.php';
   }
   else{ 
    include 'includes/errormessage.php';
  }
 }
  ?>



<!--<h1 class="text-center text-success">you have registered  </h1> -->

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST["firstname"] . " " . $_POST["lastname"]  ?></h5>
    
    <h6 class="card-subtitle mb-2 text-muted">address:<?php echo $_POST["address"]  ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">Date of joining:<?php echo $_POST["dateofjoining"]  ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">EMAIL:<?php echo $_POST["email"] ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">PASSWORD:<?php echo $_POST["password"]  ?></h6>
   
  </div>
</div>          

<?php
/*
echo $_GET["firstname"];
echo $_GET["lastname"];
echo $_GET["dob"];
echo $_GET["speciality"];
echo $_GET["email"];
echo $_GET["password"];

*/
?>

</br>
    <?php require_once 'includes/footer.php' ;?>