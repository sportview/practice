<?php

session_start();
if(isset($_SESSION['username'])){
  $_SESSION['msg'] = "you must log in first to view this page";
  header("location:login.php");
}
if(isset($_GET['Logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location : login.php");
}
?>
<html>
<head><title></title></head>
<body>
<div class="container">
<h1>This is the homepage</h1>

<?php 

if(isset($_SESSION['success'])):?>
<div>
<h3>
<?php 
echo $_SESSION['success'];
unset($_SESSION['success']);

?>
</h3>
</div>
<?php endif ?>

<!-- users information dispalyed from the dashboard-->
<?php if(isset($_SESSION['user'])): ?>
<h3> welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
<button> <a href="index.php?logout='1'">log out</a></button>

<?php endif ?>




</div>
</body>
</html>