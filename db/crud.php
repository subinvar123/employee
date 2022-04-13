<?php
class crud{
    private $db;

    function __construct($conn){
        $this->db = $conn;

    }
//e
   public function insertuser($fname ,$lname ,$email ,$password ,$doj ,$address , $user){
       try {

        $sql = "INSERT INTO `users`( `firstname`, `lastname`, `email`,`password`,`dateofjoining` , `address` ,`role`) VALUES (:fname ,:lname ,:email,:password,:doj,:address ,:role)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':fname' ,$fname);
        $stmt->bindparam(':lname' ,$lname);
        $stmt->bindparam(':email' ,$email);
        $stmt->bindparam(':password' ,$password);
        $stmt->bindparam(':doj' ,$doj);
        $stmt->bindparam(':address' ,$address);
        $stmt->bindparam(':role' , $user);
        $stmt->execute();

        return true;
       }

       catch (PDOExeption $e) {
           echo $e->getMessage();
           return false;
       }

   } 
   //e
   public function insertattendance($task, $date ,$stime ,$etime,$userId ){
    try 
        {
            $result =$this->getuserdatecount($date,$userId);
            if($result['num']>0){
                return false;
            }
            else{

     $sql = "INSERT INTO `attendance`( `task`, `date`, `start_time`,`end_time`,`user_id`) VALUES (:task ,:date,:stime,:etime,:userId)";
     $stmt = $this->db->prepare($sql);
     $stmt->bindparam(':task' ,$task);
     $stmt->bindparam(':date' ,$date);
     $stmt->bindparam(':stime' ,$stime);
     $stmt->bindparam(':etime' ,$etime);
     $stmt->bindparam(':userId' ,$userId);
    
     $stmt->execute();

     return true;
    }
        }
    catch (PDOExeption $e) {
        echo $e->getMessage();
        return false;
    }
   }

public function getuserdatecount($date,$userId){
    try{
        $sql=  "SELECT COUNT(*) as num FROM `attendance` WHERE `date`=:date AND `user_id`=:userId;";
        $stmt =$this->db->prepare($sql);
        $stmt->bindparam(':date' ,$date);
        $stmt->bindparam(':userId' ,$userId);
         $stmt->execute();
    
         $result =$stmt->fetch();
         
        return $result;
       }
       catch (PDOExeption $e) {
        echo $e->getMessage();
        return false;
    }
       }  

//e
public function insertleave($ltype ,$status ,$sdate ,$etime ,$userId){
    try {

        $result =$this->getuserleavedatecount($sdate,$userId);
       // print_r($result);
        if($result['num']>0){
            return false;
        }
        else{
     $sql = "INSERT INTO `leave`( `leavetype`, `status`, `start_date`,`end_date`,`user_id`) VALUES (:ltype ,:status,:sdate,:edate ,:userId)";
     $stmt = $this->db->prepare($sql);
     $stmt->bindparam(':ltype' ,$ltype);
     $stmt->bindparam(':status' ,$status);
     $stmt->bindparam(':sdate' ,$sdate);
     $stmt->bindparam(':edate' ,$etime);
     $stmt->bindparam(':userId' ,$userId);
  
    
    
     $stmt->execute();

     return true;
    }}

    catch (PDOExeption $e) {
        echo $e->getMessage();
        return false;
    }

} 
public function getuserleavedatecount($sdate,$userId){
    try{
        $sql=  "SELECT COUNT(*) as num FROM `leave` WHERE `start_date`=:date AND `user_id`=:userId;";
        $stmt =$this->db->prepare($sql);
        $stmt->bindparam(':date' ,$sdate);
        $stmt->bindparam(':userId' ,$userId);
         $stmt->execute();
    
         $result =$stmt->fetch();

        return $result;
       }
       catch (PDOExeption $e) {
        echo $e->getMessage();
        return false;
    }
       }  

//viewrecord to viewatendance and viewleave
public function getattndancedetails( $month, $year, $atle ,$id , $employeename){
    try{
       
        if($atle=="attendance"){
            $sql = "SELECT a.id ,u.firstname ,u.lastname ,a.task ,a.date ,a.start_time ,a.end_time FROM `attendance` a
            INNER JOIN `users` u
            ON a.user_id = u.user_id WHERE  MONTH(`date`) IN ($month) AND YEAR(`date`) IN ($year) AND u.user_id= $employeename;";
           // $sql = "SELECT * FROM `attendance` WHERE  MONTH(`date`) IN ($month) AND YEAR(`date`) IN ($year) AND `user_id`= $employeename;";
           //$sql = "SELECT `id`, `user_id`, `task`, `date`, `start_time`, `end_time` FROM `attendance` WHERE  MONTH(`date`)=$month AND YEAR(`date`)=$year;";
           // $sql = "SELECT * FROM `attendance` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year' ";
            $stmt =$this->db->prepare($sql);
           //$stmt->bindparam(':month' ,$month);
         // $stmt->bindparam(':year' ,$year);
        
       // if($atle=="leave"){


           // $sql = "SELECT * FROM `leave` WHERE MONTH(`start_date`)=$month AND YEAR(`start_date`)=$year;";
           // $stmt =$this->db->prepare($sql);
            //$stmt->bindparam(':month' ,$month);
            //$stmt->bindparam(':year' ,$year);
       // }

      $stmt->execute();
 
     //$result = $stmt->fetch();
     //print_r($result);
     // return $result;
     return $stmt;
    }}
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
    }  

