<?php
 
class DB_Connect {
	
	//$con;
 
    // constructor
    function __construct() {
 
    }
 
    // destructor
    function __destruct() {
        // $this->close();
    }
 
    // Connecting to database
    public function connect() {
        require_once 'config.php';
        // connecting to mysql
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
		
		/* check connection */
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
 
        // return database handler
        return $mysqli;
    }
 
    // Closing database connection
    public function close() {
        mysqli_close();
    }
 
} 
?>