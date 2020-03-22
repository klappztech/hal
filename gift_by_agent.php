<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_GET["agent_id"])) {
   $agent_id = $_GET["agent_id"];
}

$search_result = $db->searchGiftedCandidate($agent_id);
$row_count = $search_result->num_rows;



?>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


</head>

<body>
   <div data-role="page" id="pageone">


      <div data-role="header" data-backbtn="true" data-position="fixed" data-theme="b">
         <a href="#" data-rel="back" data-icon="back" class="ui-btn-left">Back</a>
         <h1>List of Voters</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">



         <form method="post">
            <div>
               <h1 style="text-transform: capitalize"><?php echo $db->getAgentnameById($agent_id); ?></h1>
               <h3>Total: <?php echo $row_count ?></h3>


               <ul data-role="listview"  >
               <li data-role="list-divider">Voters<span class="ui-li-count"><?php echo $row_count ?></span></li>
                  <?php
                  while ($row =  $search_result->fetch_array()) {
                  ?>
  
                     <li><a href="search_result.php?pb_no=<?php echo $row['PB_NO'] ?>">
                           <h2><?php echo $row['NAME']; ?></h2>
                           <p><strong><?php echo $row['PB_NO']; ?></strong></p>
                           <p class="ui-li-aside"><?php echo date("M j, h:i A", $row['GIFT_TIME']); ?></p>
                        </a></li>

                  <?php } ?>

               </ul>
         </form>
      </div>

   </div>
</body>

</html>