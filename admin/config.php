<?php

define("dbhost", 'localhost');  
define("dbuser", 'root');  
define("dbpass", '');  
define("dbname", 'CedHosting');
class dbConnect {
public $conn;
public $res;
public $count;
function __construct() {
    // Create connection
    $this->conn = new mysqli(dbhost, dbuser, dbpass, dbname);
    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    }
    // else {
    //     echo "success";
    // }
}
public function select($querry) {
    $this->res=mysqli_query($this->conn,$querry) or die(mysqli_error($this->conn));
    return  $this->res;
}
public function insert($querry) {
    $this->res=mysqli_query($this->conn,$querry) or die(mysqli_error($this->conn));
}
public function delete($querry) {
  $this->res=($this->conn->query($querry) === TRUE) ;
  return  $this->res;
}
public function update($querry) {
  $this->res=mysqli_query($this->conn, $querry) or die(mysqli_error($this->conn));
  return  $this->res;
     
}
public function get_last_id($sql){
  if ($this->conn->query($sql) === TRUE) {
    $last_id = $this->conn->insert_id;
  }
  return $last_id;
}

}