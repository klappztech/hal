<!DOCTYPE html>
<html>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

if (isset($_GET["search"])) {
   $search = $_GET["search"];
}

$search_result = $db->searchCandidate($search);
$row = $search_result->fetch_array();


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
            <h1>HAL Election</h1>
         </div>

         <div data-role = "main" class = "ui-content">
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
               <?php if($row['GIFTED']==0) { ?>
                  <div class="status pending">PENDING</div>
                  <input type="button" value="Mark As Gifted" data-icon="shop" data-theme="b" >
               <?php } else { ?>
                  <div class="status given">GIFTED</div>
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