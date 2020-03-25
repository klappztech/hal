<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_POST["pb_no"])) {
   $pb_no = $_POST["pb_no"];
} else {
   header("location:search.php");
}

$mark_result = $db->markAsGifted($pb_no, $user_id);

$search_result = $db->searchCandidate($pb_no);
$row = $search_result->fetch_array();


?>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" href="themes/android_blue.min.css" />
   <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
   <link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
   <link rel="stylesheet" type="text/css" href="./css/style.css">

   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>



<body>



   <div data-role="page" id="pageone">

   <div data-role="header"  data-position="fixed" data-theme="b">
         <a href="search.php" data-icon="home" class="ui-btn-left">Home</a>
         <h1>Voter Details</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">
         <form>

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
               <input type="button" value="Mark As Gifted" data-icon="shop" data-theme="b">
            <?php } else if ($row['GIFTED'] == 1 && $mark_result == false) {
                  $db->add2Log( $_SESSION['user_id'], $_SESSION['login_user'], "Mark: DONT GIVE, PB_NO:", $row['PB_NO']);
                  ?>
               <div class="status dont-give">DONT GIVE</div>
               <div class="agent-name">Already Given by <b><?php echo $db->getAgentnameById($row['AGENT']); ?></b><br>@ <?php echo date("d/m/Y, h:i A", $row['GIFT_TIME']); ?> </br></div>
            <?php } else if ($row['GIFTED'] == 1 && $mark_result == true) { 
                  $db->add2Log( $_SESSION['user_id'], $_SESSION['login_user'], "Mark: GIVE NOW, PB_NO:", $row['PB_NO']);?>
               <div class="status give-now">GIVE NOW</div>
               <div class="agent-name">Marked as Given by <b> <?php echo $db->getAgentnameById($row['AGENT']); ?></b><br>@ <?php echo date("d/m/Y, h:i A", $row['GIFT_TIME']); ?> </br></div>
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