<?php
   session_start();
   
   if(  !isset($_SESSION['login_user'])  ){
      header("location:login.php");
   }
   
   $user_check = $_SESSION['login_user'];
   $user_id = $_SESSION['user_id'];
      

?>