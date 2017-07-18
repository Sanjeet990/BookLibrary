<?php

class db{

/*** Declare instance ***/
private static $instance = NULL;

/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/
private function __construct() {
               self::$instance = mysql_connect("localhost", "root", "root");
               mysql_select_db("bookstore", self::$instance);
}

/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*
*/
public static function getInstance() {

		if(empty(self::$instance)){
			self::$instance = new db();
                }
 
                return self::$instance;
}



private function __clone(){
}

} /*** end of class ***/

?>
