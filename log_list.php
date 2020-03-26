<?php
include('session.php');
?>
<?php

include_once 'db_functions.php';
$db = new DB_Functions();

$search_result = $db->getAlllog();

?>

<table style="width:100%"  id="logtable">
  <tr>
    <th>Time</th>
    <th>Agent</th>
    <th>Action</th>
  </tr>
  <?php
                  while ($row =  $search_result->fetch_array()) {
                  ?>
  <tr>
    <td><?php echo date("M j, h:i A", $row['TIME']); ?></td>
    <td><?php echo $row['USERNAME_TXT']; ?></td>
    <td><?php echo $row['ACTION']; ?> <?php echo $row['PARAM1']; ?></td>
  </tr>

  <?php } ?>

</table> 
