<?php
include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width = device-width, initial-scale = 1">
   <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
   <title>Search</title>


</head>



<body>
   <div data-role="page" id="pageone">
      <div data-role="panel" id="mypanel">

         <img src="img/avatar.png" style="width:120px;height:120px; padding-top: 20px;" />
         <h1 style="text-align:center;text-transform: capitalize">
            <?php echo $user_check; ?> </h1>

         <ul data-role="listview" data-inset="true">
            <li><a href="search.php" data-rel="close">Search</a></li>
            <li><a href="gift_by_agent.php?agent_id=<?php echo $_SESSION['user_id'] ?>">Gifts by Me</a></li>
            <li><a href="list_of_agents.php">List of Agents</a></li>
            <li data-icon="power" data-theme="b"><a href="logout.php" class="">Logout</a></li>
         </ul>

      </div><!-- /panel -->
      <div data-role="header" data-backbtn="true" data-position="fixed" data-theme="b">
         <a href="#mypanel" data-icon="bars" class="ui-btn-left">Menu</a>
         <h1>Search</h1>
         <a href="logout.php" data-icon="power" class="ui-btn-right">Logout</a>
      </div>

      <div data-role="main" class="ui-content">
         <form action="search_result.php" id="searchForm" method="post">
            <label>Search PB No:</label>
            <div class="ui-grid-a" style="padding:5px">
               <div class="ui-block-a" style="width:50%">
                  <input type="text" name="search_part1" id="search_part1" value="" placeholder="XXXXXX" minlength="1" required>
               </div>
               <div class="ui-block-b" style="width:5%; height:50px;align-content: center; display: flex; flex-wrap: wrap; padding:5px">-</div>
               <div class="ui-block-c" style="width:20%">
                  <input type="text" name="search_part2" id="search_part2" value="" placeholder="XX">
               </div>
            </div>


            <input type="submit" value="Search" data-icon="search" data-theme="b">
         </form>
      </div>

      <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
   </div>
</body>

<script>
   $("#searchForm").validate({
      errorPlacement: function(error, element) {
         error.appendTo(element.parent().prev());
      },
   });
</script>

</html>