<?php
include('session.php');
?>

<?php

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_POST['username'])) {
   // username and password sent from form 

   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];

   if ($db->userExist($myusername)) {
      $user_exist = true;
   } else {
      $login_result = $db->createUser($myusername, $mypassword);
   }
}
?>

<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" href="themes/android_blue.min.css" />
   <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
   <link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
   <title>Create User</title>
</head>



<body>
   <div data-role="page" id="pageone">
   <div data-role="header" data-backbtn="true" data-position="fixed" data-theme="b">
         <a href="#" data-rel="back" data-icon="back" class="ui-btn-left">Back</a>
         <h1>Create User</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">
         <?php if (isset($user_exist)) { ?>
            <div class="agent-name">Username already taken, Please choose another one!</div>
         <?php } else if(isset($login_result)) { ?>
            <div class="agent-name">"<?php echo $login_result; ?>" added!</div>
         <?php }  ?>


         <form action="create_user.php" method="post" id="loginForm">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" minlength="4" required>
            <label for="password">Password:</label>
            <input type="password" data-clear-btn="false" name="password" id="password" value="" autocomplete="off" minlength="4" required>
            <input type="submit" value="Create User" data-theme="b">
            <a href="search.php" class="ui-btn ui-icon-search ui-btn-icon-left ui-alt-icon">Back to Search</a>

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