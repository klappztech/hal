<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_POST["search"])) {
   $search = $_POST["search"];
}

$search_result = $db->searchCandidate($search);
$row_count = $search_result->num_rows;

if($row_count > 0){
   $row = $search_result->fetch_array();
}




?>
   <head>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" type="text/css" href = "./css/style.css">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" >

      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


   </head>
      
   <body>
      <div data-role = "page" id = "pageone">
      <div data-role = "header">
            <a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-user ui-btn-icon-notext ui-btn-inline">Delete</a>
            <h1 style="text-align:left; margin-left:40px;" >
            <?php echo $user_check; ?> </h1>
            <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
         </div>

         <div data-role = "main" class = "ui-content">
<?php if($row_count>0) { ?>
            <form action="mark_as_gifted.php" method="post">
            <input type="hidden" name="pb_no" value="<?php echo $row['PB_NO']; ?>" >

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
               <?php if($row['GIFTED']==0) { ?>
                  <div class="status pending">PENDING</div>
                  <input type="submit" value="Mark As Gifted" data-icon="shop" data-theme="b" >
               <?php } else { ?>
                  <div class="status given">GIFTED</div>
                  <div class="agent-name">Given by <b> <?php echo $db->getAgentnameById($row['AGENT']); ?></b></div>
               <?php } ?>
<?php } else { ?>
                  <div class="agent-name">PB_NO: "<?php echo $search; ?>" Not Found!</div>
<?php } ?>

				  <a href="search.php" class="ui-btn ui-icon-search ui-btn-icon-left">Back to Search</a>



              
            </form>
         </div>

         <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
      </div>
   </body>
</html>