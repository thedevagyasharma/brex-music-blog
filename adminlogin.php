<?php
session_start();
require_once "pdo.php";

if(isset($_SESSION['admin'])){
  header('Location:post.php');
  return;
}

if(isset($_POST["signin"])){
  $sql = "SELECT username,password FROM admin WHERE username = :un OR email_id = :un";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ':un' => $_POST['user']
  ));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row === false){
    $_SESSION['error'] = "User not found. Please register.";
    header('Location:adminlogin.php');
    return;
  }
  else{
    $pass = hash('md5',$_POST['pass']);
    if($row['password']===$pass){
      $_SESSION['admin'] = $row['username'];
      header('Location:post.php');
      return;
    }
    else{
      $_SESSION['error'] = "Invalid password. Please try again.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Brex</title>
</head>
<body>

  <?php
  include "adminnavbar.php";
   ?>

    <div class="container-fluid login-header d-flex flex-column align-items-center">

        <div class="row d-flex flex-column justify-content-center form-container align-items-center">
            <div class="row d-flex login-header-text text-center ">
                <div class="col-12">
                    <h1>Sign In</h1>
                    <h5>Admin Section</h2>
                      <?php
                        if(isset($_SESSION['success'])){
                          echo('<h6 style="color:white;">'.htmlentities($_SESSION['success'])."</h6>\n");
                          unset($_SESSION["success"]);
                        }
                        if(isset($_SESSION['error'])){
                          echo('<h6 style="color:white;">'.htmlentities($_SESSION['error'])."</h6>\n");
                          unset($_SESSION["error"]);
                        }
                       ?>
                </div>
            </div>
            <form class="form-elements" method=POST>
                <div class="form-row">
                    <div class="col">
                      <input type="text" class="form-box" placeholder="Username / Email" name=user>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                      <input type="password" class="form-box" placeholder="Password" name=pass>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                      <button class="signin-btn" name=signin>Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
      include "footer.php";
     ?>



    <script src="/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
