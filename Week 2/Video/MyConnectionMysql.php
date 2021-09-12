<?
class MyConnectionMysql
 {
   private $conn = null;
   private $host = null;
   private $user = null;
   private $psw = null;
   private $db = null;
   private $schema = null;
   private $name = "Default";
   private $query = null;
   private $result = null;
   private $success = null;

   function __construct() {
     //print "In Constructor\n";
     $this->name = "Connection values for a Database";
   }
   function __destruct() {
     //echo("Destroying object<br>");
     if( $this->isConnected() == true) {
       //echo ("Closing connection");
       mysqli_close($this->conn);
     }
   }
   function setConn()
   {
     $this->conn = mysqli_connect("$this->host", "$this->user", "$this->psw", "$this->db");
        if (!$this->conn){
          die('Connect Error (' . mysqli_connect_errno() . ')'
              . mysqli_connect_error());
        }
   }
   function getConn(){
     return $this->conn;
   }
   function closeConn(){
     mysqli_close($this->conn);
     $this->conn = null;
   }
   function isConnected(){
     if( $this->getConn() == null){
       return (false);
     }
     return (true);
   }
   function getHost(){
     return $this->host;
   }
   function setHost($h){
     $this->host = $h;
   }
   function getUser(){
     return $this->user;
   }
   function setUser($u){
     $this->user = $u;
   }
   function getPsw(){
     return $this->psw;
   }
   function setPsw($p){
     $this->psw = $p;
   }
   function getDb(){
     return $this->db;
   }
   function setDb($d){
     $this->db = $d;
   }
   function getSchema(){
     return $this->schema;
   }
   function setSchema($s){
     $this->schema = $s;
   }
   function displayValues(){
     echo "Current Values of Connection Object\n<br>";
     echo ("Host: ".$this->getHost()."\n<br>");
     echo ("User: ".$this->getUser()."\n<br>");
     echo ("Password: ".$this->getHost()."\n<br>");
     echo ("Database: ".$this->getDb()."\n<br>");
     echo ("Schema: ".$this->getSchema()."\n<br>");
     echo ("Connected: ".$this->isConnected()."\n<br>");
     if ( $this->isConnected() == false){
       echo( "false<br>");
     }
     if ( $this->isConnected() == true){
       echo ( "true<br>");
     }
   }
 }
?>