    //viewrecord to  viewattendance.php (viewleave)
public function getleavedetails( $month, $year, $atle ,$id ,$employeename){
    try{
        if($atle=="leave"){
            $sql = "SELECT l.id ,u.firstname ,u.lastname ,l.leavetype ,l.start_date ,l.end_date ,l.status FROM `leave` l
            INNER JOIN `users` u
            ON l.user_id = u.user_id WHERE  MONTH(`start_date`) IN ($month) AND YEAR(`start_date`) IN ($year) AND u.user_id= $employeename;";
        //$sql = "SELECT * FROM `leave` WHERE  MONTH(`start_date`) IN ($month) AND YEAR(`start_date`) IN ($year) AND `user_id`= $employeename;";
            //$sql = "SELECT * FROM `leave` WHERE  MONTH(`start_date`) IN ($month) INTERSECT SELECT * FROM `leave` WHERE YEAR(`start_date`) IN ($year);";
            //$sql = "SELECT `id`, `user_id`, `task`, `date`, `start_time`, `end_time` FROM `attendance` WHERE  MONTH(`date`)=$month AND YEAR(`date`)=$year;";
           // $sql = "SELECT * FROM `attendance` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year' ";
            $stmt =$this->db->prepare($sql);
           //$stmt->bindparam(':month' ,$month);
         // $stmt->bindparam(':year' ,$year);
        
       // if($atle=="leave"){


           // $sql = "SELECT * FROM `leave` WHERE MONTH(`start_date`)=$month AND YEAR(`start_date`)=$year;";
           // $stmt =$this->db->prepare($sql);
            //$stmt->bindparam(':month' ,$month);
            //$stmt->bindparam(':year' ,$year);
       // }

      $stmt->execute();
 
    // $result = $stmt->fetch();
     // return $result;
     return $stmt;
    }}
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
    }  
    public function getallleavedetails( $month, $year){
        try{
            
                $sql = "SELECT l.id ,u.firstname ,u.lastname ,l.leavetype ,l.start_date ,l.end_date ,l.status FROM `leave` l
                INNER JOIN `users` u
                ON l.user_id = u.user_id WHERE  MONTH(`start_date`) IN ($month) AND YEAR(`start_date`) IN ($year);";
            //$sql = "SELECT * FROM `leave` WHERE  MONTH(`start_date`) IN ($month) AND YEAR(`start_date`) IN ($year) AND `user_id`= $employeename;";
                //$sql = "SELECT * FROM `leave` WHERE  MONTH(`start_date`) IN ($month) INTERSECT SELECT * FROM `leave` WHERE YEAR(`start_date`) IN ($year);";
                //$sql = "SELECT `id`, `user_id`, `task`, `date`, `start_time`, `end_time` FROM `attendance` WHERE  MONTH(`date`)=$month AND YEAR(`date`)=$year;";
               // $sql = "SELECT * FROM `attendance` WHERE MONTH(`date`)='$month' AND YEAR(`date`)='$year' ";
                $stmt =$this->db->prepare($sql);
               //$stmt->bindparam(':month' ,$month);
             // $stmt->bindparam(':year' ,$year);
            
           // if($atle=="leave"){
    
    
               // $sql = "SELECT * FROM `leave` WHERE MONTH(`start_date`)=$month AND YEAR(`start_date`)=$year;";
               // $stmt =$this->db->prepare($sql);
                //$stmt->bindparam(':month' ,$month);
                //$stmt->bindparam(':year' ,$year);
           // }
    
          $stmt->execute();
     
        // $result = $stmt->fetch();
         // return $result;
         return $stmt;
        }
        catch (PDOExeption $e) {
         echo $e->getMessage();
         return false;
     }
        }  
//e
public function getattendeedetails($id){
    try{
     $sql = "SELECT * FROM `users` WHERE user_id=:id";
     $stmt =$this->db->prepare($sql);
     $stmt->bindparam(':id' ,$id);
      $stmt->execute();
 
      $result =$stmt->fetch();
      
     return $result;
    }
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
    }  
 



