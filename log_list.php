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


         <form method="post">
            <div>

               <ul data-role="listview">
                  <?php
                  while ($row =  $search_result->fetch_array()) {
                  ?>

                     <li id="log_list">
                        <?php echo $row['ACTION']; ?> <?php echo $row['PARAM1']; ?>
                        <p>by <?php echo $row['USERNAME_TXT']; ?></p>
                        <p class="ui-li-aside"><?php echo date("M j, h:i A", $row['TIME']); ?></p>
                     </li>

                  <?php } ?>

               </ul>
         </form>
