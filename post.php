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
      $location = "./Assets/".$_POST['category']."/".$file_name;
      move_uploaded_file($file_tmp,$location);
    }
  $sql = "INSERT INTO post(title, category, content, ondate,  author, image, genre) VALUES(:ti, :cat, :txt, :dt, :aut, :im, :gn)";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ':ti' => $_POST['title'],
    ':cat' => $_POST['category'],
    ':txt' => $_POST['content'],
    ':dt' => date("Y-m-d"),
    ':aut' => $_POST['author'],
    ':im' => $location,
    ':gn' => $_POST['genre']
  ));
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
    <title>Post</title>
  </head>
  <body>
    <?php include"adminnavbar.php" ?>

    <div class="container d-flex flex-column align-items-center">
      <div class="row justify-content-center form-container align-items-center">
        <div class="col">
          <div class="row d-flex login-header-text text-center">
            <div class="col">
              <h1>Add new content</h1>
            </div>
          </div>
          <div class="row d-flex">
            <div class="col">
              <form class="sign-up-box" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-sm-2">Title :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Author :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="author" placeholder="Author's Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Category :</label>
                  <div class="col">
                    <select class="form-control" name="category">
                      <option value="" disabled selected>This is a...</option>
                      <option value="news">News Article</option>
                      <option value="review">Album / Song Review</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Genre :</label>
                  <div class="col">
                    <select class="form-control" name="genre">
                      <option value="" disabled selected>Genre</option>
                      <option value="Dubstep">Dubstep</option>
                      <option value="Future Bass">Future Bass</option>
                      <option value="Hip Hop">Hip Hop</option>
                      <option value="Pop">Pop</option>
                      <option value="Rock">Rock</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Image :</label>
                  <div class="col">
                    <input class="form-control-file" type="file" name="image" accept=".jpg,.png,.jpeg">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Content:</label>
                  <div class="col-sm-6">
                    <textarea name="content" rows="8" cols="125" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
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