 //e
    public function updateattendee($fname ,$lname  ,$email ,$password ,$address ,$doj  ,$user_id){
        try { 
            $sql = "UPDATE `users` SET `firstname`=:fname,`lastname`=:lname,`email`=:email,`password`=:password  ,`address`=:address,`dateofjoining`=:doj   WHERE `user_id`=:user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname' ,$fname);
            $stmt->bindparam(':lname' ,$lname);
            $stmt->bindparam(':email' ,$email);
            $stmt->bindparam(':password' ,$password);
            $stmt->bindparam(':doj' ,$doj);
            $stmt->bindparam(':address' ,$address );
            $stmt->bindparam(':user_id' ,$user_id);
            $stmt->execute();
    
            return true;
           }
    
           catch (PDOExeption $e) {
               echo $e->getMessage();
               return false;
           }
    
        }

//e
   public function getemployee(){
       try{
    $sql = "SELECT * FROM `users` where `role` != 'ADMIN'";
    $result =$this->db->query($sql);
    return $result;
       }
       catch (PDOExeption $e) {
        echo $e->getMessage();
        return false;
    }
   }
   //leaveapprove
   public function updateleaveapprove($r,$id){
    try { 

        $sql = "UPDATE `leave` SET `status`=:status  WHERE `id`=:id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':status',$r);
        $stmt->bindparam(':id',$id);
       $result = $stmt->execute();

        return $result;
       }

       catch (PDOExeption $e) {
           echo $e->getMessage();
           return false;
       }

    }

