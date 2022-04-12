<?php
class user{
    private $db;

    function __construct($conn){
        $this->db = $conn;

    }

    //login
    public function getuser($username,$password){
     
        try{
            
          $sql=  "SELECT *  FROM `users` WHERE `email`='$username' and `password`='$password'";
          $stmt =$this->db->prepare($sql);
          //$stmt->bindparam(':email' ,$username);
          //$stmt->bindparam(':password' ,$password);
          $stmt->execute();
          $result =$stmt->fetch();
  
          return $result;
         }
         catch (PDOExeption $e) {
          echo $e->getMessage();
          return false;
      }
         }  
    /*public function insertuser($username,$password){

        try {
            $result =$this->getuserbyusername($username);
            if($result['num']>0){
                return false;
            }
            else{
                $new_password= md5($password.$username);
            $sql = "INSERT INTO `users`( `username`, `password`) VALUES (:username , :password )";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username' ,$username);
            $stmt->bindparam(':password' ,$password);
          
            $stmt->execute();
    
            return true;
           }
        }
    
           catch (PDOExeption $e) {
               echo $e->getMessage();
               return false;
           }
    }*/

    
    public function getuserbyusername($username){
        try{
            $sql=  "SELECT COUNT(*) as num FROM `users` WHERE `username`=:username;";
            $stmt =$this->db->prepare($sql);
            $stmt->bindparam(':username' ,$username);
           
             $stmt->execute();
        
             $result =$stmt->fetch();
             
            return $result;
           }
           catch (PDOExeption $e) {
            echo $e->getMessage();
            return false;
        }
           }  

    

           /*public function getuserbyemailandpassword($username,$password){
            try{
                $sql=  "SELECT COUNT(*) as num FROM `users` WHERE `username`=:username AND password=:password;";
                $stmt =$this->db->prepare($sql);
                $stmt->bindparam(':username' ,$username);
                $stmt->bindparam(':password' ,$password);
               
                 $stmt->execute();
            
                 $result = $stmt->fetch();
                 //print_r($result);
                 if($result['num']>0){
                    return true;
                }else{
                    return false;
                }
                
               }
               catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            }
        }*/



}
?>