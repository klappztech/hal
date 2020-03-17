<!DOCTYPE html>
<html>
   <head>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	        <link rel = "stylesheet" type="text/css" href = "./css/style.css">
      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   </head>

   
      
   <body>
      <div data-role = "page" id = "pageone">
         <div data-role = "header">
            <h1>Search</h1>
         </div>

         <div data-role = "main" class = "ui-content">
            <form action="search_result.php" >
               <label for="search">Search PB No:</label>
               <input type="search" name="search" id="search" value="" placeholder="Enter PB No.">
               <input type="submit" value="Search" data-icon="search" data-theme="a">
            </form>
         </div>

         <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
      </div>
   </body>
</html>