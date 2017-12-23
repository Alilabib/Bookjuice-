<?php
class DBConnect{
    public $host  = DB_HOST    ;
    public $user  = DB_USER    ;
    public $pass  = DB_PASSWORD;
    public $db    = DB_NAME    ;
    Public $link               ;
    public $error              ;

    /*
    * Class Constractor  
    */

    public function __construct(){
    /*
    * Call Connect Function 
    */        
    $this->connect();            
    } 

    private function connect(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db);
        if(!$this->link){
            $this->error = "can't connect to Database ".$this->link->connect_error;
            return false;
        }
    }

    /*
    * Select Function
    */

    public function select($query){
        $result = $this->link->query($query)or die("cant't Select Data From Database ".$this->link->error.__LINE__);
        if($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }

       /*
      * insert Data To DataBase
      */

      public function insert_user($query){
          $insert_row = $this->link->query($query) or die('Can\'t ADD This user to database '.$this->link->error.__LINE__);
          if($insert_row){
              header("Location:login.php?msg=".urlencode ('Sign Up Successfully'));
              exit();
          }else{
            die('Can\'t ADD This User To Data Base'.$this->link->error.__LINE__);
          } 
      }

}
?>