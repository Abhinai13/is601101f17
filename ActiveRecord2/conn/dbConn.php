<?php
//db connection class using singleton pattern
require_once './config/config.php';  
class dbConn{ 
 //variable to hold connection object.
 protected static $db;


  //private construct - class cannot be instatiated externally.
  private function __construct() {
   
   try {
   // assign PDO object to db variable 
    $dsn  = "mysql:dbname=".dbname.";host=".host;
   self::$db = new PDO( $dsn,user,pass);
   self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   }
   catch (PDOException $e) {
   //Output error - would normally log this to error file rather than output to user.
   echo "Connection Error: " . $e->getMessage();
   }
    
    }
     
     // get connection function. Static method - accessible without instantiation
     public static function getConnection() {
      
      //Guarantees single instance, if no connection object exists then create one.
      if (!self::$db) {
      //new connection object.
      new dbConn();
      }
       
       //return connection.
       return self::$db;
       }
}
  $db = dbConn::getConnection();
  //print_r($db);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>