<?php

session_start();

//initialize variables

$username = "";
$email = "";
$errors = array();

$db= mysqli_connect('localhost','root','mama4321','practice') or die("could not connect to the database");

//register a user
if (isset($_POST['register_user'])){
  $username = mysqli_real_escape_string($db,$_POST['sname']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $pwd1 = mysqli_real_escape_string($db,$_POST['pass1']);
  $pwd2 = mysqli_real_escape_string($db,$_POST['pass2']);

  //form validation 

  if(empty($username))
  {array_push($errors,"Username is required");
  }
  if(empty($email)){array_push($errors,"email is required");
  }
  if(empty($pwd1))
  {
    array_push($errors,"password is required");
  };
  if($pwd1 != $pwd2)
  {array_push($errors,"passwords do not match");
  }

  // check database for existing user with same username
  echo("am on existing user check");

  $user_check_query="SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
  $result = mysqli_query($db,$user_check_query);
  $user = mysqli_fetch_assoc($result);
 
  if($user){
    if($user['username'] === $username){array_push($errors,"Username already exists");}
    if($user['email'] === $email){array_push($errors,"Email already exists");}
  }

  //register the new user if no errors exist

  if(count($errors)== 0)
  {
    $pass_1 = md5($pwd1); //encrypt the password       
    $query = "INSERT INTO user (username,email,pass) VALUES ('$username','$email','$pass_1')";
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "logged in successfully";
    header("location:index.php");
  }
}

// login setup

if (isset($_POST['login_user'])){
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $pass = mysqli_real_escape_string($db,$_POST['password']);

  if(empty($username)){
    array_push($errors,"username required");
  }
  if(empty($pass)){
    array_push($errors,"Password required");
  }
  if(count($errors) == 0 ){
    
    $pass = md5($pass);

    $query = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'";

    $results = mysqli_query($db,$query);

    if(mysqli_num_rows($results)){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "logged in successfully";
      header('location:index.php');
    }
    else{
      array_push($errors,"username/password don't match try again later");
    }
    
  }
}

?>
