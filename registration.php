<?php include('server.php')?>
<html>
  <head><title>Rinomu</title></head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Registration</h2>
      </div>
      <form action="registration.php" method="post">
        <?Php include('errors.php') ?>
        <div>
          <label for="username">Username:</label>
          <input type="text" name="sname" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="text" name="email" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" name="pass1" required>
        </div>
        <div>
          <label for="password">Confirm password</label>
          <input type="password" name="pass2" required>
        </div>
        <button type="submit" name="register_user">Register</button>
        <p>Already a user?<a href="login.php"><b>Login</b></a></p>
        
      </form>
      
    </div>

  </body>
</html>