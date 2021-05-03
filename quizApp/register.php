<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }

    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn , $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //Set the value of param username
            $param_username = trim($_POST['username']);

            //Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "This username already taken.";
              }

              else{
                $username = trim($_POST['username']);
              }
            }
            else{
              echo "Something Went Wrong!";
            }
        }
    }
    mysqli_stmt_close($stmt);


//Check  for Password
if(empty(trim($_POST['password']))){
  $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password']))< 5){
  $password_err = "Password cannot be less than 5";
}
else{
  $password = trim($_POST['password']);
}

//Check for confirm password field
if(trim($_POST['password']) != trim($_POST['confirm_password'])){
  $password_err = "Password should match";
}

//If no errors insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
  $sql = "INSERT INTO users (username, password) VALUES(?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  if($stmt){
    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

    //Set these parameters
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    //Try to execute the query

    if(mysqli_stmt_execute($stmt)){
      header('location: login.php');
    }

    else{
      echo "Something went wrong.... cannot redirect!";
    }
  }

  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>






<!DOCTYPE html>
<html>

<head>

    <!--meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS File path-->
    <link rel="stylesheet" href="css/registerStyle.css">

    <title>Sign Up</title>
</head>

<body>

    <!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">&times;</span> -->

        <form class="modal-content" action="" method="post">

            <div class="container">

                <h1 style="text-align: center; color: #40a8c4">Sign Up</h1>

                <p>For tracking your progress create an account.</p>

                <hr>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="confirm_password" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button type="button" onclick="document.location='quizFront.html'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>

            </div>
            
        </form>
    <!-- </div> -->

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>