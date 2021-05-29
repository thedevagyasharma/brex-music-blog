<?php
require_once "pdo.php";
session_start();

if(isset($_POST['signup'])){
  $pass = hash('md5',$_POST['pass']);
  try{
    $sql = "INSERT INTO user(username, email_id, password, gender, dob, genre1, genre2) VALUES(:un, :em, :pw, :gn, :db, :g1, :g2)";
    $stmt = $mysql->prepare($sql);
    $stmt->execute(array(
      ':un' => $_POST['username'],
      ':em' => $_POST['email'],
      ':pw' => $pass,
      ':gn' => $_POST['gender'],
      ':db' => $_POST['dob'],
      ':g1' => $_POST['genre1'],
      ':g2' => $_POST['genre2']
    ));
  }
    catch(PDOException $e){
      if($e->errorInfo[1]==1062){
        if(strpos($e->errorInfo[2], "user")){
          $_SESSION['error'] = "Username already taken. Please try another username.";
        }
        else if(strpos($e->errorInfo[2], "email")){
          $_SESSION['error'] = "Email already registered. Please use another email.";
        }
      }
      header('Location: signup.php');
      return;
    }
    $_SESSION['success'] = "Sign Up successful.";
    header('Location: login.php');
    return;
}

$genres = [];
$stmt = $mysql->query('SELECT DISTINCT genre FROM albums');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
while($row!==False){
  array_push($genres,$row['genre']);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Brex</title>
</head>
<body>
  <?php
    include "navbar.php";
   ?>

    <div class="container d-flex flex-column align-items-center">
        <div class="row justify-content-center form-container align-items-center">
          <div class="col">
            <div class="row d-flex login-header-text text-center ">
                <div class="col-12">
                    <h1>Sign Up</h1>
                    <h5>Join the best Music community</h2>
                    <?php
                      if(isset($_SESSION['error'])){
                        echo('<h6 style="color:white;">'.htmlentities($_SESSION['error'])."</h6>\n");
                        unset($_SESSION["error"]);
                      }
                     ?>
                </div>
            </div>
            <div class="row d-flex">
              <div class="col-12">
                <form  class="sign-up-box" method="post" name="signupform" onfocusout="btnEnable()">
                    <div class="form-row">
                      <input class="form-box" type="text" name="email" placeholder="Email" autocomplete="off" onfocusout="validEmail()">
                    </div>
                    <small></small>
                    <div class="form-row">
                      <input class="form-box" type="text" name="username" placeholder="Username" autocomplete="off" onfocusout="validUsername()">
                    </div>
                    <small></small>
                    <div class="form-row">
                      <input class="form-box" type="password" name="pass" placeholder="Password" autocomplete="off" onfocusout="validPassword()">
                    </div>
                    <small></small>
                    <div class="form-row">
                      <input class="form-box" type="password" name="conpass" placeholder="Confirm Password" autocomplete="off" onfocusout="samePassword()">
                    </div>
                    <small></small>
                    <div class="form-row">
                      <select class=" form-box" name="gender" onfocusout="genderSelect()">
                        <option value="" disabled selected>I am a...</option>
                        <option value="F">Woman</option>
                        <option value="M">Man</option>
                        <option value="O">Choose not to say</option>
                      </select>
                    </div>
                    <small></small>
                    <div class="form-row">
                      <input placeholder="Date of Birth" class="form-box" type="date" name="dob" onchange="validDOB();" onclick="validDOB();" />
                    </div>
                    <small></small>
                    <div class="form-row">
                      <select class=" form-box" name="genre1" onchange="checkGenre();">
                        <option value="" disabled selected>Favorite Genre 1</option>
                        <?php foreach($genres as &$genre){
                          echo("<option value='".$genre."'>".$genre."</option>");
                        } ?>
                      </select>
                    </div>
                    <div class="form-row">
                      <select class=" form-box" name="genre2" onchange="checkGenre()">
                        <option value="" disabled selected>Favorite Genre 2</option>
                        <?php foreach($genres as &$genre){
                          echo("<option value='".$genre."'>".$genre."</option>");
                        } ?>
                      </select>
                    </div>
                    <small></small>
                    <div class="form-row">
                      <button type="submit" class="signin-btn" name="signup" disabled>Click here after filling</button>
                    </div>
                </form>
              </div>
            </div>
            <div class="row d-flex text-center">
                <div class="col">
                    <h6>Already have an Account? <a class="forgot-password" href="./login.php">Sign In</a></h6>
                </div>
            </div>
          </div>

        </div>
    </div>

    <?php
      include "footer.php";
     ?>



    <script src="./signup.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
