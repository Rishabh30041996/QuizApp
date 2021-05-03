<?php
//This script will handle login
session_start();

//Check if the user is already logged in
if(isset($_SESSION['username'])){
  header('location: Welcome.php');
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";


// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
    $err = "Please enter username + Password";
  }
  else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  if(empty($err)){
    $sql = 'SELECT id, username, password FROM users WHERE username = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    //mysqli_stmt_execute($stmt);
    //Try to execute this statement

    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
    
      if(mysqli_stmt_num_rows($stmt) == 1){
        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        if(mysqli_stmt_fetch($stmt)){
          if(password_verify($password, $hashed_password)){

            //This password is correct allow user to login
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION["loggedin"] = true;

            //Redirect User to Welcome Page
            header("location: welcome.php");
          }
        }
      }
    }  
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!--Required meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS file path-->
    <link rel="stylesheet" href="css/loginStyle.css">

    <!--W3School Link for using animation-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Login</title>

</head>

<body>

    <form action="" class="form w3-container w3-center w3-animate-zoom" method="post">

        <h1>LOGIN</h1> <hr style="width: 100%; border: 1px solid rgba(7, 11, 12, 0.89);"> <br><br>

        <!--For Username-->
        <div class="container">
            <span class="icons">☠</span><input type="text" placeholder="Username" name="username" required>
        </div> 

        <!--For Password-->
        <div class="container">
            <span class="icons">☣</span><input type="password" placeholder="Password" name="password" required> <br>
        </div>    
            
            <!--Login Button-->
            <button type="submit" style="font-weight:bold;"><strong>Login</strong></button> <br>


            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        

        <div style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn" onclick="document.location='quizFront.html'">Cancel</button>
            <span class="psw"><a href="#">Forgot password?</a></span>
        </div>

    </form>

</body>

</html>