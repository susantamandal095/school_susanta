<?php
    require('init.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        // if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        //     echo "<script>alert('Incorrect verification code');</script>" ;
        //     echo "<script type='text/javascript'> document.location ='adminlogin.php'; </script>";
        // } 
        // else{
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admins` WHERE email='$email'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;           
            // Redirect to user dashboard page
            header("Location: adindex.php");
        } else {
            
                  echo "<script>alert('Incorrect email/password.');</script>" ;
                  echo "<script type='text/javascript'> document.location ='adminlogin.php'; </script>";
        }
    // } 
}else {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta email="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body>
      
  <div class="demo form-bg">
      <div class="loginlayout"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <form class="form-horizontal"  method="post" email="login">
                <div class="form-icon"><i class="fa fa-user-circle"></i></div>
                    <h3 class="title">Admin Login</h3>
         <h1 class="login-title">Login</h1>
         <div class="form-group">
         <label>email</label>
                <input type="text" name="email" class="form-control">
                <span class="help-block"></span>
       </div>
        <div class="form-group">
        <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
        </div>
        <!-- <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>  -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <div class="form-group"> 
            <p class="link">Go to home page <a href="../index.php">Home page</a></p>
            </div>
  </form>
            </div>
        </div>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php
    }
?>
  </body>
</html>
