<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();
if (isset($_GET["pb_no"])) {
   $search = $_GET["pb_no"];
} else if (isset($_POST["search_part1"])) {
   $search = $_POST["search_part1"];
   if (strlen($_POST["search_part2"]) > 0) {
      $search .= "-" . $_POST["search_part2"];
   }
   
}

$search_result = $db->searchCandidate($search);
$row_count = $search_result->num_rows;

if ($row_count > 0) {
   $row = $search_result->fetch_array();
}




?>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" type="text/css" href="./css/style.css">
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
         <h1>Voter Details</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">
         <?php if ($row_count > 0) { ?>
            <form action="mark_as_gifted.php" method="post">
               <input type="hidden" name="pb_no" value="<?php echo $row['PB_NO']; ?>">

               <h2><?php echo $row['NAME']; ?></h2>
               <table>
                  <tr>
                     <th>PB No:</th>
                     <td><?php echo $row['PB_NO']; ?></td>
                  </tr>
                  <tr>
                     <th>MEMB No:</th>
                     <td><?php echo $row['MEMB_NO']; ?></td>
                  </tr>
                  <tr>
                     <th>Dept</th>
                     <td><?php echo $row['DEPT']; ?></td>
                  </tr>
                  <tr>
                     <th>Division</th>
                     <td><?php echo $row['DIVISION']; ?></td>
                  </tr>

               </table>
               <?php if ($row['GIFTED'] == 0) { ?>
                  <div class="status pending">PENDING</div>
                  <input type="submit" value="Check and Give" data-icon="shop" data-theme="b">
               <?php } else { ?>
                  <div class="status given">GIFTED</div>
                  <div class="agent-name">Given by <b> <?php echo $db->getAgentnameById($row['AGENT']); ?></b> <br>@ <?php echo date("d/m/Y, h:i A", $row['GIFT_TIME']); ?> </br></div>
               <?php } ?>
            <?php } else { ?>
               <div class="agent-name">PB_NO: "<?php echo $search; ?>" Not Found!</div>
            <?php } ?>

            <a href="search.php" class="ui-btn ui-icon-search ui-btn-icon-left ui-alt-icon">Back to Search</a>




            </form>
      </div>

      <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
   </div>
</body>

</html>