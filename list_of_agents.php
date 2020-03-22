<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

$search_result = $db->getAllGiftGivenAgents();
$row_count = $search_result->num_rows;

?>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" href="themes/android_blue.min.css" />
   <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
   <link rel="stylesheet" type="text/css" href="./css/style.css">

   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


</head>

<body>
   <div data-role="page" id="pageone">

      <div data-role="header" data-backbtn="true" data-position="fixed" data-theme="b">
         <a href="#" data-rel="back" data-icon="back" class="ui-btn-left">Back</a>
         <h1>List of Agents</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">



         <form method="post">
            <div>
               <h3>Total Gifts: <?php echo $db->getTotalNumGift(); ?></h3>


               <ul data-role="listview" data-inset="true" data-count-theme="b" class="ui-alt-icon ui-nodisc-icon">
                  <?php
                  while ($row =  $search_result->fetch_array()) {
                  ?>
                     <li><a href="gift_by_agent.php?agent_id=<?php echo $row['AGENT'] ?>"> <?php echo $db->getAgentnameById($row['AGENT']); ?><span class="ui-li-count"><?php echo $db->getNumGiftByAgent($row['AGENT']); ?></span></a></li>


                  <?php } ?>

               </ul>
               <a href="search.php" class="ui-btn ui-icon-search ui-btn-icon-left">Back to Search</a>
         </form>
      </div>

   </div>
</body>

</html>