    //e to show attendance to user ....viewattendanceuser.php
    public function getuserattendance($id){
        try{
     //$sql = "SELECT * FROM `attendance` INNER JOIN users ON users.user_id=attendance.user_id where `user_id`= $id;";

     $sql = "SELECT a.id ,u.firstname ,u.lastname ,a.task ,a.date ,a.start_time ,a.end_time FROM `attendance` a
INNER JOIN `users` u
ON a.user_id = u.user_id where u.user_id= $id;";
     $result =$this->db->query($sql);
     return $result;
        }
        catch (PDOExeption $e) {
         echo $e->getMessage();
         return false;
     }
    }

//e to show leave to user ....viewleaveuser.php
public function getuserleave($id){
    try{
 //$sql = "SELECT * FROM `leave` where `user_id`= $id;";
 $sql = "SELECT l.id ,u.firstname ,u.lastname ,l.leavetype ,l.start_date ,l.end_date ,l.status FROM `leave` l
INNER JOIN `users` u
ON l.user_id = u.user_id where u.user_id= $id;";

 $result =$this->db->query($sql);
 return $result;
    }
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
}

//e to list attendance data in form for user to edit.......editviewattendanceuser.php
public function getattendancelistedit($id){
    try{
        $sql = "SELECT * FROM `attendance` where `id`= :id;";
 //$result =$this->db->query($sql);
 
 //return $result;
 $stmt = $this->db->prepare($sql);
       
 $stmt->bindparam(':id' ,$id);
 $stmt->execute();
 $result =$stmt->fetch();

return $result;

 //return true;
    }
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
}

//e to to update the above ......editviewattendanceuser.php
public function updateattendancelistedit( $task ,$date,$starttime, $endtime,$id){
    try { 
        $sql = "UPDATE `attendance` SET `task`=:task,`date`=:date,`start_time`=:starttime,`end_time`=:endtime WHERE `id`=:id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':task' ,$task);
        $stmt->bindparam(':date' ,$date);
        $stmt->bindparam(':starttime' ,$starttime );
        $stmt->bindparam(':endtime' ,$endtime);
        $stmt->bindparam(':id' ,$id);
        $stmt->execute();
        return true;
       }

       catch (PDOExeption $e) {
           echo $e->getMessage();
           return false;
       }

    }
    //delete editviewattendanceuser.php
    public function deleteviewattandanceuser($id){

        try{ 
        $sql ="DELETE FROM `attendance` WHERE `id`=:id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id' ,$id);
        $stmt->execute();
 
        return true;
 
     }
     catch (PDOExeption $e) {
         echo $e->getMessage();
         return false;
     }
 }

 //leave user edit update delete
//e to list leave data in form for user to edit.......editviewleaveuser.php
 public function getleavelistedit($id){
    try{
        $sql = "SELECT * FROM `leave` where `id`= :id;";
 //$result =$this->db->query($sql);
 
 //return $result;
 $stmt = $this->db->prepare($sql);
       
 $stmt->bindparam(':id' ,$id);
 $stmt->execute();
 $result =$stmt->fetch();

return $result;

 //return true;
    }
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
}
//e to to update the above ......editviewattendanceuser.php
public function updateleavelistedit($leavetype ,$startdate, $enddate,$id){
    try { 
        $sql = "UPDATE `leave` SET `leavetype`=:leavetype,`start_date`=:startdate,`end_date`=:enddate WHERE `id`=:id;";
        $stmt = $this->db->prepare($sql);
     
        $stmt->bindparam(':leavetype' ,$leavetype);
        $stmt->bindparam(':startdate' ,$startdate );
        $stmt->bindparam(':enddate' ,$enddate);
        $stmt->bindparam(':id' ,$id);
        $stmt->execute();
        return true;
       }

       catch (PDOExeption $e) {
           echo $e->getMessage();
           return false;
       }

    }
 //delete editviewattendanceuser.php
 public function deleteviewleaveuser($id){

    try{ 
    $sql ="DELETE FROM `leave` WHERE `id`=:id;";
    $stmt = $this->db->prepare($sql);
    $stmt->bindparam(':id' ,$id);
    $stmt->execute();

    return true;

 }
 catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
} 

public function deleteattendee($id){

    try{ 
        $sql = "DELETE FROM `users` WHERE `user_id`=:user_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user_id' ,$id);
        $stmt->execute();
        return true;

 }
 catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
}


/*////
   public function getattendee(){
    try{
 $sql = "SELECT * FROM `attendance`";
 $result =$this->db->query($sql);
 return $result;
    }
    catch (PDOExeption $e) {
     echo $e->getMessage();
     return false;
 }
}
  


   public function getspeciality(){
       try{
    $sql = "SELECT * FROM `speciality`;";
    $result =$this->db->query($sql);
    return $result;
   }
   catch (PDOExeption $e) {
    echo $e->getMessage();
    return false;
}

}

  


   

*/
}
?>





