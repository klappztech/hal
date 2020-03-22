<?php

class DB_Functions
{

  private $db;
  private $conn; //mysqli

  //put your code here
  // constructor
  function __construct()
  {
    include_once './db_connect.php';
    // connecting to database
    $this->db = new DB_Connect();
    $this->conn = $this->db->connect();
  }

  // destructor
  function __destruct()
  {
  }

  public function loginCheck($myusername, $mypassword)
  {

    $result =  $this->conn->query("SELECT * FROM `agents` WHERE `username` = '$myusername' and `password` = '$mypassword' ");
    $count = $result->num_rows;

    if ($count == 1) {
      //session_register("myusername");
      $row = $result->fetch_array();

      $_SESSION['login_user'] = $row['username'];
      $_SESSION['user_id'] = $row['id'];

      $return = true;
    } else {
      $return = false;
    }

    return $return;
  }

  public function loginCheckHash($myusername, $mypassword)
  {

    $result =  $this->conn->query("SELECT * FROM `agents` WHERE `username` = '$myusername'");
    $count = $result->num_rows;

    if ($count == 1) {

      $row = $result->fetch_array();
      if (password_verify($mypassword, $row['password'])) {
        // Success!
        $_SESSION['login_user'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];

        $return = true;
      } else {
        $return = false;
      }
    } else {
      $return = false;
    }

    return $return;
  }

  public function userExist($myusername)
  {

    $result =  $this->conn->query("SELECT * FROM `agents` WHERE `username` = '$myusername'");
    $count = $result->num_rows;

    if ($count > 0) {
      $return = true;
    } else {
      $return = false;
    }

    return $return;
  }

  public function createUser($myusername, $mypassword)
  {

    $hash = password_hash($mypassword, PASSWORD_DEFAULT);
    $result =  $this->conn->query("INSERT INTO `agents`(`username`, `password`) VALUES ('$myusername','$hash') ");

    return $myusername;
  }

  public function getAgentnameById($agent_id)
  {

    $result =  $this->conn->query("SELECT * FROM `agents` WHERE `id` = $agent_id ");
    $count = $result->num_rows;

    if ($count == 1) {
      //session_register("myusername");
      $row = $result->fetch_array();

      $agent_name = $row['username'];
    } else {
      $agent_name = "unknown";
    }

    return $agent_name;
  }


  /* list of all distincts agent who distributed gifts */
  public function getAllGiftGivenAgents()
  {

    $result =  $this->conn->query("SELECT DISTINCT `AGENT` FROM `candidates` WHERE `GIFTED`=1 ORDER BY `AGENT` ASC");
    return $result;
  }

  /* search candidates by PB_NO */
  public function searchCandidate($pb_no)
  {

    $result =  $this->conn->query("SELECT * from candidates WHERE PB_NO='$pb_no'");
    return $result;
  }
  /* search candidates by PB_NO */
  public function searchGiftedCandidate($agent_id)
  {

    $result =  $this->conn->query("SELECT * from candidates WHERE GIFTED=1 AND AGENT=$agent_id ");
    return $result;
  }
  /* search candidates by PB_NO */
  public function getNumGiftByAgent($agent_id)
  {

    $result =  $this->conn->query("SELECT * from candidates WHERE GIFTED=1 AND AGENT=$agent_id ");
    return $result->num_rows;
  }

  /* search candidates by PB_NO */
  public function getTotalNumGift()
  {

    $result =  $this->conn->query("SELECT * from candidates WHERE GIFTED=1 ");
    return $result->num_rows;
  }

  public function markAsGifted($pb_no, $agent_id)
  {

    //check if still not gifted
    $result =  $this->conn->query("SELECT * from candidates WHERE PB_NO='$pb_no' AND GIFTED=0 ");

    if ($result->num_rows > 0) {
      //mark as gifted
      $current_time = time();
      $result_update = $this->conn->query("UPDATE candidates SET GIFTED=1, AGENT=$agent_id, GIFT_TIME=$current_time WHERE PB_NO='$pb_no' ");
      return true;
    } else {
      // already gifted, return failure
      return false;
    }
  }


  /**
   * Getting all users
   */
  public function runQuery($query)
  {
    $result = $this->conn->query($query);
    return $result;
  }
}
