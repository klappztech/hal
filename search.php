<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	        <link rel = "stylesheet" type="text/css" href = "./css/style.css">
      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
      <title>Search</title>

      
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
            <form action="search_result.php" id="searchForm" method="post">
            <p>

               <label for="search">Search PB No:</label>
               <input type="search" name="search" id="search" value="" placeholder="Enter PB No." minlength="2" required>
            </p>
            <input type="submit" value="Search" data-icon="search" data-theme="a">
            </form>
         </div>
		 
         <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
      </div>
   </body>

<script>
$("#searchForm").validate({
   errorPlacement: function (error, element) {
        error.appendTo(element.parent().prev());
    },
}
);
</script>

</html>