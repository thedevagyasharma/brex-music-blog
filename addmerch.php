<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['admin'])){
  header('Location:adminlogin.php');
  return;
}

if(isset($_POST['add'])){
  $sql = "INSERT INTO merch(name, price, merch_desc,  merch_img, artist, small, med, large, xl, xs, uni, uquan) VALUES(:ti, :cat, :txt, :aut, :aid, :sm, :med, :lg, :xl, :xs, :un, :uq)";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ':ti' => $_POST['name'],
    ':cat' => $_POST['price'],
    ':txt' => $_POST['desc'],
    ':aut' => $_POST['img'],
    ':aid' => $_POST['artist'],
    ':xs' => $_POST['xs'],
    ':sm' => $_POST['s'],
    ':med' => $_POST['m'],
    ':lg' => $_POST['l'],
    ':xl' => $_POST['xl'],
    ':un' => $_POST['size'],
    ':uq' => $_POST['u']
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
              <h1>Add new Merch</h1>
            </div>
          </div>
          <div class="row d-flex">
            <div class="col">
              <form class="sign-up-box" method="POST">
                <div class="form-group">
                  <label class="control-label col-sm-2">Name :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Name of the product" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Artist :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="artist" placeholder="Name of the artist" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Description:</label>
                  <div class="col-sm-6">
                    <textarea name="desc" rows="8" cols="125" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Price :</label>
                  <div class="col">
                    <input type="number" class="form-control" name="price" placeholder="Price of the product (in INR)" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Size :</label>
                  Universal:<input type="radio" name="size" value="1">
                  Variable:<input type="radio" name="size" value="0">
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Quantity :</label>

                  <div class="col-sm-3">XS:<input class="form-control" type="number" name="xs"></div>
                  <div class="col-sm-3">S:<input class="form-control" type="number" name="s"></div>
                  <div class="col-sm-3">M:<input class="form-control" type="number" name="m"></div>
                  <div class="col-sm-3">L:<input class="form-control" type="number" name="l"></div>
                  <div class="col-sm-3">XL:<input class="form-control" type="number" name="xl"></div>
                  <div class="col-sm-3">Universal:<input class="form-control" type="number" name="u"></div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Image :</label>
                  <div class="col">
                    <input type="text" class="form-control" name="img" placeholder="Link of the image" required>
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

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
