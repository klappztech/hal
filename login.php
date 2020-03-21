<?php
session_start();

if (isset($_SESSION['login_user'])) {
   header("location:search.php");
}

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_POST['username'])) {
   // username and password sent from form 

   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];


   $login_result = $db->loginCheck($myusername, $mypassword);

   if ($login_result == true) {
      header("location: search.php");
   }
}
?>

<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
   <title>Login</title>
</head>



<body>
   <div data-role="page" id="pageone">
      <div data-role="header">
         <h1>Login</h1>
      </div>

      <div data-role="main" class="ui-content">
         <?php if (isset($login_result) && $login_result == false) { ?>
            <div class="agent-name">Invalid Username or Password. Please Try Again!</div>
         <?php }  ?>


         <form action="login.php" method="post" id="loginForm">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" minlength="4" required>
            <label for="password">Password:</label>
            <input type="password" data-clear-btn="false" name="password" id="password" value="" autocomplete="off" minlength="4" required>
            <input type="submit" value="Login" data-theme="b">
         </form>
      </div>

      <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
   </div>
</body>
<script>
   $("#loginForm").validate({
      errorPlacement: function(error, element) {
         error.appendTo(element.parent().prev());
      },
   });
</script>

</html>