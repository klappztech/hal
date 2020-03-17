<!DOCTYPE html>
<html>
   <head>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
      <script src = "https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src = "https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   </head>

   
      
   <body>
      <div data-role = "page" id = "pageone">
         <div data-role = "header">
            <h1>Login</h1>
         </div>

         <div data-role = "main" class = "ui-content">
            <form action="search.php">
               <label for="username">Username:</label>
               <input type="text" name="username" id="username" value="">
               <label for="password">Password:</label>
              <input type="password" data-clear-btn="false" name="password" id="password" value="" autocomplete="off">
               <input type="submit" value="Login" data-theme="b">
            </form>
         </div>

         <!-- div data-role = "footer">
            <h1>Footer Text</h1>
         </div-->
      </div>
   </body>
</html>