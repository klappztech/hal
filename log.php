<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

$search_result = $db->getAlllog();

?>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" type="text/css" href="./css/style.css">

   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


</head>

<body>

   <div data-role="page" id="pageone">


      <div style="padding:10px;">
         <a href="search.php" >[Home]</a>
         <a href="logout.php" >[Logout]</a>

         <h1>Log</h1>
      </div>

      <div data-role="main" class="ui-content" id="log_container">
         <script>
            $(document).ready(function() {
               var url = window.location.pathname;
               var filename = url.substring(url.lastIndexOf('/') + 1);

                  $("#log_container").load('log_list.php');

                  setInterval(function() {
                     $("#log_container").load('log_list.php');
                     //location.reload();

                  }, 2000);
               
            });
         </script>


      </div>

   </div>
</body>

</html>