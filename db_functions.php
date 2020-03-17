<?php

class DB_Functions {

    private $db;
	private $conn; //mysqli

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->conn = $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    public function loginCheck($myusername, $mypassword) {
		
		$result =  $this->conn->query( "SELECT * FROM `agents` WHERE `username` = '$myusername' and `password` = '$mypassword' ");
        $count = $result->num_rows;

        if($count == 1) {
            //session_register("myusername");
            $row = $result->fetch_array();

            $_SESSION['login_user'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            $return = true; 
         }else {
            $return = false;
         }
       
        return $return;
		
    }

    public function getAgentnameById($agent_id) {
		
		$result =  $this->conn->query( "SELECT * FROM `agents` WHERE `id` = $agent_id ");
        $count = $result->num_rows;

        if($count == 1) {
            //session_register("myusername");
            $row = $result->fetch_array();

            $agent_name = $row['username'];

         }else {
            $agent_name = "unknown";
         }
       
        return $agent_name;
		
    }

	
	/* search candidates by PB_NO */
    public function searchCandidate($pb_no) {
		
		$result =  $this->conn->query("SELECT * from candidates WHERE PB_NO='$pb_no'");
		return $result;
		
    }
    public function markAsGifted($pb_no,$agent_id) {
		
        //check if still not gifted
        $result =  $this->conn->query("SELECT * from candidates WHERE PB_NO='$pb_no' AND GIFTED=0 ");
        
        if ($result->num_rows > 0) {
            //mark as gifted
            $result_update = $this->conn->query("UPDATE candidates SET GIFTED=1, AGENT=$agent_id WHERE PB_NO='$pb_no' ");
            return true;
			
		} else {
			// already gifted, return failure
            return false;
		}
		
	}
	
	/**********************OLD************************************/
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($username, $password, $gcm_regid) {
		
		//if this used in present in the parents table?
		$result_reg =  $this->conn->query("SELECT * from gcm_parents WHERE username='$username' AND password='$password'");
        if ($result_reg->num_rows > 0 && !empty($gcm_regid)) {
			// user is present in the db, UPDATE gcmId
			$result = $this->conn->query("UPDATE `gcm_parents` SET `gcm_regid`='$gcm_regid' WHERE username='$username' AND password='$password'  ");
			
		} else {
			// user in not present
			echo "user is not registered";
		}
		
	}
    
	
	/**
     * Storing new Message
     * returns user details
     */
    public function storeMessage($title, $url, $description,$class_bitmap) {
        // insert user into database
		$now = time();
        $result = $this->conn->query("INSERT INTO gcm_notifications(title, url, date, description,class_bitmap) VALUES('$title', '".htmlspecialchars($url, ENT_QUOTES )."', '$now', '$description',$class_bitmap)");
		
	if ($result) {
	  echo 'users entry saved successfully';
	}   
	else {
	  echo 'Error: '. $this->conn->error;
	}


		$insertId = $this->conn->insert_id;
        // check for successful store
        if ($insertId) {
            return $insertId;
        } else {
            return 0;
        }
    }
	
	/**
     * Storing new Users
     * returns user details
     */
    public function storeParent($name, $username, $password, $class_bitmap) {
		
		// insert user into database
        $result = $this->conn->query("INSERT INTO gcm_parents(name, username, password, class_bitmap) VALUES('$name', '$username', '$password', '$class_bitmap')");
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	
    /**
     * Getting all users
     */
    public function runQuery($query) {
        $result = $this->conn->query( $query);
        return $result;
    }
	

}

?>