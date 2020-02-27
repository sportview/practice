<?php include('server.php')?>
<html>
  <head><title>Rinomu</title></head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Log In</h2>
      </div>
      <form action="login.php" method="post">
        <?php include('errors.php') ?>
        <div>
          <label for="username">Username:</label>
          <input type="text" name="username" required>
        </div>
        
        <div>
          <label for="password">Password:</label>
          <input type="password" name="password" required>
        </div>
        
        <button type="submit" name="login_user">Submit</button>
        <p>Not a User<a href="registration.php"><b>Register</b></a></p>
      </form>  

    </div>

  </body>
</html>