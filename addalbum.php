<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['admin'])){
  header('Location:adminlogin.php');
  return;
}

if(isset($_POST['add'])){
  $location = '';
  if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
      $location = "./Assets/Album Covers/".$file_name;
      move_uploaded_file($file_tmp,$location);
    }
  $sql = "INSERT INTO albums(name, artist, cover, genre, rlsdate) VALUES(:ti, :ar, :cv, :gen, :dt)";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ':ti' => $_POST['title'],
    ':ar' => $_POST['artist'],
    ':cv' => $location,
    ':gen' => $_POST['genre'],
    ':dt' => $_POST['rls']
  ));
  $_SESSION['success'] = "Album added successfully";
  header('Location:addalbum.php');
  return;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>New Album</title>
  </head>
  <body>
    <?php include"adminnavbar.php" ?>

    <div class="container d-flex flex-column align-items-center">
      <div class="row justify-content-center form-container align-items-center">
        <div class="col">
          <div class="row d-flex login-header-text text-center">
            <div class="col">
              <h1>Add New Album</h1>
              <?php if(isset($_SESSION['success'])){
                echo('<h6 style="color:white;">'.htmlentities($_SESSION['success'])."</h6>\n");
                unset($_SESSION["success"]);
              } ?>
            </div>
          </div>
          <div class="row d-flex">
            <div class="col">
              <form class="sign-up-box" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col">Album Name :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="title" placeholder="Album Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col">Artist :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="artist" placeholder="Artist's Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col">Genre :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="genre" placeholder="Genre" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col">Year :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="rls" placeholder="Release Year" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col">Cover Image :</label>
                  <div class="col">
                    <input class="form-control-file" type="file" name="image" accept=".jpg,.png,.jpeg">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col">
                    <button type="submit" class="signin-btn" name="add">ADD</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include"footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
